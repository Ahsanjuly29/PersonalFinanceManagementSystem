<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\PaymentMethodRequest;
use App\Models\PaymentMethod;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {

        $paymentMethod = PaymentMethod::query();
        if (!empty($request->search)) {
            $paymentMethod->where('name', 'like', "%$request->search%")
                ->orWhere('slug', 'like', "%$request->search%");
        }

        return view('backend.paymentMethod', [
            'searchData' => $request->search ?? '',
            'paymentMethods' => $paymentMethod->paginate(100),
            'editData' => !empty($request->id) ? $paymentMethod->find($request->id) : ''
        ]);
    }

    public function store(PaymentMethodRequest $request)
    {
        try {
            $data = $request->validated();
            $data["slug"] = getSlugName($request->business_name);
            PaymentMethod::create($data);
            return back()->withSuccess("Successfully Added New PaymentMethod's Info");
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        try {
            $data = $request->validated();
            $data['slug'] = getSlugName($request->business_name);
            $paymentMethod->find($request->id)->update($data);
            return redirect()->route('blade.payment.method.index')->withSuccess("Successfully Updated PaymentMethod's Info");
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        PaymentMethod::destroy(explode(',', $request->ids));
        return redirect()->route('blade.payment.method.index')->withSuccess('Deleted Succesfully');
    }
}
