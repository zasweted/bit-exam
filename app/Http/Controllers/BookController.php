<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Book $book, Request $request)
    {
        
        $books = $book->bookList($request);

        return view('book.list', [
            'books' => $books,
            'search' => $request->search ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'isbn' => ['required', 'min:13', 'max:13'],
            'page_count' => 'required',
            'image' => ['required', 'image'],
            'category_id' => 'required'
        ]);


        Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'page_count' => $request->page_count,
            'image' => $book->saveImage($request),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('book.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'categories' => Category::all(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'isbn' => ['required', 'min:13', 'max:13'],
            'page_count' => 'required',
            'image' => 'image',
            'category_id' => 'required'
        ]);

        if($request->hasFile('image')){
            $book->update([
                'name' => $request->name,
                'description' => $request->description,
                'isbn' => $request->isbn,
                'page_count' => $request->page_count,
                'image' => $book->updateImage($request),
                'category_id' => $request->category_id
            ]);
        }else{
            $book->update([
                'name' => $request->name,
                'description' => $request->description,
                'isbn' => $request->isbn,
                'page_count' => $request->page_count,
                'category_id' => $request->category_id
            ]);
        }

        return redirect()->route('book.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        
        if($book->image){
            
            unlink(public_path().'/storage/'. $book->image);
        }

        $book->delete();
        return redirect()->route('book.list');
    }
}
