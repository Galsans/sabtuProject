@extends('admin.master')
@section('title', 'Halaman Form Produk')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Form Product</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Form Produk
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Form Input Produk</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="namaProduk" class="form-control"
                                    placeholder="masukkan nama produk" required>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="ktr" class="form-control"
                                    placeholder="masukkan keterangan produk" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control"
                                    placeholder="masukkan harga produk" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="qty" class="form-control"
                                    placeholder="masukkan jumlah produk" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="img" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">SAVE</button>
                                <button type="reset" class="btn btn-warning">CANCEL</button>
                                <a href="{{ route('produk.index') }}" class="btn btn-secondary">BACK</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
