@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Services
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
                <a href="/dashboard/dissertation" class="nav-link active" id="search-projects-tab"><i class="fa fa-step-backward"></i></a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">Essay Services</button>
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
                    <form class="mb-5" action="{{ route('dissertation.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="example-static-input-readonly">Service Category</label>
                            <input type="text" readonly class="form-control" id="example-static-input-readonly" name="service_category" value="Dissertation Services">
                        </div>
                  
                        <div class="form-group">
                            <label for="example-text-input">Title</label>
                            <input type="text" class="form-control @error('service_title') is-invalid @enderror" id="example-text-input" name="service_title"  placeholder="Title" value="{{ old('service_title') }}">

                            @error('service_title')
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
<!-- END Page Content -->

@endsection