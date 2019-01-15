<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Coupon;
use App\Mail\SendCoupon;

class CouponController extends Controller
{

    public function json()
    {
        $data = Coupon::dt()->search()->get();
        $recordsTotal = Coupon::count();
        $recordsFiltered = Coupon::search()->count();
        return compact('data', 'recordsTotal', 'recordsFiltered');
    }

    public function index()
    {
        return view('admin.coupons.index');
    }

    public function create()
    {
        $coupon = new Coupon;
        return view('admin.coupons.form', compact('coupon'));
    }

    public function store(CouponRequest $request)
    {
        $coupon = new Coupon($request->all());
        $this->saveCoupon($coupon);
        $this->sendCoupon($coupon);
        return redirect('admin/coupons#new');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.form', compact('coupon'));
    }

    public function update(Coupon $coupon, CouponRequest $request)
    {
        $coupon->fill($request->all());
        $this->saveCoupon($coupon);
        $this->sendCoupon($coupon);
        return redirect('admin/coupons#edit');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return ['success' => true];
    }

    private function saveCoupon($coupon)
    {
        $coupon->setToken();
        $coupon->save();
        if (!request()->input('clients')) {
            $coupon->clients()->sync(\App\Client::all()->pluck('id'));
        }else {
            $coupon->clients()->sync(request()->input('clients'));
        }
    }

    private function sendCoupon($coupon)
    {
        $coupon->clients->each(function ($client) use ($coupon) {
            $date = request()->input('date');
            $email = new SendCoupon($client, $coupon, $date);
            try {
                \Mail::to($client)->queue($email);
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
            }
        });
    }

}
