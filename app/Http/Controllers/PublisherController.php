<?php

namespace App\Http\Controllers;
use App\Models\Publisher;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function show(){
        $publisher=Publisher::get();
        return $publisher;
    }

    public function create(Request $request){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        $publisher=Publisher::updateOrCreate(['name'=>$data['name']]);
        return $publisher;
    }

    public function update(Request $request, $id){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        try{
            $publisher=Publisher::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $publisher->update(['name'=>$data['name']]);
        return response()->json('Successfully updated', 201);
    }

    public function delete($id){
        try{
            $publisher = Publisher::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $publisher->delete();
        return response()->json('Successfully deleted', 204);
    }
}
