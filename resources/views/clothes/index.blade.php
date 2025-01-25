@extends('be.master')
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('navbar')
    @include('be.navbar')
@endsection
@section('content')
    <!-- table start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4 ">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="mb-0">Clothes::.index</h4>
                        <a href="{{route('clothes.create')}}" class="btn btn-primary" type="button"><i class="fa fa-tshirt me-2"></i>Add New Clothes</a>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <input type="text" id="searchInput" class="form-control me-2" onkeyup="searchTable()" placeholder="Search...">
                    </div>
                    {{-- <h6 class="mb-4">Responsive Table</h6> --}}
                    <div class="table-responsive" id="clothesTable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Option</th>
                                    <th scope="col">No.</th>
                                    <th scope="col">Clothes Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">1<sup>st</sup>Images</th>
                                    <th scope="col">2<sup>nd</sup>Images</th>
                                    <th scope="col">3<sup>rd</sup>Images</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Rent's Price</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $data)
                                <tr>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- Edit Button -->
                                            <a href="{{ route('clothes.edit', $data->id) }}" class="btn btn-sm btn-warning rounded">
                                                <i class="fa fa-edit me-1"></i>Edit
                                            </a>
                                            <a href="{{ route('clothes.destroy', $data->id) }}" type="button" class="btn btn-sm btn-danger ms-2 rounded" onclick="hapus(event, this)">
                                                <i class="fas fa-trash me-1"></i>Delete
                                            </a>
                                            <!-- Delete Button -->
                                            {{-- <form action="{{ route('clothes.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ms-2 rounded" onclick="return confirm('Are you sure want to Delete {{$data['metode_pembayaran']}}?')">
                                                    <i class="fas fa-trash me-2"></i>Delete
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                    <th scope="row">{{$no+1 . "."}}</th>
                                    @if(strlen($data['nama_pakaian']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['nama_pakaian'] }}">
                                            {{ substr($data['nama_pakaian'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['nama_pakaian']}}</td>
                                    @endif
                                    @if(strlen($data['jenis']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['jenis'] }}">
                                            {{ substr($data['jenis'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['jenis']}}</td>
                                    @endif
                                    @if(strlen($data['model']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['model'] }}">
                                            {{ substr($data['model'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['model']}}</td>
                                    @endif
                                    @if(strlen($data['warna']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['warna'] }}">
                                            {{ substr($data['warna'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['warna']}}</td>
                                    @endif
                                    @if(strlen($data['ukuran']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['ukuran'] }}">
                                            {{ substr($data['ukuran'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['ukuran']}}</td>
                                    @endif
                                    @if(strlen($data['bahan']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['bahan'] }}">
                                            {{ substr($data['bahan'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['bahan']}}</td>
                                    @endif
                                    @if(strlen($data['deskripsi']) > 11)
                                        <td style="cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $data['deskripsi'] }}">
                                            {{ substr($data['deskripsi'],0 ,11). '...' }}
                                        </td>
                                        @else
                                        <td>{{$data['deskripsi']}}</td>
                                    @endif

                                    <td>
                                        @if($data['foto1'])
                                            <img src="{{ asset('storage/' . $data['foto1']) }}" alt="Foto 1" style="width: 100px; height: 100px; cursor: pointer;" onclick="showImageModal(this.src)">
                                        @else
                                            Foto Tidak Diinput
                                        @endif
                                    </td>
                                    <td>
                                        @if($data['foto2'])
                                            <img src="{{ asset('storage/' . $data['foto2']) }}" alt="Foto 2" style="width: 100px; height: 100px; cursor: pointer;" onclick="showImageModal(this.src)">
                                        @else
                                            Foto Tidak Diinput
                                        @endif
                                    </td>
                                    <td>
                                        @if($data['foto3'])
                                            <img src="{{ asset('storage/' . $data['foto3']) }}" alt="Foto 3" style="width: 100px; height: 100px; cursor: pointer;" onclick="showImageModal(this.src)">
                                        @else
                                            Foto Tidak Diinput
                                        @endif
                                    </td>
                                    <td>{{$data['stok']}}</td>
                                    <td>{{$data['harga_sewa']}}</td>

                                    {{-- <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-warning rounded"><i class="fa fa-edit me-2"></i>Edit</button>
                                            <button type="button" class="btn btn-danger ms-2 rounded"><i class="fas fa-trash me-2"></i>Delete</button>
                                        </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST" id="frmHapus">
        @method('DELETE')
        @csrf
    </form>

    {{-- <div class="invisible" id="status">@isset($status) {{$status}} @endisset</div> --}}
    <div class="invisible" id="pesan">@isset($pesan) {{$pesan}} @endisset</div>

<!-- Bootstrap Modal Structure -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                <img id="modalImage" src="" alt="Enlarged Image" class="img-fluid" style="max-height: 80vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Open Modal and Set Image -->
<script>
    function showImageModal(src) {
        var modalImage = document.getElementById("modalImage");
        modalImage.src = src;
        var imageModal = new bootstrap.Modal(document.getElementById("imageModal"));
        imageModal.show();
    }
</script>

    <script>
        const body = document.getElementById('body');
        const status = document.getElementById('status');
        const pesan = document.getElementById('pesan');
        const form = document.getElementById('frmHapus');

        function tampil_pesan(){
            if(pesan.innerHTML.trim() !== ''){
            swal('Good Job', pesan.innerHTML, 'success')
            // }else if(status.innerHTML.trim() === 'edit'){
            // swal('Good Job', pesan.innerHTML, 'success')
            }
        }

        function hapus(event, el){
            event.preventDefault()
            swal({
            title: "Are you sure?",
            text: "Your will delete the Clothes data permanently!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){

                form.setAttribute('action', el.getAttribute('href'))
                form.submit()
            });
        }

        body.onload = function(){
            tampil_pesan()
        }

    </script>

    <script>
        function searchTable() {
            // Ambil nilai input pencarian
            var input = document.getElementById("searchInput");
            var filter = input.value.toLowerCase();
            var table = document.getElementById("clothesTable");
            var tr = table.getElementsByTagName("tr");

            // Loop untuk semua baris tabel, sembunyikan baris yang tidak cocok dengan input pencarian
            for (var i = 1; i < tr.length; i++) {
                var tdArray = tr[i].getElementsByTagName("td");
                var match = false;

                // Loop untuk setiap kolom dalam baris
                for (var j = 0; j < tdArray.length; j++) {
                    if (tdArray[j]) {
                        if (tdArray[j].innerHTML.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                        }
                    }
                }
                tr[i].style.display = match ? "" : "none"; // Sembunyikan baris jika tidak ada kecocokan
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#clothesTable').DataTable();
        });
    </script>
@endsection
