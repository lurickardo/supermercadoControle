<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tb_category';
    protected $primaryKey = 'id_category';

    public function Subcategory()
    {
        return $this->hasMany('App\Models\Subcategory', 'id_category', 'id_category');
    }

    public function Product()
    {
        return $this->hasMany('App\Models\Product', 'id_category', 'id_category');
    }
}
