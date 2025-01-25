<?php

namespace App\Http\Controllers;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class Payment_MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment_method.index', [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => PaymentMethod::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment_method.create', [
            'title' => 'Admin',
            'menu' => 'Payment Method'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $payment_method = DB::table('jenis_pembayarans')
        ->where('metode_pembayaran', '=', $request->metode_pembayaran)
        ->value('metode_pembayaran');
        // mencari data payment method apakah sudah ada di database?

        if($payment_method){ // jika data ada maka kembali ke form create dan memberikan pesan duplikasi data
            return view('payment_method.create', [
                'title' => 'Admin',
                'menu' => 'Payment Method',
                'status' => 'duplikat',
                'pesan' => 'Payment Method'
                . $request->metode_pembayaran .
                ' Data is already in the Database!',
                'metode_pembayaran' => $request->metode_pembayaran
            ]);
    }else{  // jika data tidak ada maka simpan data ke database
        $data = $request->only([
            'metode_pembayaran'
        ]);
        $simpan = PaymentMethod::create($data);
        if($simpan){
            return view('payment_method.index',[
                'title' => 'Admin',
                'menu' => 'Payment Method',
                'datas' => PaymentMethod::all(),
                'status' => 'simpan',
                'pesan' => 'Payment Method'
                . $request->metode_pembayaran .
                ' Data has been succesfully saved'
            ]);
        }
    }
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentmethod = PaymentMethod::find($id);
        return view('payment_method.edit', [
            'title' => 'Admin', 
            'menu' => 'Payment Method', 
            'data' => $paymentmethod,
        ]);
    }

    public function update(Request $request, string $id)
    {$paymentmethod = DB ::table('jenis_pembayarans')
        ->where('metode_pembayaran', '=', $request->metode_pembayaran)
        ->value('metode_pembayaran');

        if($paymentmethod){
            return view('payment_method.edit', [
               'title' => 'Admin',
            //    'nama' => Auth::user()->name,
            //    'level' => Auth::user()->level,
               'menu' => 'Payment Method',
               'status' => 'duplikat',
               'pesan' => 'Payment Method '
               . $request->metode_pembayaran .
               ' Data is already in the Database',
               'metode_pembayaran' => $request->metode_pembayaran, 
               'data_lama' =>$request->metode_pembayaran
            ]);
        }else{

        $data = PaymentMethod::find($id);
        $data->metode_pembayaran = $request ->metode_pembayaran;
        $data->save();
        return view('payment_method.index' , [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => PaymentMethod::all(),
            'status' => 'edit',
            'pesan' => 'Payment Method '
            . $request->metode_pembayaran .
            ' Data has been succesfully Edited'
        ]);
    }
}   
        
    
    public function destroy($id)
    {
        // dd($id);
        PaymentMethod::find($id)->delete(); 
        return view('payment_method.index',[
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => PaymentMethod::all(),
            'pesan' =>  'Payment Method Data has been succesfully Deleted'
        ]);
    }
}
