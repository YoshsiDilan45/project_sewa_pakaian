<?php
namespace App\Http\Controllers;
use App\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('blog.index', [
            'title' => 'Blog'
        ]);
    }

}