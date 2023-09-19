@extends('layouts.home')
@section('content')
    <div class="position-relative">
        <form action="{{route('client.store')}}" method="POST">
            @csrf
            <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
                <h5 class="text-center mb-5">Client</h5>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" placeholder="Nama" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Last name">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="text" class="form-control" name="reference_company_id"
                        placeholder="Company" aria-label="Last name">
                    </div>
                    <div class="col">
                        <input type="text" name="phone" class="form-control" placeholder="Telp" aria-label="Last name">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <textarea name="address" class="form-control" id="address" cols="30" rows="10">Alamat</textarea>
                    </div>
                </div>
                <a type="button" href="{{route('client.index')}}" class="btn btn-warning mt-5">Kembali</a>
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
