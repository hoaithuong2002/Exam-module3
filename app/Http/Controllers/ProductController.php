<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->paginate(4);
        return view('index',compact('products'));
    }
    public function create()
    {

        return view('add');

    }
    public function store(Request $request): RedirectResponse
    {
//        dd($request);
        $product= new Product();
        $product->fill($request->all());

        $path = $request->file('image')->store('avatars','public');
        $product->image = $path;

        $product->save();
        toastr()->success('Congratulations on your successful creation!!!');
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $file->storeAs('public/avatars', 'anh_' . $product->id);
        }
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $file->storeAs('public/avatars', 'anh_' . $product->id);
            $product->image = 'avatars/anh_' . $product->id;
        }

        $product->save();
        toastr()->success('You have successfully updated your information!!!');
        return redirect()->route('index');

    }

    public function destroy($id):RedirectResponse
    {
        $product = Product::findOrFail($id);
        try {
            $product=$this->productService->getByID($id);
            Storage::disk('public')->delete($product->image);
            $product->roles()->detach();
            $product->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            \toastr()->error('chuc nang bi loi , lien he admin');
        }
        toastr()->success('You have remove to public!');
        return redirect()->route('index');

    }

    public function search(Request $request)
    {
        $search= $request->search;
        $products = DB::table('products')->where('name','LIKE',"%$search%")->paginate(4);
        return view('index',compact('products'));
    }

}
