@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4>Edit Clothes</h4>
                    <form action="{{ route('clothes.update', $clothes->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Clothes Name -->
                        <div class="mb-3">
                            <label for="nama_pakaian" class="form-label">Clothes Name</label>
                            <input type="text" class="form-control" id="nama_pakaian" name="nama_pakaian" value="{{ $clothes->nama_pakaian }}" required>
                        </div>

                        <!-- Type -->
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Type</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $clothes->jenis }}" required>
                        </div>

                        <!-- Model -->
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="{{ $clothes->model }}" required>
                        </div>

                        <!-- Color -->
                        <div class="mb-3">
                            <label for="warna" class="form-label">Color</label>
                            <input type="text" class="form-control" id="warna" name="warna" value="{{ $clothes->warna }}" required>
                        </div>

                        <!-- Size -->
                        <div class="mb-3">
                            <label for="ukuran" class="form-label">Size</label>
                            <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ $clothes->ukuran }}" required>
                        </div>

                        <!-- Material -->
                        <div class="mb-3">
                            <label for="bahan" class="form-label">Material</label>
                            <input type="text" class="form-control" id="bahan" name="bahan" value="{{ $clothes->bahan }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Description</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $clothes->deskripsi }}</textarea>
                        </div>

                        <!-- Stock -->
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="{{ $clothes->stok }}" required>
                        </div>

                        <!-- Rent's Price -->
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Rent's Price</label>
                            <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="{{ $clothes->harga_sewa }}" required>
                        </div>

                        <!-- Images -->
                        <div class="mb-3">
                            <label for="foto1" class="form-label">1st Image</label>
                            <input type="file" class="form-control" id="foto1" name="foto1">
                            @if($clothes->foto1)
                                <img src="{{ asset('storage/' . $clothes->foto1) }}" alt="Foto 1" class="mt-2" style="width: 100px;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="foto2" class="form-label">2nd Image</label>
                            <input type="file" class="form-control" id="foto2" name="foto2">
                            @if($clothes->foto2)
                                <img src="{{ asset('storage/' . $clothes->foto2) }}" alt="Foto 2" class="mt-2" style="width: 100px;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="foto3" class="form-label">3rd Image</label>
                            <input type="file" class="form-control" id="foto3" name="foto3">
                            @if($clothes->foto3)
                                <img src="{{ asset('storage/' . $clothes->foto3) }}" alt="Foto 3" class="mt-2" style="width: 100px;">
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('clothes.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
