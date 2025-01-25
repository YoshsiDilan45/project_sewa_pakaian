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
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                        <div class="col-auto me-auto mb-4 h4">Payment Method::.create</div>
                            <form action="{{ route('payment_method.store')}}" method="POST" id="frmPaymentMethod">
                                @csrf
                                <div class="mb-3">
                                    <label for="payment_method" class="form-label">Payment Method</label>
                                    <input type="text" class="form-control" name="metode_pembayaran" id="payment_method" 
                                    max-length="30" aria-label="default input example" value="@isset($metode_pembayaran){{$metode_pembayaran}} @endisset">
                                    <div id="payment-methodhelp" class="form-text text-warning">
                                        Payment Method Must Be filled in a maximal 30 characters
                                    </div> 
                                </div>
                                <div class="text-end">
                                <a href="{{route ('payment_method.index') }}" class="btn btn-danger">
                                    <i class="fas fa-window-close me-2"></i>Cancel
                                </a>
                                <button type="button" class="btn btn-primary" id="save">Save New Payment Method</button>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                
                            </form>
                        </div>
                    </div>
                </div>
</div>

<script>
    const btnSimpan = document.getElementById('save');
    const payment = document.getElementById('payment_method');
    const form = document.getElementById('frmPaymentMethod');
    const status = document.getElementById('status');
    const pesan = document.getElementById('pesan');
    const body = document.getElementById('body');

    

    // Function to show alert if there's a duplication
    function tampil_pesan() {
        if (pesan.innerHTML.trim() !== '') {
            swal('Data Duplication', pesan.innerHTML, 'error')
        }
    }

    // Function to save form data
    function simpan() {
        if(payment.value === ''){
            payment.focus()
            swal("Invalid Data!", "You mush choose the Payment Method first", "erorr")
        }else{
            form.submit()
        }
    }

    window.onload = function() {
        tampil_pesan();
    }

    btnSimpan.onclick = function() {
        simpan();
}

</script>

@endsection
