<?php
namespace App\Http\Controllers;
use App\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('about.index', [
            'title' => 'About'
        ]);
    }

}