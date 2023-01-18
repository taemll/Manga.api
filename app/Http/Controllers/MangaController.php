<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Illuminate\Support\Facades\DB;

class MangaController extends Controller
{
    public function show(Request $request){
        $data=$request->validate([
            'title'=> ['max:255', 'string']
            //'type_id' =>['required','integer']
        ]);
        $manga_collection=Manga::query();
        if(!empty($data['title'])){
            $manga_collection->where(DB::raw('LOWER(title)'), 'like', '%'.strtolower($data['title']).'%');
        }
        if(!empty($request->id)){
            $manga_collection->where('id', $request->id);
        }
        if(!empty($request->type_id)){
            $manga_collection->where('type_id', $request->type_id);
        }
        $manga = $manga_collection->with(['chapters', 'author', 'genre', 'publisher', 'type'])->paginate(20);
        
        return $manga;
    }

    public function item($item){
        $manga = Manga::with(['chapters', 'author', 'genre', 'publisher', 'type'])
        ->find($item)->paginate(20);

        return $manga;
    }   

    public function create(Request $request){
        $data = $request->validate([
            'type_id' =>['required','integer'],
            'title'=>['max:255', 'string'],
            'release_age' =>['required','integer'],
            'author_id'=>['required','integer'],
            'genre_id'=>['required','integer'],
            'publisher_id'=>['required','integer'],
            'description' =>['string'],
            'img_link' =>['required','url']
        ]);
        $manga=Manga::create($data);

        return $manga;
    }

    public function update(Request $request, $id){
        $data=$request->validate([
            'type_id' =>['required','integer'],
            'title'=>['max:255', 'string'],
            'release_age' =>['required','integer'],
            'author_id'=>['required','integer'],
            'genre_id'=>['required','integer'],
            'publisher_id'=>['required','integer'],
            'description' =>['string'],
            'img_link' =>['required','url']
        ]);
        try{
            $manga=Manga::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $manga->update($data);

        return $manga;
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
