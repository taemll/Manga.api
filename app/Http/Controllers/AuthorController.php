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
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        $author=Author::create(['name'=>$data['name']]);
        return $author;
    }

    public function update(Request $request, $id){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        try{
            $author=Author::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $author->update(['name'=>$data['name']]);
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
