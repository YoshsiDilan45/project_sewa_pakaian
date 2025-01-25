@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')

     <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <h4 class="mb-0">Clothes::.create</h4>
                            </div>


                            <form action="{{route('clothes.store')}}" method="POST" id="frmClothes" enctype="multipart/form-data">
                                @csrf <!-- Jangan lupa menambahkan CSRF token -->
                                <div class="mb-3">
                                    <label for="nama_pakaian" class="form-label">Clothes Name</label>
                                    <input type="text" class="form-control" name="nama_pakaian" id="nama_pakaian" aria-label="default input example" maxlength="100" placeholder="-- Input Nama Pakaian --" value="@isset($nama_pakaian){{$nama_pakaian}}@endisset">
                                    <div id="clothes" class="form-text text-warning">Clothes Name Must Be Filled in and Maximal 100 Characters
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Type</label>
                                    <input type="text" class="form-control" name="jenis" id="jenis" aria-label="default input example" maxlength="100" placeholder="-- Input Jenis Pakaian --" value="@isset($jenis){{$jenis}}@endisset">
                                    <div id="clothes" class="form-text text-warning">Type Must Be Filled in and Maximal 100 Characters
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" aria-label="default input example" maxlength="100" placeholder="-- Input Model Pakaian --" value="@isset($model){{$model}}@endisset">
                                    <div id="model" class="form-text text-warning">Model Must Be Filled in and Maximal 100 Characters
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="warna" class="form-label">Color</label>
                                    <input type="text" class="form-control" name="warna" id="warna" aria-label="default input example" maxlength="100" placeholder="-- Input Warna Pakaian --" value="@isset($warna){{$warna}}@endisset">
                                    <div id="warna" class="form-text text-warning">Color Must Be Filled in and Maximal 100 Characters
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="ukuran" class="form-label">Size</label>
                                    <select name="ukuran" class="form-select" id="ukuran" required>
                                        <option value="" disabled selected>-- Select Size --</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="2XL">2XL</option>
                                        <option value="3XL">3XL</option>
                                        <option value="4XL">4XL</option>
                                        <option value="5XL">5XL</option>
                                        <option value="6XL">6XL</option>
                                        <option value="All Size">All Size</option>
                                    </select>
                                    <div id="ukuran" class="form-text text-warning">Select a valid size</div>
                                </div>

                                <div class="mb-3">
                                    <label for="bahan" class="form-label">Material</label>
                                    <input type="text" class="form-control" name="bahan" id="bahan" aria-label="default input example" maxlength="50" placeholder="-- Input Bahan Pakaian --" value="@isset($bahan){{$bahan}}@endisset">
                                    <div id="bahan" class="form-text text-warning">Material Must Be Filled in and Maximal 50 Characters
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Description</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" maxlength="255" placeholder="-- Input deskripsi Pakaian --">@isset($deskripsi){{$deskripsi}}@endisset</textarea>
                                    <div id="deskripsi" class="form-text text-warning">Description must be filled in and maximal 255 characters</div>
                                </div>

                                <div class="mb-3">
                                    <label for="foto1" class="form-label">Photo 1</label>
                                    <input type="file" class="form-control" name="foto1" id="foto1" aria-label="default input example">
                                    <div id="foto1" class="form-text text-warning">Upload the first image</div>
                                </div>

                                <div class="mb-3">
                                    <label for="foto2" class="form-label">Photo 2</label>
                                    <input type="file" class="form-control" name="foto2" id="foto2" aria-label="default input example">
                                    <div id="foto2" class="form-text text-warning">Upload the second image (optional)</div>
                                </div>

                                <div class="mb-3">
                                    <label for="foto3" class="form-label">Photo 3</label>
                                    <input type="file" class="form-control" name="foto3" id="foto3" aria-label="default input example">
                                    <div id="foto3" class="form-text text-warning">Upload the third image (optional)</div>
                                </div>

                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stock</label>
                                    <input type="number" class="form-control text-end" name="stok" id="stok" aria-label="default input example" value="0">
                                    <div id="stok" class="form-text text-warning">Input valid stock quantity</div>
                                </div>

                                <div class="mb-3">
                                    <label for="harga_sewa" class="form-label">Rent Price</label>
                                    <input type="number" class="form-control text-end" name="harga_sewa" id="harga_sewa" aria-label="default input example" value="0">
                                    <div id="harga_sewa" class="form-text text-warning">Input a valid rent price</div>
                                </div>

                                <div class="text-end">
                                <a href="{{route('clothes.index')}}" class="btn btn-secondary"><i class="fas fa-window-close me-2"></i>Cancel</a>
                                <button type="button" class="btn btn-primary" id="save"><i class="fas fa-save me-2"></i>Save New Clothes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            @if(isset($status) && $status == 'Duplicate!')
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            {{-- <div class="form-text text-danger fs-4 fw-bold" id="status"> {{$status}} </div> --}}
                            <div class="form-text text-danger fs-5" id="pesan"> {{$pesan}} </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <script>
                const btnSimpan = document.getElementById('save');
                const form = document.getElementById('frmClothes');
                const status = document.getElementById('status');
                const pesan = document.getElementById('pesan');
                const body = document.getElementById('body');

                // Mengambil nilai dari semua input
                const nama_pakaian = document.getElementById('nama_pakaian');
                const jenis = document.getElementById('jenis');
                const model = document.getElementById('model');
                const warna = document.getElementById('warna');
                const ukuran = document.getElementById('ukuran');
                const bahan = document.getElementById('bahan');
                const deskripsi = document.getElementById('deskripsi');
                const stok = document.getElementById('stok');
                const hargaSewa = document.getElementById('harga_sewa');

                function tampil_pesan(){
                    if(pesan.innerHTML.trim() !== ''){
                        swal('Duplicate Data!', pesan.innerHTML, 'error')
                    }
                }

                function simpan(event) {
                     // Cek apakah ada field yang kosong dan tampilkan pesan error sesuai
                     if (nama_pakaian.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please fill in the Clothes Name field.", "error");
                    } else if (jenis.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please fill in the Type field.", "error");
                    } else if (model.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please fill in the Model field.", "error");
                    } else if (warna.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please fill in the Color field.", "error");
                    } else if (ukuran.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please select a Size.", "error");
                    } else if (bahan.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please fill in the Material field.", "error");
                    } else if (deskripsi.value === '') {
                        event.preventDefault();
                        swal("Invalid Data!", "Please fill in the Description field.", "error");
                    } else {
                        // Menampilkan pesan sukses saat form valid dan berhasil disubmit
                        form.submit();
                    }
                }

                stok.onfocus = function(){
                    if(stok.value === '0') stok.value = '';
                }

                stok.onblur = function(){
                    if(stok.value === '') stok.value = '0';
                }

                stok.onkeydown = function(){
                    angka(event);
                }

                hargaSewa.onfocus = function(){
                    if(hargaSewa.value === '0') hargaSewa.value = '';
                }

                hargaSewa.onblur = function(){
                    if(hargaSewa.value === '') hargaSewa.value = '0';
                }

                hargaSewa.onkeydown = function(){
                    angka(event);
                }

                body.onload = function(){
                    tampil_pesan()
                }

                btnSimpan.onclick = function(event) {
                    simpan(event); // Kirim event ke fungsi simpan
                }
            </script>


{{-- <script>
    const btnSimpan = document.getElementById('save')
    const payment = document.getElementById('clothes')

    function simpan(){
        if(payment.value === 'Open this select menu')
            payment.focus()
            swal("Invalid Data!", "You must choose the Clothes first", "error")
    }

    btnSimpan.onclick = function(){
        simpan()
    }
</script> --}}
@endsection

