@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Home
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
                <a href="{{ route('home.index') }}" class="nav-link active" id="search-projects-tab"><i
                        class="fa fa-step-backward"></i></a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">Home</button>
            </li>
        </ul>

        <div class="col-lg-4">
            <p class="font-size-sm text-muted ml-5">
            </p>
        </div>
        <div class="block block-rounded mb-0">
            <div class="block-header mt-4 content">
                <h3 class="block-title">Edit Home Content</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted ml-5">
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <!-- Form Labels on top - Default Style -->
                        <form class="mb-5" action="{{ route('home.update', $home->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">

                                <label for="example-text-input">Title</label>
                                

                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="example-text-input" name="title" placeholder="Title" value="{{ (old('title'))? old('title') : $home->title }}">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="example-file-input-custom">Image</label><span><p class="text-muted" style="font-size: 12px">(Prefer size: 1920x786)</p></span>
                                
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

                                <label for="example-text-input">Description</label>

                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    id="example-text-input" name="description" placeholder="Description" value="{{ (old('description'))? old('description') : $home->description }}">

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Url</label>

                                <input type="text" class="form-control @error('url') is-invalid @enderror"
                                    id="example-text-input" name="url" placeholder="https://example.com" value="{{ (old('url'))? old('url') : $home->url }}">

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Embed Video URL</label>

                                <input type="text" class="form-control @error('video_link') is-invalid @enderror"
                                    id="example-text-input" name="video_link" placeholder="https://youtube.com/embed/example" value="{{ (old('video_link'))? old('video_link') : $home->video_link }}">

                                @error('video_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Contact Number</label>

                                <input type="text" class="form-control @error('contact_num') is-invalid @enderror"
                                    id="example-text-input" name="contact_num" placeholder="ex: +123 123456789" value="{{ (old('contact_num'))? old('contact_num') : $home->contact_num }}">

                                @error('contact_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="example-text-input">Contact Email</label>

                                <input type="text" class="form-control @error('contact_email') is-invalid @enderror"
                                    id="example-text-input" name="contact_email" placeholder="example@gmail.com" value="{{ (old('contact_email'))? old('contact_email') : $home->contact_email }}">

                                @error('contact_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
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