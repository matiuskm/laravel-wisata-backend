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
                List
            @endslot
            @slot('subtitle')
                Products
            @endslot
            @slot('action')
                {{ route('products.create') }}
            @endslot
            @slot('action_title')
                Add Product
            @endslot
            @slot('search_action')
                {{ route('products.index') }}
            @endslot
        @endcomponent
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product List</h4>
                        <p class="card-title-desc">
                            This is the list of products.
                        </p>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td scope="row">{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ Str::ucfirst($product->status) }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection
