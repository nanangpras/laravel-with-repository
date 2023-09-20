@extends('layouts.home')
@section('content')
    <div class="position-relative">
        <form action="{{route('service-offer.store')}}" method="POST">
            @csrf
            <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
                <h5 class="text-center mb-5">Penawaran</h5>
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="client_id" id="client_id">
                            @foreach ($client as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name="project_id" id="project_id">
                            @foreach ($proyek as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input type="date" class="form-control" name="date_offer" placeholder="Nama" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="price" placeholder="Harga" aria-label="First name">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">Deskripsi</textarea>
                    </div>
                </div>
                <a type="button" href="{{route('service-offer.index')}}" class="btn btn-warning mt-5">Kembali</a>
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
