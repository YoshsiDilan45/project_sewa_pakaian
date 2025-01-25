@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <div class="col-auto me-auto mb-4 h4">Payment Method::edit</div>

                    <form action="@isset($data){{ route('payment_method.update', $data) }}@endisset" method="POST" id="frmPaymentMethod">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="paymentmethod" class="form-label">Payment Method</label>
                            <input class="form-control" name="metode_pembayaran" id="paymentmethod" maxlength="30"
                                type="text" aria-label="default input example"
                                value="@isset($data){{ $data['metode_pembayaran'] }}@elseif(isset($data_lama)){{ $data_lama }}@endisset">
                            <div id="paymentmethodHelp" class="form-text text-warning"> Payment Method Must Be filled in and maximal 30 characters
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('payment_method.index') }}" class="btn btn-secondary">
                                <i class="fas fa-window-close me-2"></i> Cancel
                            </a>
                            <button type="button" class="btn btn-primary" id="save"><i class="fas fa-save me-2"></i> Edit New Payment Method</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="status" class="invisible">@isset($status){{ $status }}@endisset</div> -->
    <div id="pesan" class="invisible">@isset($pesan){{ $pesan }}@endisset</div>

    <script>
        const btnSimpan = document.getElementById('save')
        const payment = document.getElementById('paymentmethod')
        const form = document.getElementById('frmPaymentMethod')
        const status = document.getElementById('status')
        const pesan = document.getElementById('pesan')
        const body = document.getElementById('body')

        function tampil_pesan() {
            if (pesan.innerHTML.trim() !== '') {
                swal('Data Duplication', pesan.innerHTML, 'error')
            }
        }

        function simpan() {
            if (payment.value === '') {
                payment.focus()
                swal("Invalid Data!", "You must choose the Payment Method first!", "error")
            } else {
                form.submit()
            }
        }

        window.onload = function() {
            tampil_pesan()
        }

        btnSimpan.onclick = function() {
            simpan()
        }
    </script>
@endsection