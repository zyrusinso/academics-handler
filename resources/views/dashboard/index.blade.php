@extends('layouts.dash')

@section('content')
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Welcome {{ auth()->user()->name }}
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">Content Goes Here</h2>
            <p>
            </p>
        </div>
        <!-- END Page Content -->

@endsection
