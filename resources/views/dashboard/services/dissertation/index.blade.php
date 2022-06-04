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
            <a href="{{ route('dashboard.services') }}">
                <li class="nav-item">
                    <button type="button" class="nav-link" id="search-projects-tab" data-bs-toggle="tab"
                        data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                        aria-selected="false">Essay Services</button>
                </li>
            </a>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-users-tab" data-bs-toggle="tab"
                    data-bs-target="#search-users" role="tab" aria-controls="search-users"
                    aria-selected="true">Dissertation Services</button>
            </li>
            <a href="{{ route('dashboard.other') }}">
                <li class="nav-item">
                    <button type="button" class="nav-link" id="search-classic-tab" data-bs-toggle="tab"
                        data-bs-target="#search-classic" role="tab" aria-controls="search-classic"
                        aria-selected="false">Other Services</button>
                </li>
            </a>
        </ul>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Services</th>
                            <th style="width: 10%;">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        
                        <tr>
                            <td >
                                <h4 class="h5 mt-3 mb-2">
                                    {{ $service->service_title }}
                                </h4>
                                <!-- <p class="d-none d-sm-block text-muted">
                                    {{ $service->description }}
                                </p> -->
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group">
                                <a href="/dashboard/dissertation/{{ $service->id }}">
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a>
                                
                                <form action="/dashboard/dissertation/{{ $service->id }}" method="post" id="delete-service">
                                @csrf
                                @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" onclick="if(confirm('Are you sure to delete service?')){event.preventDefault(); $(this).closest('form').submit();} ">
                                        <i class="fa fa-fw fa-times" style="color: red"></i>
                                    </button>
                                </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                            <h4><a href="{{ route('dissertation.create') }}"><i class="fa fa-plus">Add more services</i></a></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection