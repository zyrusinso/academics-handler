@extends('layouts.dash')

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Edit Profile
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Labels on top -->
<div class="block block-rounded mb-0">
    <div class="block-header mt-4 content">
        <h3 class="block-title">Update Profile</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-lg-4">
                <p class="font-size-sm text-muted ml-5">
                </p>
            </div>
            <div class="col-lg-8 col-xl-5">

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <!-- Form Labels on top - Default Style -->
                <form class="mb-5" action="{{ route('profile.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label class="d-block mb-3">Profile Pic</label>

                        @if (!empty(auth()->user()->getFirstMediaUrl('profile')))
                        <img class="rounded-circle mb-3" src="{{ auth()->user()->getFirstMediaUrl('profile') }}"
                            alt="Profile Image" height="100px" width="100px">
                        @else
                        <img class="rounded-circle mb-3" src="{{ asset('dash-assets/media/avatars/avatar0.jpg') }}"
                            alt="Profile Image" height="100px" width="100px">

                        @endif

                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <input type="file" class="custom-file-input @error('profile_pic') is-invalid @enderror"
                                data-toggle="custom-file-input" id="example-file-input-custom" name="profile_pic">
                            <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                        </div>
                        @error('profile_pic')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="example-text-input">Name</label>

                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="example-text-input" name="name" required placeholder="Name"
                            value="{{ auth()->user()->name }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="example-static-input-readonly">Email</label>
                        <input type="text" readonly class="form-control" id="example-static-input-readonly" name="email"
                            value="{{ auth()->user()->email }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="profile_submit">Save</button>
                    </div>

                </form>
                <!-- END Form Labels on top - Default Style -->

            </div>
        </div>
    </div>
</div>
<!-- END Labels on top -->

<!-- Labels on top -->
<div class="block block-rounded">
    <div class="block-header mt-4 content">
        <h3 class="block-title">Update Password</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-lg-4">
                <p class="font-size-sm text-muted ml-5">
                </p>
            </div>
            <div class="col-lg-8 col-xl-5">

                @if (session()->has('passwordUpdated'))
                <div class="alert alert-success">
                    {{ session()->get('passwordUpdated') }}
                </div>
                @endif

                @if (session()->has('passwordError'))
                <div class="alert alert-danger">
                    {{ session()->get('passwordError') }}
                </div>
                @endif



                <!-- Form Labels on top - Default Style -->
                <form class="mb-5" action="{{ route('profile.password.update', auth()->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="example-password-input-1">Current Password</label>
                        <input type="password" class="form-control" id="example-password-input-1"
                            name="current_password" placeholder="Current Password">
                    </div>

                    <div class="form-group">
                        <label for="example-password-input-2">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid
                            @enderror" id="example-password-input-2" name="password" placeholder="New Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="example-password-input-3">Confirm Password</label>
                        <input type="password" class="form-control" id="example-password-input-3"
                            name="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="password_submit">Save</button>
                    </div>

                </form>
                <!-- END Form Labels on top - Default Style -->

            </div>
        </div>
    </div>
</div>
<!-- END Labels on top -->

@endsection