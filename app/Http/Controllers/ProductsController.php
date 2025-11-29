<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Services\ProductsService;
use App\Http\Requests\ProductsRequest;
class ProductsController extends Controller
{
    private $productsService;

    public function __construct(ProductsService $productsService) {
        $this->productsService = $productsService;

    }

    public function index(): View
    {   $products = $this->productsService->all();
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
       return view('products.create');
    }

     /* public function store(ProductsRequest $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        // Permanecer na página de criação e mostrar mensagem de sucesso
        return redirect()->route('productsCreate')->with('success', 'Produto criado com sucesso.');
    } */
}
