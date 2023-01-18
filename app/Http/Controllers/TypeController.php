<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function show(){
        $type=Type::get();
        return $type;
    }

    public function create(Request $request){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        $type=Type::create($data);
        return $type;
    }

    public function update(Request $request, $id){
        $data=$request->validate([
            'name'=>['max:255', 'string'],
        ]);
        try{
            $type=Type::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $type->update($data);
        return $type;
    }

    public function delete($id){
        try{
            $type = Type::findOrFail($id);
        } catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $type->delete();
        return response()->json('Successfully deleted', 204);
    }
}
