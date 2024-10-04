<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function save(Request $request)
    {

        try {
            $data =  $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'price' => 'required|decimal:0,2|gt:0',
                'stock' => 'required|numeric|gte:0'
            ]);

            Product::create($data);

            return redirect(route("products.index"));
        } catch (\Exception $ex) {

            return response()->json([
                'message' => 'No se pudo crear nuevo producto.',
                'error' => $ex->getMessage(),
            ], 400);
        }
    }

    public function getProductById(int $id)
    {   

        $product = Product::find($id);
        return  $product ? $product : "No existe producto con el ID: $id";
        
    }

    public function update(int $id, Request $request)
    {
        $productToUpdate = Product::find($id);
        if ($productToUpdate) {
            try {
                $data = $request->validate([
                    'name' => 'nullable',
                    'description' => 'nullable',
                    'price' => 'nullable|decimal:0,2|gt:0',
                    'stock' => 'nullable|numeric|gte:0'
                ]);

                $productToUpdate->update([
                    'name' => $data['name'] ?? $productToUpdate->name,
                    'description' => $data['description'] ?? $productToUpdate->description,
                    'price' => $data['price'] ?? $productToUpdate->price,
                    'stock' => $data['stock'] ?? $productToUpdate->stock
                ]);

                return redirect(route("products.index"));
            } catch (\Exception $ex) {

                return response()->json([
                    'message' => "No se pudo editar el producto con el ID: $id.",
                    'error' => $ex->getMessage(),
                ], 400);
            }
        }
        return response()->json(['error' => "No existe producto con el ID: $id"], 404);
    }

    public function delete(int $id)
    {
        $productToUpdate = Product::find($id);
        if ($productToUpdate) {
            $productToUpdate->delete();
            return redirect(route("products.index"));
        }

        return response()->json(['error' => "No existe producto con el ID: $id"], 404);
    }
}
