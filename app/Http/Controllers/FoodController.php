<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\FoodUser;
use Validator;
use App\Models\Picture;

class FoodController extends Controller
{   
    public function list(Request $request){

        $params = $request->all();

        $per_page = isset($params['per_page']) ?  $params['per_page'] : 10;
        $per_page = is_numeric($per_page) ? (int) $per_page : 10;

        $current_page = isset($params['page']) ?  $params['page'] : 1;
        $current_page = is_numeric($current_page) ? (int) $current_page : 1;

        $filtro = [
            'per_page' => $per_page,
            'current_page' => $current_page,
            'user_id' => $request->user()->id,
            'seleccionados' => false
        ];

        $foods = Food::list($filtro);

        return [
            'data' => [
                'list' => $foods,
            ],
        ];
    }

    public function listOfUser(Request $request){

        
        $params = $request->all();

        $per_page = isset($params['per_page']) ?  $params['per_page'] : 10;
        $per_page = is_numeric($per_page) ? (int) $per_page : 10;

        $current_page = isset($params['page']) ?  $params['page'] : 1;
        $current_page = is_numeric($current_page) ? (int) $current_page : 1;

        $filtro = [
            'per_page' => $per_page,
            'user_id' => $request->user()->id,
            'seleccionados' => true,
            'current_page' => $current_page,
        ];

        $foods = Food::list($filtro);

        return [
            'data' => [
                'list' => $foods,
            ],
        ];

    }

    public function assign(Request $request){

        $validator = Validator::make($request->all(), [
            'food_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $params = $validator->validated();
        $food_id = $params['food_id'];
        $user_id = $request->user()->id;

        $seleccionado = FoodUser::where('user_id',$user_id)->where('food_id',$food_id)->get()->first();

        $errors = [];

        if($seleccionado){
            if($seleccionado->status == 1){
                $errors = [...$errors,'La comida ya ha sido asignada'];
                $result = [
                    'errors' => $errors
                ];
                return response()->json($result,409);
            }
            $seleccionado->status = 1;
            $seleccionado->save();
        }else{
            $valores = [
                'user_id' => $user_id,
                'food_id' => $params['food_id']
            ];

            $food_user = FoodUser::create($valores);

            if(!$food_user){
                $errors = [...$errors,'Hubo un error al asignar la comida'];
            }
        }

        if(!empty($errors)){
            $result = [
                'errors' => $errors
            ];
            return response()->json($errors,500);
        }
        
        $result = [
            'data' => [
                'message' => 'Comida asignada correctamente'
            ]
        ];
        return response()->json($result,200);
        
        
    }

    public function delete(Request $request){

        $validator = Validator::make($request->all(), [
            'food_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $params = $validator->validated();

        $user_id = $request->user()->id;
        $food_id = $params['food_id'];

        $seleccionado = FoodUser::where('user_id',$user_id)->where('food_id',$food_id)->get()->first();

        $errors = [];
        if(!$seleccionado){
            $errors = [...$errors,'La comida no está asignada'];
        }else{
            if($seleccionado->status == 0){
                $errors = [...$errors,'La comida ya fue removida de la lista de asignadas'];
            }
        } 

        if(!empty($errors)){
            $result = [
                'errors' => $errors
            ];
            return response()->json($result,409);
        }
        
        $seleccionado->status = 0;
        $seleccionado->save();

        $result = [
            'data' => [
                'message' => 'Comida removida de la lista correctamente'
            ]
        ];
        return response()->json($result,200);
        
    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'picture' => 'required|url',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $params = $validator->validated();

        $food = Food::create($params);

        $result = [
            'data' => [
                'message' => 'Comida creada correctamente'
            ]
        ];
        return response()->json($result,200);

    }

    public function generateImage(Request $request){

        $validator = Validator::make($request->all(), [
            'food' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $params = $validator->validated();

        $picture = new Picture;

        $response = $picture->search(['query' => $params['food'] ,'per_page' => 1]);

        $foto_url = $response['data']['photos'][0];

        $result = [
            'data' => [
                'image_url' => $foto_url
            ]
        ];

        return response()->json($result,200);

    }
}
