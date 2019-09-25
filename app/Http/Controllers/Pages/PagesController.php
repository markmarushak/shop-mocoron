<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\Controller;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = new ProductRepository();
        return view('pages.index', [
            'products' => $products->all()
        ]);
    }

    public function product(Request $request)
    {
        return view('pages.product', [
           'product' =>  $this->productRepository->show($request->id)
        ]);
    }

}