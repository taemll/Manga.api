<?php

namespace App\Http\Controllers;                                         

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function show(){
        $author=Author::get();
        return $author;
    }

    public function create(Request $request){
        $author=Author::create(['name'=>$request->name]);
        return $author;
    }

    public function update(Request $request, $id){
        try{
            $author=Author::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $author->update(['name'=>$request->name]);
        return response()->json('Successfully updated', 201);
    }

    public function delete($id){
        try{
            $author = Author::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $author->delete();
        return response()->json('Successfully deleted', 204);
    }
    
}
