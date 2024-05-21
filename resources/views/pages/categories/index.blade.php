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
                List
            @endslot
            @slot('subtitle')
                Categories
            @endslot
            @slot('action')
                {{ route('categories.create') }}
            @endslot
            @slot('action_title')
                Add Category
            @endslot
            @slot('search_action')
                {{ route('categories.index') }}
            @endslot
        @endcomponent
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category List</h4>
                        <p class="card-title-desc">
                            This is the list of categories.
                        </p>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td scope="row">{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
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
