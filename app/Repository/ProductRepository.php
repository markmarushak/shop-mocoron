<?php

namespace App\Repository;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\RepositoryInterface\ProductRepositoryInterface;

class ProductRepository extends Controller implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::with(['photos', 'price'])->paginate(3);
    }

    public function personal($user_id)
    {
        return Product::with(['photos', 'price'])
            ->where('user_id', $user_id)
            ->paginate(3);

    }

    public function show($product_id)
    {
        return Product::with(['photos', 'price'])
            ->where('id', $product_id)
            ->first();
    }

    public function create($request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:3',
            'text' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png',
            'price' => 'required'
        ]);

        $product = Product::create([
            'user_id' => \Auth::user()->id,
            'name' => $request->name,
            'text' => $request->text
        ]);

        $product->photos()->create([
            'path' => basename($request->file('photo')->store('public/product_photo')),
            'order' => 1
        ]);
        $product->price()->create(
            $product->currency(
                $request->price
            )
        );

        return redirect()->route('home');

    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $product =Product::find($id);
        return $product->delete();
    }


}