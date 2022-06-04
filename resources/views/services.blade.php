@extends('layouts.app')

@section('content')
<div class="container">

    <div class="section-head">
        <h1>What Service Can We Help You With?</h1>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card service-card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <span>Essay Services</span>
                        <span class="btn-icon"><i class="fa fa-angle-down"></i></span>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul>
                        @foreach($essays as $essay)
                        <li><a href="#">{{ $essay->service_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card service-card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span>Dissertation Services</span>
                        <span class="btn-icon"><i class="fa fa-angle-down"></i></span>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <ul>
                        @foreach($dissertations as $dissertation)
                        <li><a href="#">{{ $dissertation->service_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card service-card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span>Other Services</span>
                        <span class="btn-icon"><i class="fa fa-angle-down"></i></span>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <ul>
                        @foreach($others as $other)
                        <li><a href="#">{{ $other->service_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.section-head {
    margin-bottom: 4rem;
    text-align: center;
}

.section-head h1 {
    font-size: 2rem;
    color: #444;
}

.service-card ul {
    padding-left: 0.85rem;
}

.service-card ul li:not(:last-child) {
    border-bottom: 1px solid #d4d4d4;
}

.service-card ul li a {
    display: block;
    padding: 0.75rem 0;
    font-size: 0.95rem;
    color: #007bff;
}

.service-card ul li a:hover {
    text-decoration: underline;
}

.service-card button {
    width: 100%;
    display: flex;
    justify-content: space-between;
    color: #444;
    font-weight: 500;
    font-size: 1.2rem;
}

.service-card button span:first-child {
    text-align: left;
}

.service-card button:hover {
    text-decoration: none;
    background: none;
}

.service-card button.btn-link:focus {
    text-decoration: none;
}

.service-card button span i {
    font-size: 1.25rem;
}
</style>
@endsection