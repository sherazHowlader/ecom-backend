<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('coupon.form');
    }

    public function store(Request $request)
    {
       Coupon::create([
            'name'     => $request->coupon_name,
            'discount'  => $request->discount,
        ]);

        toast('Coupon added success','success');
        return redirect()->route('coupon.index');
    }

    public function show(Coupon $coupon)
    {
        //
    }

    public function edit(Coupon $coupon)
    {
        return view('coupon.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update([
            'name'     => $request->coupon_name,
            'discount' => $request->discount,
        ]);

        toast('Coupon update success','success');
        return redirect()->route('coupon.index');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        toast('Coupon delete success','success');
        return redirect()->route('coupon.index');
    }

    public function statusToggle(Request $request)
    {
        $product = Coupon::findOrFail($request->coupon);

        $product->update([
            'status' => $request->status == true ? false : true,
        ]);
        toast('Coupon status change success','success');
        return response()->json($product);
    }
}
