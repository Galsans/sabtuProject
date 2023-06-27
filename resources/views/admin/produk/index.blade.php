@extends('admin.master')
@section('title', 'Halaman Table Product')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables Product</li>
                    </ol>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <div class="d-flex title">
                            <i class="fas fa-table me-1"></i>
                            {{-- DataTable Form Produk --}}
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <a href="{{ route('produk.create') }}" class="btn btn-secondary">ADD</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produk as $produks)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $produks->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produks->namaProduk }}</td>
                                            <td>{{ $produks->ktr }}</td>
                                            <td>{{ $produks->harga }}</td>
                                            <td>{{ $produks->qty }}</td>
                                            <td><img src="{{ Storage::url($produks->img) }}" width="100" height="100"
                                                    alt=""></td>
                                            <td>
                                                <form action="{{ route('produk.delete', $produks->id) }}" method="POST"
                                                    class="d-flex aksibtn justify-content-between">
                                                    @csrf
                                                    <a href="{{ route('produk.edit', $produks->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    @method('DELETE')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-flat show_confirm"
                                                        title='Delete'><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">PRODUK BELUM ADA</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
