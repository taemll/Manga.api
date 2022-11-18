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
        $type=Type::create(['name'=>$request->name]);
        return $type;
    }

    public function update(Request $request, $id){
        try{
            $type=Type::findOrFail($id);
        }
        catch(\Exception $exception){
            throw new NotFoundException('not found');
        }
        $type->update(['name'=>$request->name]);
        return response()->json('Successfully updated', 201);
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
