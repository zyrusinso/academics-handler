@extends('layouts.dash')

@section('content')

     <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Edit Services
                    </h1>
                </div>
            </div>
        </div>
      <!-- END Hero -->

      <!-- Labels on top -->
      <div class="block block-rounded mb-0">
          
        <div class="block-header mt-4 content">
        <a href="/dashboard/other" class="nav-link active mr-3" id="search-projects-tab"><i class="fa fa-step-backward"></i></a>
            <h3 class="block-title">Update Service</h3>
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
                    <form class="mb-5" action="/dashboard/other/{{ $services->id }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="example-static-input-readonly">Service Category</label>
                            <input type="text" readonly class="form-control" id="example-static-input-readonly" name="service_category" value="{{ $services->service_category }}">
                        </div>
                  
                        <div class="form-group">

                            <label for="example-text-input">Title</label>

                            <input type="text" class="form-control @error('service_title') is-invalid @enderror" id="example-text-input" name="service_title" required placeholder="Name" value="{{ $services->service_title }}">

                            @error('service_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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


@endsection
