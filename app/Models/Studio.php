<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    public function category(){
		return $this->hasOne(Category::class,'id','category_id');
	}

	public function slider(){
		return $this->hasMany(StudioSlider::class,'studio_id','id');
	}
}
