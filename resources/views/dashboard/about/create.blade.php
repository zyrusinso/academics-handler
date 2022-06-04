@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                About
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
                <a href="{{ route('about.index') }}" class="nav-link active" id="search-projects-tab"><i
                        class="fa fa-step-backward"></i></a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">About</button>
            </li>
        </ul>


        <div class="col-lg-4">
            <p class="font-size-sm text-muted ml-5">
            </p>
        </div>


        <div class="block block-rounded mb-0">
            <div class="block-header mt-4 content">
                <h3 class="block-title">Create About Content</h3>
            </div>
            <div class="block-content block-content-full">
                <form class="mb-5" action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-text-input">Certificate</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('certification') is-invalid @enderror"
                                    id="example-text-input" name="certification" placeholder="Certificate"></textarea>
                                @error('certification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Form Labels on top - Default Style -->

                            <div class="form-group">
                                <label for="example-text-input">Life Program</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('life_programs') is-invalid @enderror"
                                    id="example-text-input" name="life_programs" placeholder="Life Programs"></textarea>
                                @error('life_programs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- END Form Labels on top - Default Style -->

                        </div>
                        <div class="col-lg-4">


                            <div class="form-group">
                                <label for="example-text-input">Social</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('social') is-invalid @enderror" id="example-text-input"
                                    name="social" placeholder="Social"></textarea>
                                @error('social')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-text-input">Affordability</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('affordability') is-invalid @enderror"
                                    id="example-text-input" name="affordability" placeholder="Affordability"></textarea>
                                @error('affordability')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-text-input">Education Services</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('education_services') is-invalid @enderror"
                                    id="example-text-input" name="education_services"
                                    placeholder="education_services"></textarea>
                                @error('education_services')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="example-text-input" class="mt-2">Education Services Link</label>

                                <input type="text"
                                    class="form-control @error('education_services_link') is-invalid @enderror"
                                    id="example-text-input" name="education_services_link"
                                    placeholder="https://example.com" value="{{ old('education_services_link') }}">

                                @error('education_services_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-text-input">Success Rate</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('success_rate') is-invalid @enderror"
                                    id="example-text-input" name="success_rate" placeholder="success_rate"></textarea>
                                @error('success_rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="example-text-input" class="mt-2">Success Rate Link</label>

                                <input type="text" class="form-control @error('success_rate_link') is-invalid @enderror"
                                    id="example-text-input" name="success_rate_link" placeholder="https://example.com"
                                    value="{{ old('success_rate_link') }}">

                                @error('success_rate_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-text-input">Foreign Student</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('foreign_student') is-invalid @enderror"
                                    id="example-text-input" name="foreign_student"
                                    placeholder="foreign_student"></textarea>
                                @error('foreign_student')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="example-text-input" class="mt-2">Foreign Student Link</label>

                                <input type="text"
                                    class="form-control @error('foreign_student_link') is-invalid @enderror"
                                    id="example-text-input" name="foreign_student_link"
                                    placeholder="https://example.com" value="{{ old('foreign_student_link') }}">

                                @error('foreign_student_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-text-input" class="mt-2">Tour Title</label>

                                <input type="text" class="form-control @error('tour_title') is-invalid @enderror"
                                    id="example-text-input" name="tour_title" placeholder="Title"
                                    value="{{ old('tour_title') }}">

                                @error('tour_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="example-text-input">Tour Description</label>
                                <textarea rows="10" cols="10" type="text"
                                    class="form-control @error('tour_description') is-invalid @enderror"
                                    id="example-text-input" name="tour_description"
                                    placeholder="tour_description"></textarea>
                                @error('tour_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="example-file-input-custom">Tour Background Image</label><span>
                                    <p class="text-muted" style="font-size: 12px">(Prefer size: 601x650)</p>
                                </span>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file"
                                        class="custom-file-input @error('tour_image') is-invalid @enderror"
                                        data-toggle="custom-file-input" id="example-file-input-custom"
                                        name="tour_image">
                                    <label class="custom-file-label" for="example-file-input-custom">Choose
                                        Image</label>
                                </div>
                                @error('tour_image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                                <label for="example-text-input" class="mt-2">Tour Link</label>

                                <input type="text" class="form-control @error('tour_link') is-invalid @enderror"
                                    id="example-text-input" name="tour_link" placeholder="https://example.com"
                                    value="{{ old('tour_link') }}">

                                @error('tour_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">

                                <label for="example-text-input" class="mt-2">List 1</label>

                                <input type="text" class="form-control @error('list_one') is-invalid @enderror"
                                    id="example-text-input" name="list_one" placeholder="List Details 1"
                                    value="{{ old('list_one') }}">

                                @error('list_one')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="example-text-input" class="mt-2">List 2</label>

                                <input type="text" class="form-control @error('list_two') is-invalid @enderror"
                                    id="example-text-input" name="list_two" placeholder="List Details 2"
                                    value="{{ old('list_two') }}">

                                @error('list_two')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="example-text-input" class="mt-2">List 3</label>

                                <input type="text" class="form-control @error('list_three') is-invalid @enderror"
                                    id="example-text-input" name="list_three" placeholder="List Details 3"
                                    value="{{ old('list_three') }}">

                                @error('list_three')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    
                    <hr />
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="example-text-input" class="mt-2">Started Content Title</label>

                            <input type="text" class="form-control @error('started_title') is-invalid @enderror"
                                id="example-text-input" name="started_title" placeholder="https://example.com"
                                value="{{ old('started_title') }}">

                            @error('started_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="example-text-input" class="mt-2">Started Content Description</label>

                            <input type="text" class="form-control @error('started_description') is-invalid @enderror"
                                id="example-text-input" name="started_description" placeholder="https://example.com"
                                value="{{ old('started_description') }}">

                            @error('started_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 offset-4">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection