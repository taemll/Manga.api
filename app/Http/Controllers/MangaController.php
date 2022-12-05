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
            $manga_collection = DB::table('manga')
            ->select('manga.id','manga.title','manga.description','manga.img_link','manga.release_age','types.name as type','authors.name as author','publishers.name as publisher','genres.name as genre')
            ->join('authors','authors.id',"=",'manga.author_id')
            ->join('genres','genres.id',"=",'manga.genre_id')
            ->join('publishers','publishers.id',"=",'manga.publisher_id')
            ->join('types','types.id',"=",'manga.type_id')
            ->where('manga.id', '=', $request->id)
            ->paginate(20);
            return $manga_collection;
        }
        if(!empty($request->type_id)){
            $manga_collection->where('type_id',"=",$request->type_id);
        }
        $manga = $manga_collection->paginate(20);
        return $manga;
    }

    public function create(Request $request){
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
        $manga=Manga::create([
        'type_id' =>$data['type_id'],
        'title'=>$data['title'],
        'release_age' =>$data['release_age'],
        'author_id'=>$data['author_id'],
        'genre_id'=>$data['genre_id'],
        'publisher_id'=>$data['publisher_id'],
        'description' =>$data['description'],
        'img_link' =>$data['img_link']
        ]);
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
        $manga->update([
            'type_id' =>$data['type_id'],
            'title'=>$data['title'],
            'release_age' =>$data['release_age'],
            'author_id'=>$data['author_id'],
            'genre_id'=>$data['genre_id'],
            'publisher_id'=>$data['publisher_id'],
            'description' =>$data['description'],
            'img_link' =>$data['img_link']
        ]);
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
