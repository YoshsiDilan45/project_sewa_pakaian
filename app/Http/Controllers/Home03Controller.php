<?php
namespace App\Http\Controllers;
use App\Request;

class Home03Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('home03.index');
    }

}