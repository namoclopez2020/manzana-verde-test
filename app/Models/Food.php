<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'picture',
        'description'
    ];

    public function scopeList($query, $params = []){
        
        $user_id = isset($params['user_id']) ? $params['user_id'] : null;
        $per_page = isset($params['per_page']) ?  $params['per_page'] : 10;
        $per_page = is_numeric($per_page) ? (int) $per_page : 10;
        $current_page = isset($params['current_page']) ?  $params['current_page'] : 1;
        $current_page = is_numeric($current_page) ? (int) $current_page : 1;
        $seleccionados = $params['seleccionados'];

        $asignadas = FoodUser::select('food_id')
        ->where('user_id',$user_id)
        ->where('status',1)
        ->groupBy('food_id')->get()->toArray();

        $new_asignadas = [];
        if(!empty($asignadas)){
            foreach($asignadas as $value){
                $new_asignadas = [...$new_asignadas, $value['food_id']];
            }
        }

       
        $data = $query->select([
            'foods.id',
            'name',
            'picture',
            'description'
        ]);

        if($seleccionados){
            $data = $data->leftJoin('food_user AS f_u','f_u.food_id','foods.id')
            ->whereIn('foods.id',$new_asignadas)
            ->where('user_id',$user_id)
            ->orderBy('f_u.updated_at','desc');
        }else{
            $data = $data->whereNotIn('id',$new_asignadas)
            ->orderBy('created_at','desc');
        }
        
        $data = $data->paginate(
            $per_page, // per page (may be get it from request)
            ['*'], // columns to select from table (default *, means all fields)
            'page', // page name that holds the page number in the query string
            $current_page // current page, default 1
        );

        return $data;
    }
}
