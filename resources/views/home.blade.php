@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div>
                <a class="btn btn-primary mt-5" href="{{ route('book.list') }}">Book List</a>
                {{-- <a href="{{ route('book.wishList') }}"></a> --}}
            @if(Auth::user()->role >= 10)
                <a class="btn btn-danger mt-5" href="{{ route('category.create') }}">Create Category</a>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
