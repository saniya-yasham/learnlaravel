<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    // protected $table = "courses";

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'price',
    //     'discount_percent',
    //     'rating',
    //     'thumbnail',
    //     'level',
    //     'tags',
    //     'category_id',
    //     'tutors',
    // ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // has
    // belongs

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function course()
    {
        return $this->belongsTo(User::class);
    }


    /* ------------------------------------------------------------------------------------------------------------------------------------------------ */
    /*                                                                     Accesors                                                                     */
    /* ------------------------------------------------------------------------------------------------------------------------------------------------ */
    // get + FinalPrice + Attribute
    public function getFinalPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount_percent / 100);
    }


    public function getFormattedCreatedAtAttribute()
    {
        $created = $this->created_at;
        $now = now();

        if ($created->isToday()) {
            return $created->diffForHumans();
        }

        if ($created->isYesterday()) {
            return 'Yesterday';
        }

        if ($created->isSameWeek($now)) {
            return $created->format('l'); // e.g., "Tuesday"
        }

        return $created->format('d/m/Y');
    }
}
