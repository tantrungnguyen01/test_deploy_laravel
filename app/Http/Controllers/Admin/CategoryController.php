<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Show table all category
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('created_at', 'DESC')->get();

        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show form for create category
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Processing push data to table
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        DB::table('categories')->insert($data);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
    }

    /**
     * Show form for edit category
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Processing update data from table
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        $data['user_id'] = 1;

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Delete a category
     */
    public function destroy($id = '')
    {
        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'User deleted successfully');
    }
}
