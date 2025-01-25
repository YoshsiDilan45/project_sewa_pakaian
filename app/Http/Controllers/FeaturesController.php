<?php
namespace App\Http\Controllers;
use App\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('features.index', [
            'title' => 'Shoping Cart'
        ]);
    }

}