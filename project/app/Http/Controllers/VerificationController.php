<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'checkdate' => ['required', 'max:255'],
            'car_id' => ['required', 'integer']
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }
        $verification= new Verification();
        $verification->checkdate=$request->input('checkdate');
        $verification->car_id=$request->input('car_id');
       $verification->save();
       return response()->json($verification,201);

    }
    public function delete(Request $request, $id) {
        
        $verification=Verification::where('id','=',$id)->firstOrFail();
        $verification->delete();
        return response()->json(null,204);
    }
    public function read(Request $request, $id) {
        
        $verification= Verification::where('id','=',$id)->firstOrFail();
        return response()->json($verification);

    }
    public function readAll(Request $request) {
    //Operazione di SELECT su DB
        
        $verification= Verification::with('cars')->get();
        
        return response()->json($verification,200);

    }
    public function update(Request $request, $id) {
      
        $validator = Validator::make($request->all(), [
            'checkdate' => ['required', 'max:255'],
            'car_id' => ['required', 'integer']
        
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

      
        $verification= Verification::where('id','=',$id)->firstOrFail();
     

        $verification->checkdate=$request->input('checkdate');
        $verification->car_id=$request->input('car_id');
    
        
      
        $verification->save();

        return response()->json($verification,200);
}
}
