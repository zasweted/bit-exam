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
                    @forelse($books as $book)
                    <div class="d-flex flex-column my-4">
                        <div>
                            <h1>{{ $book->name }}</h1>
                            <p>Description:  {{ $book->description }}</p>
                            <p>ISBN:  {{ $book->isbn }}</p>
                            <p>Page coun:  {{ $book->page_count }}</p>
                            <p>Category:  {{ $book->getCategory->category }}</p>
                            <img class="w-75" src="/storage/{{ $book->image }}" alt="book_cover">
                        </div>
                        <div class="my-4">
                            <form action="{{ route('book.delete', $book) }}" method="post">
                            <a href="{{ route('book.edit', $book) }}" class="btn btn-warning">Edit Book</a>
                            <button class=" ms-3 btn btn-danger">Delete Book</button>
                            @csrf
                            @method('delete')
                            </form>
                            
                        </div>

                    </div>
                    @empty
                    <h1>There are no books yet...</h1>
                    @endforelse
                </div>

            </div>
            <div>
                <a class="btn btn-danger mt-5" href="{{ route('book.create') }}">Add Book</a>
            </div>
        </div>
    </div>

</div>
</div>
@endsection