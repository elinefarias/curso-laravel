<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Throwable;

class ProductsService
{
    public function all():object {
        return Product::all();
    }

    public function findById(int $id): object {
        return Product::find($id);
    }

    public function create(array $data): Product {
        try {
            DB::beginTransaction();

            $product = new Product($data);
            $product->save();

            DB::commit();

            return $product;
        }
        catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function update(array $data, int $id): Product
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            $product->update($data);

            DB::commit();

            return $product;
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function update(array $data, int $id): array {
        try {
            DB::beginTransaction();
            $product = $this->findById($id);
            $product->update($data);
            DB::commit();

            return $product->toArray();
        }
        catch (Throwable $th){
            DB::rollBack();
            throw $th;
        }
    }

}