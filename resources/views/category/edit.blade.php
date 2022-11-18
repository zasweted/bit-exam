@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card t">
                <div class="card-header">
                    <h2>Edit Category</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('category.update', $category) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Edit Category</label>
                            <input value="{{ old($category->category) ?? $category->category }}" type="text" name="category" class="form-control" id="category">
                            @error('category')
                            <div style="color: crimson; font-size:12px">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div>
                            <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                            <a href="{{ route('category.list') }}" class="btn btn-primary mx-2 mt-4">Back</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

@endsection