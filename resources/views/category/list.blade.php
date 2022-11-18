@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2>Category List</h2>
                </div>
                <div class="card-body">
                    @forelse($categories as $category)
                    <div class="d-flex justify-content-between my-4">
                        <div>

                            <p>{{ $category->category }}</p>
                        </div>
                        <div>
                            <a href="{{ route('category.edit', $category) }}" class=" mx-3 btn btn-warning">Edit category</a>
                            <a href="{{ route('category.delete', $category) }}" class="btn btn-danger">Delete category</a>
                        </div>

                    </div>
                    @empty
                    <h1>There are no categires yet...</h1>
                    @endforelse
                </div>

            </div>
            <div>
                <a class="btn btn-danger mt-5 me-3" href="{{ route('book.list') }}">Book List</a>
                <a class="btn btn-danger mt-5 me-3" href="{{ route('book.create') }}">Book Create</a>
                <a class="btn btn-danger mt-5 me-3" href="{{ route('category.create') }}">Create Category</a>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
