@extends('layout.master-layout')
@section('content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name">Admin Stuvs</h5>
                            </div>
                            <div class="about">
                                <h5>About</h5>
                                <p>I'm Naufal as Admin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                {{-- {{dd($user)}} --}}
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                <div class="form-group mb-3">
                                    <label for="kode_user">NIS</label>
                                    <input type="url" class="form-control mt-2" id="kode_user"
                                        placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control my-2" id="nama_lengkap"
                                        placeholder="{{optional($user->siswa)->nama_lengkap ?? optional($user->guru)->nama_lengkap}}"
                                        value="{{optional($user->siswa)->nama_lengkap ?? optional($user->guru)->nama_lengkap}}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control mt-2" id="email"
                                        placeholder="{{auth()->user()->email}}" value="{{auth()->user()->email}}" disabled>
                                </div>
                            </div>
                            <div class="{{empty(optional($user->siswa)->nama_lengkap) && empty(optional($user->guru)->nama_lengkap) ? 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' : 'col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'}}">
                                <div class="form-group mb-3">
                                    <label for="Username">Username</label>
                                    <input type="name" class="form-control my-2" id="Username"
                                        placeholder="{{auth()->user()->username}}" value="{{auth()->user()->username}}" disabled>
                                </div>
                            </div>
                            @if (!empty(optional($user->siswa)->nama_lengkap) || !empty(optional($user->guru)->nama_lengkap))
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-select my-2" aria-label="Default select example" id="jenis_kelamin" {{ !empty(optional($user->siswa)->nama_lengkap) && !empty(optional($user->guru)->nama_lengkap) ? 'disabled' : '' }}>
                                            <option selected disabled></option>
                                            <option value=""
                                            {{ optional($user->siswa)->jenis_kelamin == 'Laki-laki' ||
                                            optional($user->guru)->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value=""
                                            {{ optional($user->siswa)->jenis_kelamin == 'Perempuan' ||
                                            optional($user->guru)->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                @if (!empty(optional($user->guru)->nama_lengkap))
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Wali Kelas</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="jurusan" class="form-label">Jurusan</label>
                                        <select class="form-select" id="jurusan" required {{ @$siswa ? 'disabled' : '' }} onload="kelas()" disabled>
                                            <option selected disabled>...</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ optional($user->siswa)->kelas->jurusan->id === $item->id ? 'selected' : '' }}>{{ $item->nama_jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select class="form-select" id="kelas" name="kelas_id" required disabled></select>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right mb-3">
                                    <button type="button" id="submit" name="submit"
                                        class="btn btn-secondary">Cancel</button>
                                    <button type="button" id="submit" name="submit"
                                        class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('#jurusan').on('change', function() {
                let id_jurusan = $('#jurusan').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.getJurusanID') }}",
                    data: {
                        id_jurusan: id_jurusan
                    },
                    cache: false,

                    success: function(msg) {
                        $('#kelas').html(msg);

                        var id = <?php echo json_encode(optional($user->siswa)->kelas->id); ?>;
                        $(`option[value="${id}"]`).prop("selected", true);
                        console.log(id);
                    },
                    error: function(data) {
                        console.log('error: ', data)
                    }
                });
            });
            $('#jurusan').trigger('change');
        });
    });
</script>
@endsection
