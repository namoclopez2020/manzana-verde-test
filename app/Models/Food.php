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

        $data = $query->select([
            'foods.id',
            'name',
            'picture',
            'description'
        ])
        ->leftJoin('food_user AS f_u','f_u.food_id','foods.id');

        if($seleccionados){
            $data = $data->where('f_u.user_id',$user_id)->where('f_u.status',1);
        }else{
            $data = $data->where(function ($query) use ($user_id){
                $query->where('f_u.user_id','!=',$user_id)
                ->orWhere('f_u.status',0);
            });
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
