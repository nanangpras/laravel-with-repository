@extends('layouts.home')
@section('content')
<div class="position-relative">
    <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
        <div class="text-center mb-5">
            <h5>Penawaran</h5>
            <a href="{{route('service-offer.create')}}" class="btn btn-success btn-sm">Tambah Penawaran</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Client ID</th>
                    <th>Project ID</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($service_offer as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->client_id}}</td>
                        <td>{{$item->project_id}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->date_offer}}</td>
                        <td>Rp {{$item->price}}</td>
                        <td>
                            <a type="button" href="{{route('service-offer.edit',$item->id)}}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('service-offer.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Data akan dihapus?')"
                                class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
