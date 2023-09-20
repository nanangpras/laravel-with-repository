@extends('layouts.home')
@section('content')
<div class="position-relative">
    <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
        <div class="text-center mb-5">
            <h5>Order</h5>
            <a href="{{route('order.create')}}" class="btn btn-success btn-sm">Tambah Order</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->client_id}}</td>
                        <td>{{$item->date_invoice}}</td>
                        <td>{{$item->total_amount}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
