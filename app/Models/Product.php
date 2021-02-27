<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_product';
    protected $primaryKey = 'id_product';

    function Category(){
        return $this->belongsTo('App\Models\Category', 'id_category', 'id_category');
    }

    function Subcategory(){
        return $this->belongsTo('App\Models\Subcategory', 'id_subcategory', 'id_subcategory');
    }
}
