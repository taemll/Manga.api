<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show(){
        $genre=Genre::get();
        return $genre;
    }

    public function create(Request $request){
        $genre=Genre::updateOrCreate(['name'=>$request->name]);
        return $genre;
    }

    public function update(Request $request, $id){
        try{
            $genre=Genre::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $genre->update(['name'=>$request->name]);
        return response()->json('Successfully updated', 201);
    }

    public function delete($id){
        try{
            $genre = Genre::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $genre->delete();
        return response()->json('Successfully deleted', 204);
    }
}
