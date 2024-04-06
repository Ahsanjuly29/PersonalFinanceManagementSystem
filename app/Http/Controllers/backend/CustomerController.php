<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::query();
        if (!empty($request->search)) {
            $customer->where('name', 'like', "%$request->search%")
                ->orWhere('slug', 'like', "%$request->search%");
        }

        return view('backend.customer', [
            'searchData' => $request->search ?? '',
            'customers' => $customer->paginate(100),
            'editData' => !empty($request->id) ? $customer->find($request->id) : ''
        ]);
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->validated();
        try {
            $data["slug"] = getSlugName($request->business_name);
            Customer::create($data);
            return back()->withSuccess("Successfully Added New Customer's Info");
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        try {
            $data = $request->validated();
            $data['slug'] = getSlugName($request->business_name);
            $customer->find($request->id)->update($data);
            return redirect()->route('blade.customer.index')->withSuccess("Successfully Updated Customer's Info");
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        Customer::destroy(explode(',', $request->ids));
        return redirect()->route('blade.customer.index')->withSuccess('Deleted Succesfully');
    }
}
