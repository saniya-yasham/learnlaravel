<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    // protected $table = "courses";

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_percent',
        'rating',
        'thumbnail',
        'level',
        'tags',
        'category_id',
        'tutors',
    ];


    // has
    // belongs

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
