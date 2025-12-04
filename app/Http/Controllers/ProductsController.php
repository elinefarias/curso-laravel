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

    public function store(ProductsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            $product = $this->productsService->create($data);

            return redirect()->route('productsCreate')->with('success', "Produto \"{$product->name}\" criado com sucesso.");
        } catch (\Throwable $th) {
            logger()->error('Erro ao criar produto: ' . $th->getMessage(), ['exception' => $th]);

            return back()->withErrors('Erro ao criar produto.')->withInput();
        }
    }

    public function update(ProductsRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        try {
            $updated = $this->productsService->update($data, $product->id);

            return redirect()->route('productsEdit', $updated->id)->with('success', "Produto \"{$updated->name}\" atualizado com sucesso.");
        } catch (\Throwable $th) {
            logger()->error('Erro ao atualizar produto: ' . $th->getMessage(), ['exception' => $th]);

            return back()->withErrors('Erro ao atualizar produto.')->withInput();
        }
    }

     public function edit(int $id): View {
        $product = $this->productsService->findById($id);
        return view('products.edit',compact('product'));
    }

    public function update(ProductsRequest $request, int $id): RedirectResponse{
        
    }
}
