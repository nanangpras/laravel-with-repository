@extends('layouts.home')
@section('content')
<div class="position-relative">
    <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
        <div class="text-center mb-5">
            <h5>Pekerjaan</h5>
            <a href="{{route('job.create')}}" class="btn btn-success btn-sm">Tambah Pekerjaan</a>
        </div>

        <table class="table table-hover">
            <caption>Data Pekerjaan</caption>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Tipe</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($job as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>{{$item->job_type_id}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a type="button" href="{{route('job.edit',$item->id)}}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('job.destroy',$item->id)}}" method="POST">
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
