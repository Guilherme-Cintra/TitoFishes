<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Fish;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class FishController extends Controller {

    public function create(){
        return view('admin.addfish');
    }

    public function store(Request $request) {
        $fish = new Fish;
        $fish->name = $request->name;
        $fish->description = $request->description;
        $fish->price = $request->price;
        $fish->stock = $request->stock;
        $fish->species = $request->species;

        


        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName =md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            
            $requestImage->move(public_path('img/fish'), $imageName);

            $fish->image = $imageName;
        } else {
            $fish->image ="no img";
        }

        $fish->save();
        $fish->categories()->attach($request->categories);
        return response()->json([
            'message' => 'Fish created successfully',
            'fish' => $fish
        ], 201);
       
    }

    public function findById($id) {

        try{
            $fish = Fish::findOrFail($id);
        
            return response()->json([
                'message' => 'Fish found',
                'fish' => $fish
            ], 200);
        } catch (ModelNotFoundException $e){
            return response()->json([
                'error'=>$e->getMessage(),
                'message'=>'fish with id: '. strval($id) .' not found'
            ], 404);
        } catch (Exception $e){
            return response()->json([
                'error'=>$e->getMessage()
            ], 400);
        }
    }

    public function delete($id){
        try{
            $fish = Fish::findOrFail($id);

            $fish->delete();
            return response()->json([
                'message'=>'fish deleted succesfully'
            ],200);

        } catch(ModelNotFoundException $e){
            return response()->json([
                'error'=>$e->getMessage(),
                'message'=>'fish with id: '. strval($id) .' not found.'
            ], 404);
        }
    }

    public function update(Request $request, $id) {
        try{
        $fish = Fish::findOrFail($id);
        $fish->update($request->all());
        $fish->categories()->sync($request->categories);
        return response()->json([
            'message'=>'Fish updated',
            'fish'=>$fish
        ], 200);
        } catch(ModelNotFoundException $e){
            return response()->json([
                'error'=>$e->getMessage(),
                'message'=>'fish with id: ' . strval($id) . ' not found.'
            ], 404);
        }
    }

    public function getByCategory($cat){
        try{
        $category = Category::findOrFail($cat);
        
        $fishes = $category->fishes;
        return response()->json([
            'fishes' => $fishes
        ], 200);
        }
        catch(ModelNotFoundException $e){
            return response()->json([
                'error'=> $e->getMessage(),
                'message'=>'Category not found'
            ], 404);
        }
    }
}