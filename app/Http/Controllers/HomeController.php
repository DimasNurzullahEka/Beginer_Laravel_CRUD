<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home(){
       return view('welcome');
   }
   public function viewProduct(){
       return view('products');
   }
   public function edit(){
       return view('edit');
   }
}
