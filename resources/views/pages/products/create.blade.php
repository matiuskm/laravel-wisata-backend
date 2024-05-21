@extends('layouts.master')
@section('title')
    Products
@endsection
@section('body')

    <body data-sidebar="dark">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                New
            @endslot
            @slot('subtitle')
                Products
            @endslot
            @slot('action')
                {{ route('products.index') }}
            @endslot
            @slot('action_title')
                Product List
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

                        <h4 class="card-title">Product Data</h4>

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input
                                        class="form-control @error('name')
                                    is-invalid
                                    @enderror"
                                        type="text" placeholder="Name" name="name" id="name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Description" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                        <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </span>
                                        <input
                                            class="form-control @error('price')
                                        is-invalid
                                        @enderror"
                                            type="number" placeholder="Price" name="price" id="price" step="500"
                                            min="0" required>
                                    </div>

                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                                <div class="col-sm-10">
                                    <input
                                        class="form-control @error('stock')
                                    is-invalid
                                    @enderror"
                                        type="number" placeholder="Stock" name="stock" id="stock" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="category"
                                        name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" role="group" data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" id="published" name="status"
                                            value="published">
                                        <label class="btn btn-primary" for="published">Published</label>

                                        <input type="radio" class="btn-check" id="archived" name="status"
                                            value="archived">
                                        <label class="btn btn-primary" for="archived">Archived</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="favorite" class="col-sm-2 col-form-label">Is Favorite?</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" role="group" data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" id="1" name="favorite"
                                            value="1">
                                        <label class="btn btn-primary" for="1">Yes</label>

                                        <input type="radio" class="btn-check" id="0" name="favorite"
                                            value="0">
                                        <label class="btn btn-primary" for="0">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="criteria" class="col-sm-2 col-form-label">Criteria</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" role="group" data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" id="perorangan" name="criteria"
                                            value="perorangan">
                                        <label class="btn btn-primary" for="perorangan">Perorangan</label>

                                        <input type="radio" class="btn-check" id="rombongan" name="criteria"
                                            value="rombongan">
                                        <label class="btn btn-primary" for="rombongan">Rombongan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input name="image" type="file" multiple="multiple"
                                        class="form-control @error('image')
                                        is-invalid
                                    @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Save</button>
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
