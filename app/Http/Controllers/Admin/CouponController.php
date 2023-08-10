<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CouponCreateService;
use App\Http\Services\CouponUpdateService;
use App\Http\Services\TogglerService;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function index(): View
    {
        $coupons = Coupon::all();
        return view('coupon.index', compact('coupons'));
    }

    public function create(): View
    {
        return view('coupon.form');
    }

    public function store(Request $request): RedirectResponse
    {
        CouponCreateService::create($request);
        toast('Coupon added success', 'success');
        return redirect()->route('coupon.index');
    }

    public function edit(Coupon $coupon): View
    {
        return view('coupon.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon): RedirectResponse
    {
        CouponUpdateService::update($request, $coupon);
        toast('Coupon update success', 'success');
        return redirect()->route('coupon.index');
    }

    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();
        toast('Coupon delete success', 'success');
        return redirect()->route('coupon.index');
    }

    public function statusToggle(Request $request): JsonResponse
    {
        $product = Coupon::findOrFail($request->coupon);
        TogglerService::toggle($request, $product);
        toast('Coupon status change success', 'success');
        return response()->json(['status' => 200]);
    }
}
