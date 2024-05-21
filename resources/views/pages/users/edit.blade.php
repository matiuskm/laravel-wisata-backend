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
                Edit
            @endslot
            @slot('subtitle')
                Users
            @endslot
            @slot('action')
                {{ route('users.index') }}
            @endslot
            @slot('action_title')
                User List
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

                        <h4 class="card-title">User Data</h4>

                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Name" name="name"
                                        id="name" value="{{ old('name', $user->name) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" placeholder="Email" name="email"
                                        id="email" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Phone" name="phone"
                                        id="phone" value="{{ old('phone', $user->phone) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"
                                        data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" id="admin" name="role" value="admin"
                                            @if ($user->role == 'admin') checked @endif>
                                        <label class="btn btn-primary" for="admin">Admin</label>

                                        <input type="radio" class="btn-check" id="staff" name="role" value="staff"
                                            @if ($user->role == 'staff') checked @endif>
                                        <label class="btn btn-primary" for="staff">Staff</label>

                                        <input type="radio" class="btn-check" id="user" name="role" value="User"
                                            @if ($user->role == 'user') checked @endif>
                                        <label class="btn btn-primary active" for="user">User</label>
                                    </div>
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
