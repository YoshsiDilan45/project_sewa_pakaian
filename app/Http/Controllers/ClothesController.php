<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clothes.index', [
            'title' => 'Admin',
            'menu' => 'Clothes',
            'datas' => Clothes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clothes.create', [
            'title' => 'Admin',
            'menu' => 'Clothes',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_pakaian = DB::table('pakaians')
        ->where('nama_pakaian', '=' , $request->nama_pakaian)
        ->value('nama_pakaian');

        if ($nama_pakaian){
            return redirect()->route('clothes.create')
        ->with('Clothes Name '. $request->nama_pakaian .   'Clothes Has been succesfully Save ')->withInput();
        }else{ 
            $data = $request->only([
           'nama_pakaian', 'jenis', 'model', 'warna' , 'ukuran', 'bahan', 'deskripsi', 'stok','harga_sewa'
        ]);
        
        if($request->file('foto1') !== null){
           $data['foto1'] = $request->file('foto1')->store('Pakaian');
        }
        if($request->file('foto2') !== null){
            $data['foto2'] = $request->file('foto2')->store('Pakaian');
        }
        if($request->file('foto3') !== null){
            $data['foto3'] = $request->file('foto3')->store('Pakaian');
        }
        $simpan = Clothes::create($data);
        if($simpan){  

            return redirect()->route('clothes.index')->with('pesan', 'Clothes '
            . $request->jenis . 
            ' Data has been succesfully saved'
        );
        }
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Clothes = Clothes::findOrfail($id);
        return view('clothes.edit' , [
            'title' => 'Admin',
            'menu' => 'Clothes',
            'data' => $Clothes,
            'clothes' => $Clothes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pakaian' => 'required|string|max:100|unique:pakaians,nama_pakaian,' . $id,
            'jenis' => 'string|max:100',
            'model' => 'string|max:100',
            'warna' => 'string|max:50',
            'ukuran' => 'string|max:50',
            'bahan' => 'string|max:50',
            'stok' => 'integer|min:0',
            'harga_sewa' => 'integer|min:0',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = Clothes::find($id);
        if (!$data) {
            return redirect()->route('clothes.index')->with('status', 'not_found');
        }
    
        $data->nama_pakaian = $request->nama_pakaian;
        $data->jenis = $request->jenis;
        $data->model = $request->model;
        $data->warna = $request->warna;
        $data->deskripsi = $request->deskripsi;
        $data->ukuran = $request->ukuran;
        $data->bahan = $request->bahan;
        $data->stok = $request->stok;
        $data->harga_sewa = $request->harga_sewa;
        // $foto1_lama = Clothes::find($id)->value('foto1');
        // $foto2_lama = Clothes::find($id)->value('foto2');
        // $foto3_lama = Clothes::find($id)->value('foto3');


        if ($request->file('foto1') !== null) {
            if ($data->foto1) {
                Storage::delete($data->foto1); // Delete old photo if it exists
            }
            $data->foto1 = $request->file('foto1')->store('Pakaian');
        }
    
        if ($request->file('foto2') !== null) {
            if ($data->foto2) {
                Storage::delete($data->foto2); // Delete old photo if it exists
            }
            $data->foto2 = $request->file('foto2')->store('Pakaian');
        }
    
        if ($request->file('foto3') !== null) {
            if ($data->foto3) {
                Storage::delete($data->foto3); // Delete old photo if it exists
            }
            $data->foto3 = $request->file('foto3')->store('Pakaian');
        }
        
        $data->save();

        
    
        return redirect()->route('clothes.index')->with([
            'status' => 'edit',
            'pesan' => 'Clothes ' . $request->jenis . ' Has been successfully edited'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $foto1 = Clothes::find($id)->value('foto1');
        $foto2 = Clothes::find($id)->value('foto2');
        $foto3 = Clothes::find($id)->value('foto3');
        if($foto1 !== null) storage::delete($foto1);
        if($foto2 !== null) storage::delete($foto2);
        if($foto3 !== null) storage::delete($foto3);
        Clothes::find($id )-> delete();
        return redirect()->route('clothes.index')
        ->with('pesan',  'Clothes Has been succesfully Deleted ');
            // 'title' => 'Admin',
            // 'menu' => 'Clothes',
            // 'datas' => Clothes::all(),
            // 'pesan' => 'Payment Method Data Has been succesfully Deleted '
            
    }
}