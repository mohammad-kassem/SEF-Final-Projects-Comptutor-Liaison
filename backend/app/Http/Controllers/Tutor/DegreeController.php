<?php

namespace App\Http\Controllers\Tutor;

use Auth;
use Validator;
use App\Models\User;
use App\Models\Degree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DegreeController extends Controller{
    public function get(){
        $user= auth()->user();

        $degrees = Degree::where('tutor_id', $user->id)->get();

        return response()->json([
            'status' => 'Success',
            'degrees' => $degrees,
        ], 200);
    }

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'university' => 'required|university',
            'degree' => 'required|degree',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = auth()->user();

        $degree = Degree::create([
            'university' => $request->university,
            'degree' => $request->degree,
            'tutor_id' => $user->id
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Degree successfully added',
            'degree' => $degree,
        ], 200);
    }

    public function delete($id){
        $degree = Degree::find($id)->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Degree successfully deleted'
        ], 200);
    }
    
    public function update(Request $request, $id){
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'university' => 'required|university',
            'degree' => 'required|degree',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $degree = Degree::find($id)->update([
            'university' => $request->university,
            'degree' => $request->degree,
            'tutor_id' => $user->id
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Degree successfully updated'
        ], 200);
    }
}