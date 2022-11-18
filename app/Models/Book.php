<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'isbn', 'image', 'page_count', 'category_id'];

    public function getCategory()
    {
        return $this->belongsToMany(Category::class, 'categry_id', 'id');
    }
}
