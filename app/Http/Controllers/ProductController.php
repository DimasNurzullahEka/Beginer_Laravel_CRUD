<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(){
        return view('create');
    }
    public function store(Request $request){
        // Product::create($request->all());
        Product::create([
            'product_name'=>$request->product_name,
            'price'=>$request->stock,
            'stock'=>$request->stock
        ]);
        // return back(); ini digunakan untuk memanggil ke halaman tampilan awal
        // jika ini disaat mengklik akan ke halaman viewProduct
        return redirect('/products');
    }
    public function viewProduct(){
        $products = Product::all();
        return view('products',compact('products'));
    }
    public function edit($id){
        $product=Product::where('id',$id)->first();
        return view('edit',compact('product'));
    }
    // cara pertama
    // public function update(Request $request,$id){
    //     Product::where('id',$id)->update([
    //             'product_name'=>$request->product_name,
    //             'price'=>$request->price,
    //             'stock'=>$request->stock
    //     ]);
    //     return redirect('/products');
    // }
    // cara kedua
    public function update(Request $request ,$id)
    {
       Product::findOrFail($id)->update($request->all());
       return redirect('products');
    }
    public function delete($id){
        Product::destroy($id);
        return back();
    }
}
