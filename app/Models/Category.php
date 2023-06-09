<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function section()
    {
        return $this->belongTo('App\Models\Section','section_id')->select('id','name');
    }
    public function parentCategory()
    {
        return $this->belongTo('App\Models\Category','parent_id')->select('id','category_name');
    }
    public function subCategories()
    {
        return $this->hasMany('App\Models\Category','parent_id')->where('status',1);
    }
}
