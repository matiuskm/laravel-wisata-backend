@extends('layouts.master')
@section('title')
    Categories
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Edit
            @endslot
            @slot('subtitle')
                Categories
            @endslot
            @slot('action')
                {{ route('categories.index') }}
            @endslot
            @slot('action_title')
                Category List
            @endslot
            @slot('search_action')
                #
            @endslot
        @endcomponent
        <div class="row">
            <div class="col-lg-7 mx-auto">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Category Data</h4>

                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input
                                        class="form-control @error('name')
                                    is-invalid
                                    @enderror"
                                        type="text" placeholder="Name" name="name" id="name"
                                        value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Description" name="description" id="description">{{ old('description', $category->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection
