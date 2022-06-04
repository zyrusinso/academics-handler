@extends('layouts.dash')

@section('content')
<link rel="stylesheet" href="{{ asset('dash-assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">

<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                About
            </h1>
        </div>
    </div>
</div>
<div class="content">
    <div class="block block-rounded overflow-hidden">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">About</button>
            </li>
            @if($abouts->count() < 1)
                <li class="nav-item">
                    <button type="button" class="nav-link" id="search-projects-tab" data-bs-toggle="tab"
                        data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                        aria-selected="true"><a href="{{ route('about.create') }}"><i class="fa fa-plus">Set About Content</i></a></button>
                </li>
            @endif
        </ul>
        @if($abouts->count > 0)
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">
                <table class="table table-striped table-vcenter table-responsive" id="DataTables">
                    <thead>
                        <tr>
                            <th>Certificate</th>
                            <th>Life Program</th>
                            <th>Affordability</th>
                            <th>Social</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abouts as $data)
                        <tr>
                            <td>
                                <h4 class="h5 mt-3 mb-2">
                                   {{ $data->certificate }} 
                                </h4>
                            </td>
                            <td><h4 class="h5 mt-3 mb-2">
                                   {{ $data->life_programs }} 
                                </h4></td>
                            <td>
                                <h4 class="h5 mt-3 mb-2">
                                    {{ $data->affordability }} 
                                </h4>
                            </td>
                            <td>
                                <h4 class="h5 mt-3 mb-2">
                                   {{ $data->social }} 
                                </h4>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <hr/>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">
                <table class="table table-striped table-vcenter table-responsive" id="DataTables">
                    <thead>
                        <tr>
                            <th>Education Services</th>
                            <th>Education Services URL</th>
                            <th>Success Rate</th>
                            <th>Success Rate Link</th>
                            <th>Foreign Student</th>
                            <th>Foreign Student Link</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abouts as $data)
                            <tr>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->education_services }} 
                                    </h4>
                                </td>
                                <td><h4 class="h5 mt-3 mb-2">
                                    {{ $data->education_services_link }} 
                                    </h4></td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                        {{ $data->success_rate }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->success_rate_link }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->foreign_student }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->foreign_student_link }} 
                                    </h4>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <hr/>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">
                <table class="table table-striped table-vcenter table-responsive" id="DataTables">
                    <thead>
                        <tr>
                            <th>Tour Background Image</th>
                            <th>Tour Video Link</th>
                            <th>Tour Upper Title</th>
                            <th>Tour Title</th>
                            <th>Tour Description</th>
                            <th>Content list 1</th>
                            <th>Content list 2</th>
                            <th>Content list 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abouts as $data)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage').'/'.$data->tour_image }}" style="width: 100px;">
                                </td>
                                <td>
                                    {{ $data->tour_link }}
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->tour_about_title }} 
                                    </h4>
                                </td>
                                <td><h4 class="h5 mt-3 mb-2">
                                    {{ $data->tour_title }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                        {{ $data->tour_description }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->list_one }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->list_two }} 
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="h5 mt-3 mb-2">
                                    {{ $data->list_three }} 
                                    </h4>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <hr/>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">
                <table class="table table-striped table-vcenter table-responsive" id="DataTables">
                    <thead>
                        <tr>
                            <th>Started Title</th>
                            <th>Started Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <h4 class="h5 mt-3 mb-2">
                            {{ $data->started_title }} 
                            </h4>
                        </td>
                        <td>
                            <h4 class="h5 mt-3 mb-2">
                            {{ $data->started_description }} 
                            </h4>
                        </td>
                       
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection