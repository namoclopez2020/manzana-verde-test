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
            return response()->json($validator->errors(), 422);
        }

        $params = $validator->validated();
        $food_id = $params['food_id'];
        $user_id = $request->user()->id;

        $per_page_selected = 10;
        $current_page_selected = 1;
        $per_page_unselected = 10;
        $current_page_unselected = 1;

        if(isset($request['lists'])){
            $per_page_selected = isset($request['lists']['selected']['per_page']) ?  $request['lists']['selected']['per_page'] : 10;
            $per_page_selected = is_numeric($per_page_selected) ? (int) $per_page_selected : 10;

            $current_page_selected = isset($request['lists']['selected']['page']) ?  $request['lists']['selected']['page'] : 1;
            $current_page_selected = is_numeric($current_page_selected) ? (int) $current_page_selected : 1;

            $per_page_unselected = isset($request['lists']['notSelected']['per_page']) ?  $request['lists']['notSelected']['per_page'] : 10;
            $per_page_unselected = is_numeric($per_page_unselected) ? (int) $per_page_unselected : 10;

            $current_page_unselected = isset($request['lists']['notSelected']['page']) ?  $request['lists']['notSelected']['page'] : 1;
            $current_page_unselected = is_numeric($current_page_unselected) ? (int) $current_page_unselected : 1;
        }

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
        
        $filtro_unselected_foods = [
            'per_page' => $per_page_unselected,
            'current_page' => $current_page_unselected,
            'user_id' => $request->user()->id,
            'seleccionados' => false
        ];

        $foods_unselected = Food::list($filtro_unselected_foods);


        $filtro_selected_foods = [
            'per_page' => $current_page_selected,
            'current_page' => $current_page_selected,
            'user_id' => $request->user()->id,
            'seleccionados' => true
        ];

        $foods_selected = Food::list($filtro_selected_foods);
        
        $result = [
            'data' => [
                'message' => 'Comida asignada correctamente',
                'lists' => [
                    'unselected' => $foods_unselected,
                    'selected' => $foods_selected
                ]
            ]
        ];
        return response()->json($result,200);
        
        
    }

    public function delete(Request $request){

        $validator = Validator::make($request->all(), [
            'food_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $params = $validator->validated();

        $user_id = $request->user()->id;
        $food_id = $params['food_id'];

        $per_page_selected = 10;
        $current_page_selected = 1;
        $per_page_unselected = 10;
        $current_page_unselected = 1;

        if(isset($request['lists'])){
            $per_page_selected = isset($request['lists']['selected']['per_page']) ?  $request['lists']['selected']['per_page'] : 10;
            $per_page_selected = is_numeric($per_page_selected) ? (int) $per_page_selected : 10;

            $current_page_selected = isset($request['lists']['selected']['page']) ?  $request['lists']['selected']['page'] : 1;
            $current_page_selected = is_numeric($current_page_selected) ? (int) $current_page_selected : 1;

            $per_page_unselected = isset($request['lists']['notSelected']['per_page']) ?  $request['lists']['notSelected']['per_page'] : 10;
            $per_page_unselected = is_numeric($per_page_unselected) ? (int) $per_page_unselected : 10;

            $current_page_unselected = isset($request['lists']['notSelected']['page']) ?  $request['lists']['notSelected']['page'] : 1;
            $current_page_unselected = is_numeric($current_page_unselected) ? (int) $current_page_unselected : 1;
        }

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

        $filtro_unselected_foods = [
            'per_page' => $per_page_unselected,
            'current_page' => $current_page_unselected,
            'user_id' => $request->user()->id,
            'seleccionados' => false
        ];

        $foods_unselected = Food::list($filtro_unselected_foods);


        $filtro_selected_foods = [
            'per_page' => $current_page_selected,
            'current_page' => $current_page_selected,
            'user_id' => $request->user()->id,
            'seleccionados' => true
        ];

        $foods_selected = Food::list($filtro_selected_foods);

        $result = [
            'data' => [
                'message' => 'Comida removida de la lista correctamente',
                'lists' => [
                    'unselected' => $foods_unselected,
                    'selected' => $foods_selected
                ]
            ]
        ];
        return response()->json($result,200);
        
    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods',
            'description' => 'required',
            'picture' => 'required|url',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $params = $validator->validated();

        $food = Food::create($params);

        $per_page_unselected = 10;
        $current_page_unselected = 1;

        if(isset($request['lists'])){
            $per_page_unselected = isset($request['lists']['notSelected']['per_page']) ?  $request['lists']['notSelected']['per_page'] : 10;
            $per_page_unselected = is_numeric($per_page_unselected) ? (int) $per_page_unselected : 10;

            $current_page_unselected = isset($request['lists']['notSelected']['page']) ?  $request['lists']['notSelected']['page'] : 1;
            $current_page_unselected = is_numeric($current_page_unselected) ? (int) $current_page_unselected : 1;
        }

        $filtro_unselected_foods = [
            'per_page' => $per_page_unselected,
            'current_page' => $current_page_unselected,
            'user_id' => $request->user()->id,
            'seleccionados' => false
        ];

        $foods_unselected = Food::list($filtro_unselected_foods);

        $result = [
            'data' => [
                'message' => 'Comida creada correctamente',
                'lists' => [
                    'unselected' => $foods_unselected
                ]
            ]
        ];
        return response()->json($result,200);

    }

    public function generateImage(Request $request){

        $validator = Validator::make($request->all(), [
            'food' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $params = $validator->validated();

        $picture = new Picture;

        $response = $picture->search(['query' => $params['food'] ,'per_page' => 1000]);

        $fotos = $response['data']['photos'];
        $foto_url = $response['data']['photos'][random_int(0,count($fotos) - 1)];

        $result = [
            'data' => [
                'image' => $foto_url
            ]
        ];

        return response()->json($result,200);

    }
}
