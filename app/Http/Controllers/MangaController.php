<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{
    public function show(){
        $manga=Manga::get();
        return $manga;
    }

    public function create(Request $request){
        $manga=Manga::create([
        'type_id' =>$request->type_id,
        'title'=>$request->title,
        'release_age' =>$request->release_age,
        'author_id'=>$request->author_id,
        'genre_id'=>$request->genre_id,
        'publisher_id'=>$request->publisher_id
        'description' =>$request->description,
        'img_link' =>$request->img_link]);
        return $manga;
    }

    public function update(Request $request, $id){
        try{
            $manga=Manga::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $manga->update([
            'type_id' =>$request->type_id,
            'title'=>$request->title,
            'release_age' =>$request->release_age,
            'author_id'=>$request->author_id,
            'genre_id'=>$request->genre_id,
            'publisher_id'=>$request->publisher_id
            'description' =>$request->description,
            'img_link' =>$request->img_link]);
        return response()->json('Successfully updated', 201);
    }

    public function delete($id){
        try{
            $manga = Manga::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $manga->delete();
        return response()->json('Successfully deleted', 204);
    }
}
