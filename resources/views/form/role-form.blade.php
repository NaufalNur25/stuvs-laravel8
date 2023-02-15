@extends('layout.master-layout')

@section('content')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <form action="{{route('store.role')}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="roleID" class="form-label">Nama Role</label>
                    <input class="form-control" list="namerole" id="roleID" placeholder="Nama role baru" required>
                    <datalist id="namerole">
                        @foreach ($role as $item)
                        <option value="{{ $item->name }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit" id="submitBtn">Buat Role</button>
                </div>
            </form>
        </div>
    </div>
@endsection
