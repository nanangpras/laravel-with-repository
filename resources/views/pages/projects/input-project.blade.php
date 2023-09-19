@extends('layouts.home')
@section('content')
    <div class="position-relative">
        <form action="{{route('project.store')}}" method="POST">
            @csrf
            <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
                <h5 class="text-center mb-5">Proyek</h5>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" placeholder="Nama" aria-label="First name">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10">Deskripsi</textarea>
                    </div>
                </div>
                <a type="button" href="{{route('project.index')}}" class="btn btn-warning mt-5">Kembali</a>
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
