<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    // query scope
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['search'])) {
            $query
                ->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%');
        }

        // if (isset($filters['category'])) {
        //     $query->wherehas('category', function ($query) {
        //         $query->where('slug', $filters['category']);
        //     });
        // }
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
