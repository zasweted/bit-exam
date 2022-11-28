<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category'];

    public function getBook()
    {
        return $this->hasMany(Book::class, 'category_id', 'id');
    }

    public function categoryStore(object $request) : void
    {
        $request->validate([
            'category' => 'required'
        ]);
        
        $this::create([
            'category' => $request->category
        ]);

        
    }

    public function categoryUpdate(object $request, object $category) : void
    {
        $request->validate([
            'category' => 'required'
        ]);

        $category->update([
            'category' => $request->category
        ]);
    }
}
