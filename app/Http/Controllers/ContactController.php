<?php
namespace App\Http\Controllers;
use App\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('contact.index', [
            'title' => 'Contact'
        ]);
    }

}