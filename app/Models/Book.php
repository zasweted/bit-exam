<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'isbn', 'image', 'page_count', 'category_id'];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function saveImage($requestImage)
    {
        $imagePath = $requestImage->image->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 800);
        $image->save();
        return $imagePath;
    }
    public function updateImage($requestImage)
    {
        unlink(public_path().'/storage/'. $this->image);
        $imagePath = $requestImage->image->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 800);
        $image->save();
        return $imagePath;
    }

    public function bookList($request)
    {
        if($request->search){
            $searchResult = Book::where('name', 'like', '%'.$request->search.'%')->get();
            return $searchResult;
        }else{
            return Book::all();
        }

    }
}
