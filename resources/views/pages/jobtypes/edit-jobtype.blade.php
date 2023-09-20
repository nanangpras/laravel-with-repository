@extends('layouts.home')
@section('content')
    <div class="position-relative">
        <form action="{{route('jobtype.update',$edit->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
                <h5 class="text-center mb-5">Tipe Pekerjaan</h5>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" value="{{$edit->name}}"
                        name="name" placeholder="Nama" aria-label="First name">
                    </div>
                </div>
                <a type="button" href="{{route('jobtype.index')}}" class="btn btn-warning mt-5">Kembali</a>
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
