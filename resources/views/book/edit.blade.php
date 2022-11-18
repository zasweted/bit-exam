@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card t">
                <div class="card-header">
                    <h2>Book Edit</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('book.update', $book) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Change Book Name</label>
                            <input value="{{ old($book->name) ?? $book->name }}" type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Change Book Description</label>
                            <textarea type="text" name="description" class="form-control" id="description">{{ old($book->description) ?? $book->description }}</textarea>
                            @error('description')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ChangeBook ISBN</label>
                            <input value="{{ old($book->isbn) ?? $book->isbn }}" type="number" name="isbn" class="form-control" id="isbn">
                            @error('isbn')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="page_count" class="form-label">Change Book page_count</label>
                            <input value="{{ old($book->page_count) ?? $book->page_count }}" type="number" name="page_count" class="form-control" id="page_count">
                            @error('page_count')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="image" class="form-label">Change Book Image</label>
                            <img class="w-25 mb-3" src="/storage/{{ $book->image }}" alt="current_image">
                            <input type="file" name="image" class="form-control" id="image">
                            @error('image')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Change Category</label>
                            <select class="form-select" name="category_id" id="category">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary mt-4">Save changes</button>
                            <a href="{{ route('book.list') }}" class="btn btn-primary mx-2 mt-4">Back</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

@endsection