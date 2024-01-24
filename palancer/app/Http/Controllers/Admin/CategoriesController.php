<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->ajax()) {
            return response()->json(($categories));
        }
        return view('Admin.Categories.Home', compact('categories'));
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $request->merge([
                'slug' =>  Str::slug($request->name)
            ]);
            try {
                $request->validate([
                    'name' => 'required',
                    'slug' => 'unique:categories,slug',
                    'image' => 'required'
                ]);

                $newCategory = Category::create([
                    'name'  => $request->name,
                    'parent_id' => $request->parent_id,
                    'slug' => $request->slug,
                    'image' => $request->image,
                    'status' => $request->status,
                ]);
                return response()->json($newCategory);
            } catch (ValidationException $exception) {
                return response()->json([
                    'success' => false,
                    'data' => [
                        'code' => $exception->status,
                        'message' => $exception->getMessage(),
                        'errors' => $exception->errors()
                    ]
                ], $exception->status);
            }
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('Admin.Categories.Edit', compact('category', 'categories'));
    }


    public function update(Request $request, $id)
    {

        $category = Category::where('id', $id)->first();

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'image' => $request->image
        ]);

        return response()->json($category);
    }



    public function delete($id)
    {
        Category::find($id)->delete();
    }
}
