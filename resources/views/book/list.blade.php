@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2>Book List</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('book.list') }}" method="get">
                        @csrf
                        <div class=" d-flex flex-row col-4 mb-4 mt-4">
                            <label class="form-label mx-2" for="search">Search: </label>
                            <input type="text" name="search" id="search" value="{{ $search }}">
                            <button type="submit" class="btn p-0 px-2 btn-primary mx-2">Search</button>
                        </div>
                    </form>
                    @forelse($books as $book)
                    <div class="d-flex flex-column my-4">
                        <div>
                            <h1>{{ $book->name }}</h1>
                            <p>Description: {{ $book->description }}</p>
                            <p>ISBN: {{ $book->isbn }}</p>
                            <p>Page coun: {{ $book->page_count }}</p>
                            <p>Category: {{ $book->getCategory->category }}</p>
                            <img class="w-50" src="/storage/{{ $book->image }}" alt="book_cover">
                        </div>
                        @if(Auth::user()->role >= 10)
                        <div class="my-4">
                            <form action="{{ route('book.delete', $book) }}" method="post">
                                <a href="{{ route('book.edit', $book) }}" class="btn btn-warning">Edit Book</a>
                                <button class=" ms-3 btn btn-danger">Delete Book</button>
                                @csrf
                                @method('delete')
                            </form>
                        </div>

                        @endif

                    </div>
                    @empty
                    <h1>There are no books yet...</h1>
                    @endforelse
                </div>

            </div>
           
            <div>
                <a class="btn btn-danger mt-5" href="{{ route('home') }}">Back</a>
            </div>
            
            @if(Auth::user()->role >= 10)
            <div>
                <a class="btn btn-danger mt-5" href="{{ route('book.create') }}">Add Book</a>
            </div>
            @endif
        </div>
    </div>

</div>
</div>
@endsection
