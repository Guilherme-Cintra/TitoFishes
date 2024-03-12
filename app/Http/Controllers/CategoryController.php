<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function post(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'message'=>'Category created : ' . strval($category->name)
        ], 201);
    }

    public function delete($id) {
        try{
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'message'=>'Category deleted.'
        ], 201);
        } catch(ModelNotFoundException $e){
            return response()->json([
                'message'=> 'category with id ' . $id . ' not found'
            ], 404);
        }
    }

    public function getAll() {
        $categories = Category::all();
        
        return response()->json([
            'categories'=>$categories
        ], 201);
    }

    public function update(Request $request, $id) {
        try{
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json([
            'message'=>'category updated',
            'category'=>$category
        ], 200);
        } catch(ModelNotFoundException $e){
            return response()->json([
                'error'=>$e->getMessage(),
                'message'=> 'category with id' . strval($id) .' not found' 
            ], 404); 
        }
    }


}
