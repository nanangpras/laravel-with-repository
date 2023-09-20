@extends('layouts.home')
@section('content')
    <div class="position-relative">
        <form action="{{route('invoice.store')}}" method="POST">
            @csrf
            <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
                <h5 class="text-center mb-5">Tambah Invoice</h5>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="code" placeholder="Kode" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="order_id" placeholder="Order ID" aria-label="First name">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <input type="date" class="form-control" name="date_invoice" placeholder="Nama" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="total_amount" placeholder="Total" aria-label="First name">
                    </div>
                    <div class="col">
                        <select name="status" id="status" class="form-control">
                            <option value="proses">Proses</option>
                            <option value="pending">Pending</option>
                            <option value="sukses">Sukses</option>
                            <option value="gagal">Gagal</option>
                        </select>
                    </div>
                </div>
                <a type="button" href="{{route('invoice.index')}}" class="btn btn-warning mt-5">Kembali</a>
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
