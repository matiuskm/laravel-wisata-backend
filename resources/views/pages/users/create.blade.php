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
                New
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

                        <form action="{{ route('users.store') }}" method="POST">
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
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        placeholder="Email" name="email" id="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                        placeholder="Phone" name="phone" id="phone">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        name="password" id="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"
                                        data-bs-toggle="buttons">
                                        <input type="radio" class="btn-check" id="admin" name="role"
                                            value="admin">
                                        <label class="btn btn-primary" for="admin">Admin</label>

                                        <input type="radio" class="btn-check" id="staff" name="role"
                                            value="staff">
                                        <label class="btn btn-primary" for="staff">Staff</label>

                                        <input type="radio" class="btn-check" id="user" name="role"
                                            value="User">
                                        <label class="btn btn-primary active" for="user">User</label>
                                    </div>
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
