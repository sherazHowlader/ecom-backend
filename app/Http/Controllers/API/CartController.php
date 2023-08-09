<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\API\CartFilteringService;
use App\Http\Services\API\CartIncrementService;
use App\Http\Services\API\CartItemAddService;
use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getAllCarts(): JsonResponse
    {
        $carts = Carts::with('products.categorie')->get();
        CartFilteringService::getCartProducts($carts);
        return response()->json($carts);
    }

    public function addCartItem(Request $request): JsonResponse
    {
        $product = Product::findOrFail($request->product['id']);
        $hasCartItem = Carts::where('SKU', $request->product['SKU'])->first();

        if ($hasCartItem) {
            CartIncrementService::inc($request);
        } else {
            CartItemAddService::add($request, $product);
        }
        return response()->json(['status', 200]);
    }

    public function cartInc($SKU)
    {
        Carts::where('SKU', $SKU)
            ->increment('quantity', 1);
    }

    public function cartDec($SKU)
    {
        Carts::where('SKU', $SKU)
            ->decrement('quantity', 1);
    }

    public function removeCartItem($SKU)
    {
        Carts::where('SKU', $SKU)->delete();
    }
}
