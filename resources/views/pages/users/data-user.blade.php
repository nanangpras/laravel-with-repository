@extends('layouts.home')
@section('content')
<div class="position-relative">
    <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
        <div class="text-center mb-5">
            <h5>User</h5>
            <a href="{{route('user.create')}}" class="btn btn-success btn-sm">Tambah User</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a type="button" href="{{route('user.edit',$item->id)}}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('user.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Data akan dihapus?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
