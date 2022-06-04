@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Category
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
                <a href="{{ route('category.index') }}" class="nav-link active" id="search-projects-tab"><i
                        class="fa fa-step-backward"></i></a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">Categories</button>
            </li>
        </ul>

        <div class="block-content tab-content overflow-hidden">
            <div class="row">
                <div class="col-lg-4">
                    <p class="font-size-sm text-muted ml-5">
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">

                    <!-- Form Labels on top - Default Style -->
                    <form class="mb-5" action="{{ route('category.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="example-text-input" name="title" placeholder="Title" value="{{ old('title') }}"
                                autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Detail</label>
                            <input type="text" class="form-control @error('detail') is-invalid @enderror"
                                id="example-text-input" name="detail" placeholder="Detail" value="{{ old('detail') }}">

                            @error('detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="example-file-input-custom">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                    data-toggle="custom-file-input" id="example-file-input-custom" name="image">
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
                            <button type="submit" class="btn btn-primary" name="profile_submit">Create</button>
                        </div>
                    </form>
                    <!-- END Form Labels on top - Default Style -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection