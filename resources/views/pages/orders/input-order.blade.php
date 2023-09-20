@extends('layouts.home')
@section('content')
    <div class="position-relative">
        <form action="{{route('order.store')}}" method="POST">
            @csrf
            <div class="position-absolute start-50 end-0 bottom-30 mt-5 translate-middle-x">
                <h5 class="text-center mb-5">Order</h5>
                Invoice
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="code" placeholder="Kode" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" name="date_invoice" placeholder="Kode" aria-label="First name">
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col">
                        <select name="client_id" id="client_id" class="form-control">
                            @foreach ($client as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
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
                Order Detail
                <div class="row mt-3" id="input_detail">
                    <div class="col">
                        <input type="text" class="form-control" name="project_id[]" placeholder="Project ID" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="qty[]" placeholder="QTY" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="unit_price[]" placeholder="Harga" aria-label="First name">
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success btn-sm btn_add" id="btn_add" attr-id="0">+</button>
                    </div>
                </div>
                <a type="button" href="{{route('order.index')}}" class="btn btn-warning mt-5">Kembali</a>
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function () {
            $("#btn_add").click(function (e) {
                e.preventDefault();
                let id = $(this).attr("attr-id");
                addInput(id);
            });
        });

        totalInput = 1;
        function addInput(id) {
            input = `
            <div class="row mt-3" id="input_detail_${totalInput}">
                    <div class="col">
                        <input type="text" class="form-control" name="project_id[]" placeholder="Project ID" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="qty[]" placeholder="QTY" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="unit_price[]" placeholder="Harga" aria-label="First name">
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-danger btn-sm btn_remove" id="btn_remove" attr-id="${totalInput}">x</button>
                    </div>
                </div>
            `;
            $('#input_detail').append(input);
            totalInput++;
         }

         $(document).on('click','#btn_remove', function () {
            let id = $(this).attr("attr-id");
            $(`#input_detail_${id}`).remove();
        });
    </script>
@endpush
