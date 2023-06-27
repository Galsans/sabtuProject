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
                            <li class="breadcrumb-item active">Form Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Form Category
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Form Input Category
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $category->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Category</label>
                                <input type="text" name="namaKategori" class="form-control"
                                    value="{{ $category->namaKategori }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">SAVE</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">BACK</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
