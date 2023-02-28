<?php

namespace App\Http\Controllers;

use App\Models\User\Guru;
use App\Models\User\Siswa;
use App\Models\Kelas\Kelas;
use Illuminate\Http\Request;
use App\Models\Kelas\Jurusan;
use Illuminate\Support\Carbon;
use App\Models\Laporan\Laporan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use App\Models\Laporan\KategoriLaporan;


class LaporanController extends Controller
{
    public function laporanIndex(Request $request){
        if(Gate::allows('administrator')){
            $search = $request->input('date');
            if($search){
                session()->put('date', $search);
            } else {
                $now = now()->format('Y-m-d');
                session()->put('date', $now);
                $search = $now;
            }

            $laporan = Laporan::with('kategoriLaporan', 'siswa', 'user')
                ->whereDate('tanggal_waktu', $search)
                ->get();


            $kategori = KategoriLaporan::all();

            foreach ($kategori as $kat) {
                switch ($kat->jenis_pelanggaran) {
                    case 'Ringan':
                        $colors[$kat->id] = 'success';
                        break;

                    case 'Berat':
                        $colors[$kat->id] = 'danger';
                        break;

                    case 'Sedang':
                        $colors[$kat->id] = 'warning';
                        break;

                    default:
                        $colors[$kat->id] = '';
                        break;
                }
            }

            $tahun = date('Y', strtotime($search));
            $bulan = date('m', strtotime($search));

            $jumlah_hari = date('t', mktime(0, 0, 0, $bulan, 1, $tahun)); // mendapatkan jumlah hari dalam bulan tersebut
            $day = array(); // inisialisasi array tanggal

            for ($i = 1; $i <= $jumlah_hari; $i++) {
                $day[] = sprintf("%02d", $i); // memasukkan tanggal ke dalam array dengan format "DD"

            }

            $laporan_per_hari = array_fill(0, $jumlah_hari, 0); // inisialisasi array laporan per hari dengan nilai awal kosong

            $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $search);
            $laporans = Laporan::with('kategoriLaporan', 'siswa', 'user')
                ->whereMonth('tanggal_waktu', $searchDate->format('m'))
                ->get()
                ->groupBy(function ($laporan) {
                    return $laporan->created_at->format('d');
                });

            $laporan_per_hari = [];

            for ($i = 0; $i <= $jumlah_hari; $i++) {
                $laporan_per_hari[$i] = isset($laporans[$i]) ? $laporans[$i]->count() : 0;
            }

            return view('views-table.laporan-table', [
                    'laporan' => $laporan,
                    'color' => $colors,

                    'day' => $day,
                    'laporan_day' => $laporan_per_hari,
                    'tahun' => $tahun,
                    'bulan' => date('F', strtotime($search)),
            ]);
        }

        if(Gate::allows('petugas')){
            if (auth()->user()->guru->kelas_id === null) {
                return view('errors.404');
            }
            foreach (KategoriLaporan::all() as $kat) {
                switch ($kat->jenis_pelanggaran) {
                    case 'Ringan':
                        $colors[$kat->id] = 'success';
                        break;

                    case 'Berat':
                        $colors[$kat->id] = 'danger';
                        break;

                    case 'Sedang':
                        $colors[$kat->id] = 'warning';
                        break;

                    default:
                        $colors[$kat->id] = '';
                        break;
                }
            }

            $search = $request->input('date');
            if($search){
                session()->put('date', $search);
            } else {
                $now = now()->format('Y-m-d');
                session()->put('date', $now);
                $search = $now;
            }

            $laporan = Laporan::with('kategoriLaporan', 'siswa', 'user')
            ->whereDate('tanggal_waktu', $search);
            $kelas = auth()->user()->guru->kelas_id;
            if ($kelas) {
                $laporan->whereHas('siswa', function ($query) use ($kelas) {
                    $query->where('kelas_id', $kelas);
                });
            }
            $laporan = $laporan->get();


            $tahun = date('Y', strtotime($search));
            $bulan = date('m', strtotime($search));
            $jumlah_hari = date('t', mktime(0, 0, 0, $bulan, 1, $tahun)); // mendapatkan jumlah hari dalam bulan tersebut
            $day = array(); // inisialisasi array tanggal
            for ($i = 1; $i <= $jumlah_hari; $i++) {
                $day[] = sprintf("%02d", $i); // memasukkan tanggal ke dalam array dengan format "DD"

            }

            $laporan_per_hari = array_fill(0, $jumlah_hari, 0); // inisialisasi array laporan per hari dengan nilai awal kosong
            $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $search);
            $laporansQuery = Laporan::with('kategoriLaporan', 'siswa', 'user')
                ->whereMonth('tanggal_waktu', $searchDate->format('m'));
            $kelas = auth()->user()->guru->kelas_id;
            if ($kelas) {
                $laporansQuery->whereHas('siswa', function ($query) use ($kelas) {
                    $query->where('kelas_id', $kelas);
                });
            }
            $laporans = $laporansQuery->get();
            $laporansGrouped = $laporans->groupBy(function ($laporan) {
                return $laporan->created_at->format('d');
            });

            $laporan_per_hari = [];
            for ($i = 0; $i <= $jumlah_hari; $i++) {
                $laporan_per_hari[$i] = isset($laporansGrouped[$i]) ? $laporansGrouped[$i]->count() : 0;
            }

            // $kelas = Kelas::where('id', (Guru::find('kode_user', auth()->user())->kode_user))->kelas_id;

            return view('views-table.laporan-table', [
                    'laporan' => $laporan,
                    'color' => $colors,
                    // 'nama_kelas' => $kelas->nama_kelas,

                    'day' => $day,
                    'laporan_day' => $laporan_per_hari,
                    'tahun' => $tahun,
                    'bulan' => date('F', strtotime($search)),
            ]);
        }
    }

    public function laporan_create(){
        $jurusan = Jurusan::all();
        $kategoriLaporan = KategoriLaporan::all();
        return view('form.laporan-form', compact('jurusan', 'kategoriLaporan'));
    }

    public function laporanStore(Request $request){
        $validateData = $request->validate([
            'deskripsi_laporan' => [],
            'nis' => ['required'],
        ]);

        Laporan::create([
            'deskripsi_laporan' => $request['deskripsi_laporan'],
            'tanggal_waktu' => now()->format('y-m-d h:m:s'),
            'user_id' => auth()->user()->id,
            'nis' => $request['nis'],
            'kategori_laporan_id' => $request['kategori_id'],
        ]);

    }

    public function laporanDetail($nis){
        $nis = decrypt($nis);
        $laporan = Laporan::where('nis', $nis)->get();
        $siswa = Siswa::where('nis', $nis)->first();
        $guru = Guru::where('kelas_id', $siswa->kelas->id)->first();
        return view('laporan-detail', compact('laporan', 'siswa', 'guru'));
    }

    public function kategoriLaporanIndex(){
        $kategori = KategoriLaporan::all();
        $colors = [];

        foreach ($kategori as $kat) {
            switch ($kat->jenis_pelanggaran) {
                case 'Ringan':
                    $colors[] = 'success';
                    break;

                case 'Berat':
                    $colors[] = 'danger';
                    break;

                case 'Sedang':
                    $colors[] = 'warning';
                    break;

                default:
                    $colors[] = '';
                    break;
            }
        }

        return view('views-table.kategoriLaporan-table', [
            'kategori' => $kategori,
            'color' => $colors,
        ]);
    }

    public function kategoriLaporan_create(){
        return view('form.kategoriLaporan-form', [
            'kategori_laporan' => KategoriLaporan::all(),
        ]);
    }

    public function kategoriLaporanStore(Request $request){
        $validateData = $request->validate([
            'nama_pelanggaran' => ['required', 'unique:kategori_laporans'],
            'jenis_pelanggaran' => ['required'],
            'deskripsi_pelanggaran' => [],
        ]);

        KategoriLaporan::create($validateData);
        return redirect()->route('laporan.index')->with('success', 'Berhasil menambahkan kategori baru dengan "Jenis Pelanggaran": '. $validateData['jenis_pelanggaran']);
    }

    public function kategoriLaporan_edit($id){
        $id = decrypt($id);
        $kategori = KategoriLaporan::find($id);

        return view('form.kategoriLaporan-form',[
            'kategori' => $kategori,
        ]);
    }

    public function kategoriLaporanUpdate(Request $request, $id){
        $id = decrypt($id);
        $kategoriLaporan = KategoriLaporan::find($id);
        $validateData = $request->validate([
            'nama_pelanggaran' => ['required', Rule::unique('kategori_laporans', 'nama_pelanggaran')->ignore($kategoriLaporan->id)],
            'jenis_pelanggaran' => ['required'],
            'deskripsi_pelanggaran' => [],
        ]);

        $kategoriLaporan->update($validateData);
        return redirect()->route('laporan')->with('success', 'Berhasil mengubah data kategori pelanggaran: '. $validateData['nama_pelanggaran']);
    }

    public function kategoriLaporanDelete($id){
        KategoriLaporan::destroy($id);
        return redirect()->route('laporan')->with('success', 'Berhasil Menghapus data kategori laporan.');
    }
}
