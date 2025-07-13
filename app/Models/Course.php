<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

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

    // One Course has many Categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // normal php function
    // public function my_custom_fn()
    // {
    //     return $this->price - ($this->price * $this->discount_percent / 100);
    // }


    // Recommended
    // get + function name in pascal case + Attribute
    public function getMyCustomFnAttribute()
    {
    //    MyCustomFn = my_custom_fn
        return $this->price - ($this->price * $this->discount_percent / 100);
    }
}
