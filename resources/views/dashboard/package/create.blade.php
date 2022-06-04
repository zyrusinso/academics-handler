@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Package
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<link rel="stylesheet" href="dash-assets/css/oneui.min.css">

<!-- Page Content -->
<div class="content">
    <div class="block block-rounded overflow-hidden">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">
            <li class="nav-item">
                <a href="/dashboard/package" class="nav-link active" id="search-projects-tab"><i
                        class="fa fa-step-backward"></i></a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">Packages</button>
            </li>
        </ul>

        <div class="col-lg-4">
            <p class="font-size-sm text-muted ml-5">
            </p>
        </div>
        <div class="block block-rounded mb-0">
            <div class="block-header mt-4 content">
                <h3 class="block-title">Create Package</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted ml-5">
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <!-- Form Labels on top - Default Style -->
                        <form class="mb-5" action="{{ route('package.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">

                                <label for="example-text-input">Title</label>

                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="example-text-input" name="title" placeholder="Title">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Category</label>

                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                    id="example-text-input" name="category" placeholder="Category">

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Price</label>

                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="example-text-input" name="price" placeholder="Price" min="0">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="example-file-input-custom">Image</label>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file"
                                        class="custom-file-input @error('image') is-invalid @enderror"
                                        data-toggle="custom-file-input" id="example-file-input-custom"
                                        name="image">
                                    <label class="custom-file-label" for="example-file-input-custom">Choose
                                        Image</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="example-file-input-custom">Package Avatar</label>

                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file"
                                        class="custom-file-input @error('avatar') is-invalid @enderror"
                                        data-toggle="custom-file-input" id="example-file-input-custom"
                                        name="avatar">
                                    <label class="custom-file-label" for="example-file-input-custom">Choose
                                        Image</label>
                                </div>
                                @error('avatar')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Sub Price</label>

                                <input type="number" class="form-control @error('sub_price') is-invalid @enderror"
                                    id="example-text-input" name="sub_price" placeholder="Sub Price" min="0">

                                @error('sub_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Ratings</label>

                                <input type="number" class="form-control @error('rate') is-invalid @enderror"
                                    id="example-text-input" name="rate" placeholder="Ratings" min="0" max="5">

                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Number of people who rate</label>

                                <input type="number" class="form-control @error('num_rate') is-invalid @enderror"
                                    id="example-text-input" name="num_rate" placeholder="Number of people who rate" min="0">

                                @error('num_rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="profile_submit">Create</button>
                            </div>

                        </form>
                        <!-- END Form Labels on top - Default Style -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection