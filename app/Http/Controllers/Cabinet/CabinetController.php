<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    private $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth');

        /* Add global varible for use */
        $this->productRepository  = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        return view('cabinet.home', [
            'products' => $this->productRepository->personal($user_id)
        ]);
    }

    public function product()
    {
        return view('cabinet.product');
    }

    public function createProduct(Request $request)
    {
        $this->productRepository->create($request);
        return redirect()->route('cabinet');
    }

    public function deleteProduct(Request $request)
    {
        $this->productRepository->delete($request->id);
        return redirect()->route('cabinet');
    }

    public function editAccount()
    {
        return view('cabinet.edit-account');
    }
}
