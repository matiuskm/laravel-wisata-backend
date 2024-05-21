@extends('layouts.master')
@section('title')
    Users
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
                Users
            @endslot
            @slot('action')
                {{ route('users.create') }}
            @endslot
            @slot('action_title')
                Add User
            @endslot
            @slot('search_action')
                {{ route('users.index') }}
            @endslot
        @endcomponent
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User List</h4>
                        <p class="card-title-desc">
                            This is the list of users.
                        </p>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
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
                            {{ $users->links() }}
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
