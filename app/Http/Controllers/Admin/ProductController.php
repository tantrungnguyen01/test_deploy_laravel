<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show table all product
     */
    public function index()
    {
        $products = DB::table('products')->orderBy('created_at', 'DESC')->get();

        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show form for create product
     */
    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Processing push data to table
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        if ($request->image) {
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = $filename;
        }

        DB::table('products')->insert($data);

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    /**
     * Show form for edit product
     */
    public function edit($id)
    {
        $categories = DB::table('categories')->get();

        $product = DB::table('products')->where('id', $id)->first();

        return view('admin.product.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Processing update data from table
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'image');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;

        if (!empty($request->image)) {
            $product = DB::table('products')->where('id', $id)->first();
            if (file_exists(public_path('image/') . $product->image)) {
                unlink(public_path('image/') . $product->image);
            }

            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = $filename;
        }

        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('admin.product.index')->with('success', 'product updated successfully');
    }

    /**
     * Delete a product
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (file_exists(public_path('image/') . $product->image)) {
            unlink(public_path('image/') . $product->image);
        }

        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('admin.product.index')->with('success', 'User deleted successfully');
    }
}
