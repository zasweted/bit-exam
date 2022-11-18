@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card t">
                <div class="card-header">
                    <h2>Book Create</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Add Book Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Add Book Description</label>
                            <textarea type="text" name="description" class="form-control" id="description"></textarea>
                            @error('description')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">Add Book ISBN</label>
                            <input type="number" name="isbn" class="form-control" id="isbn">
                            @error('isbn')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="page_count" class="form-label">Add Book page count</label>
                            <input type="number" name="page_count" class="form-control" id="page_count">
                            @error('page_count')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Add Book Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            @error('image')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Assign a Category</label>
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
                            <button type="submit" class="btn btn-primary mt-4">Create Book</button>
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
