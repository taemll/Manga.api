<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function show(){
        $genre=Genre::get();
        return $genre;
    }

    public function create(Request $request){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        $genre=Genre::updateOrCreate($data);
        return $genre;
    }

    public function update(Request $request, $id){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        try{
            $genre=Genre::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $genre->update($data);
        return $genre;
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
