<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $minutes = \Carbon\Carbon::now()->addMinutes(10);
        $products = \Cache::remember('api::products', $minutes, function () {
            return Product::all();//Quando ocache não existir ou for invalido
        });
        return $products;
    }

    public function store(ProductRequest $request)
    {
        \Cache::forget('api::products');
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        return Product::create($data);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return $product;
    }












    public function show(Product $product)
    {
        return $product;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }



















}
