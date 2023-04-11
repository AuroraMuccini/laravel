<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'targa' => ['required', 'max:255'],
            'chilometraggio' => ['required', 'integer'],
            
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }
        $car= new Car();
        $car->targa=$request->input('targa');
        $car->chilometraggio=$request->input('chilometraggio');
       $car->save();
       return response()->json($car,201);

    }
    public function delete(Request $request, $id) {
        
        $car=Car::where('id','=',$id)->firstOrFail();
        $car->delete();
        return response()->json(null,204);
    }
    public function read(Request $request, $id) {
        
        $car= Car::where('id','=',$id)->firstOrFail();
        return response()->json($car);

    }
    public function readAll(Request $request) {
    //Operazione di SELECT su DB
        
        $car= Car::with('reviews')->get();
        
        return response()->json($car,200);

    }
    public function update(Request $request, $id) {
      
        $validator = Validator::make($request->all(), [
            'targa' => ['required', 'max:255'],
            'chilometraggio' => ['required', 'integer'],
        
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

      
        $car= Car::where('id','=',$id)->firstOrFail();
     

        $car->targa=$request->input('targa');
        $car->chilometraggio=$request->input('chilometraggio');
        
      
        $car->save();

        return response()->json($car,200);
}
}