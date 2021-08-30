<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'products';
    protected $fillable = ['name', 'price', 'description','image'];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter){
            if($filter) {//se o filter for diferente de null
                // $query->where('name','=',$filter);
                $query->where('name','LIKE',"%{$filter}%");
                // $query->where('description','LIKE',"%{$filter}%");
            }
        })//->toSql();
        ->paginate();
        //dd($results);
        return $results;
    }
}
