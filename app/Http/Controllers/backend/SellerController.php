<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\SellerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        $seller = Seller::query();
        if (!empty($request->search)) {
            $seller->where('name', 'like', "%$request->search%")
                ->orWhere('slug', 'like', "%$request->search%");
        }

        return view('backend.seller', [
            'searchData' => $request->search ?? '',
            'sellers' => $seller->paginate(100),
            'editData' => !empty($request->id) ? $seller->find($request->id) : ''
        ]);
    }

    public function store(SellerRequest $request)
    {
        try {
            $data = $request->validated();
            $data["slug"] = getSlugName($request->business_name);
            Seller::create($data);
            return back()->withSuccess("Successfully Added New Seller's Info");
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function update(SellerRequest $request, Seller $seller)
    {
        try {
            $data = $request->validated();
            $data['slug'] = getSlugName($request->business_name);
            $seller->find($request->id)->update($data);
            return redirect()->route('blade.seller.index')->withSuccess("Successfully Updated Seller's Info");
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        Seller::destroy(explode(',', $request->ids));
        return redirect()->route('blade.seller.index')->withSuccess('Deleted Succesfully');
    }
}
