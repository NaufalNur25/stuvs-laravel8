@extends('layout.main-layout')

@section('content')
<div class="container mt-5">
    <div class="card text-start">
        <div class="card-body">
          <form action="/register" method="post">
            @csrf
              <div class="mb-3">
                <label for="nis" class="form-label">Nomor Induk Siswa</label>
                <input name="nis" type="text" class="form-control @error('nis')
                is-invalid
                @enderror" id="nis" autofocus required value="{{ old('nis') }}">
                @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control @error('username')
                is-invalid
                @enderror" id="username" required value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control @error('email')
                    is-invalid
                @enderror" id="email" aria-describedby="emailHelp" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password')
                is-invalid
                @enderror" id="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation')
                is-invalid
                @enderror" id="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
      </div>
</div>
@endsection
