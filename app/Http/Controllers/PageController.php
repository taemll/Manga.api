<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show(Request $request){
        $page_collection=Page::query();
        if(!empty($request->chapter_id)){
            $page_collection->where('chapter_id', $request->chapter_id);
        }
        $page = $page_collection->get();
        return $page;
    }

    public function countOfPages(Request $request){
        $pages = Page::where('chapter_id', $request->chapter_id)->get();
        $count = $pages->count();
        return $count;
    }

    public function create(Request $request){
        $data=$request->validate([
            'img_link'=>['required','url'],
            'chapter_id'=>['required','integer']
        ]);
        $page=Page::updateOrCreate($data);
        return $page;
    }
    public function update(Request $request, $id){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        try{
            $page=Page::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $page->update($data);
        return $page;
    }

    public function delete($id){
        try{
            $page = Page::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $page->delete();
        return response()->json('Successfully deleted', 204);
    }
}
