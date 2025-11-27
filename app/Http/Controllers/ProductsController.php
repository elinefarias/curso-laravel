<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Http\Requests\ProductsRequest;
class ProductsController extends Controller
{
    public function index(): View
    {   $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
       return view('products.create');
    }

    public function store(ProductsRequest $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        return redirect()->route('products')->with('success', 'Produto criado com sucesso.');
    }
}
