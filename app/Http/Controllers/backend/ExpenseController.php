<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\Expense\CreateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $expense = Expense::query();
        $this->filterData($request, $expense);

        return view('backend.expense.index', [
            'searchData' => $request->search ?? '',
            'expenses' => $expense->paginate(100),
            'editData' => !empty($request->id) ? $expense->find($request->id) : ''
        ]);
    }

    public function create()
    {
        return view('backend.expense.create');
    }

    public function store(CreateExpenseRequest $request)
    {
    }

    public function edit(Expense $expense)
    {
        return view('backend.expense.edit', [
            'expense' => $expense->with('expenseDetails', 'expenseImage')
        ]);
    }

    public function update(CreateExpenseRequest $request, Expense $expense)
    {
    }

    public function delete(Request $request)
    {
        Expense::destroy(explode(',', $request->ids));
        return redirect()->route('blade.expense.index')->withSuccess('Deleted Succesfully');
    }

    public function filterData($request, $expense)
    {
        if (!empty($request->search)) {
            $expense->where('total_buying_price', 'like', "%$request->search%")
                ->orWhere('seller_details', 'like', "%$request->search%");
        }

        return $expense;
    }
}
