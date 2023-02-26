<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Laporan\Laporan;
use Illuminate\Validation\Rule;
use App\Models\Laporan\KategoriLaporan;


class LaporanController extends Controller
{
    public function laporanIndex(Request $request){
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

        foreach ($laporan as $lap) {
            $lap_tanggal = date('d', strtotime($lap->tanggal_waktu));
            $laporan_per_hari[$lap_tanggal] = $lap->count(); // memasukkan laporan ke dalam array laporan per hari sesuai tanggal
        }

        // dd($laporan_per_hari);
        // dd($day);
        return view('views-table.laporan-table', [
            'laporan' => $laporan,
            'color' => $colors,

            'day' => $day,
            'laporan_day' => $laporan_per_hari,
            'tahun' => $tahun,
            'bulan' => date('F', strtotime($search)),
        ]);
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
        return view('form.kategoriLaporan-form',[
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
        return redirect()->route('laporan')->with('success', 'Berhasil menambahkan kategori baru dengan "Jenis Pelanggaran": '. $validateData['jenis_pelanggaran']);
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
