<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function show(Request $request){
        $chapter_collection=Chapter::query();
        if(!empty($request->manga_id)){
            $chapter_collection->where('manga_id', $request->manga_id);
        }
        // $chapter_collection = Chapter::with(['page'])->where('title',$data);
        $chapter = $chapter_collection->with(['pages'])->get();
        return $chapter;
    }

    public function create(Request $request){
        $data=$request->validate([
            'title'=>['max:255', 'string'],
            'manga_id'=>['required','integer']
        ]);
        $chapter=Chapter::updateOrCreate($data); 
        return $chapter;
    }
    public function update(Request $request, $id){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        try{
            $chapter=Chapter::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $chapter->update($data);
        return $chapter;
    }

    public function delete($id){
        try{
            $chapter = Chapter::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $chapter->delete();
        return response()->json('Successfully deleted', 204);
    }
}
