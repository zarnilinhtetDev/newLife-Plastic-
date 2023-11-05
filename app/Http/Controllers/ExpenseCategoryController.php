<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function expense_category()
    {
        $categories = ExpenseCategory::latest()->get();
        return view('blade.expense_category.expense_category', compact('categories'));
    }

    public function category_store(Request $request)
    {
        $category = $request->validate([
            'category_name' => 'required',
            'description' => 'required',

        ]);
        $category = ExpenseCategory::create($category);
        return redirect()->back()->with('success', 'Expense Category Register is Successful');
    }
    public function category_delete($id)
    {
        $category = ExpenseCategory::find($id);
        $category->delete();
        return redirect()->back()->with('deleteStatus', 'Category Delete is Successful');
    }
    public function category_show($id)
    {
        $category_update = ExpenseCategory::find($id);
        return view('blade.expense_category.category_show', compact('category_update'));
    }

    public function category_update(Request $request, $id)
    {
        $category = ExpenseCategory::find($id);
        $category->update($request->all());
        return redirect()->route('expense-category')->with('updateStatus', 'Expense Category Update Successful');
    }
}
