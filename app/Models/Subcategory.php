<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'tb_subcategory';
    protected $primaryKey = 'id_subcategory';

    function Category(){
        return $this->belongsTo('App\Models\Category', 'id_category', 'id_category');
    }

    public function Product()
    {
        return $this->hasMany('App\Models\Product', 'id_subcategory', 'id_subcategory');
    }
}
