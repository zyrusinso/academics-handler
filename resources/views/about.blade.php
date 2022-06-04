@extends('layouts.app')

@section('content')

<section class="flat-benefit style1 clearfix">
    <div class="container-fluid">
        <div class="col-benefit-left">
            <div class="wrap-inconbox-benefit">
                <div class="title-section">
                    <div class="flat-title small heading-type2 text-white">Why choose us?</div>
                </div>
                <div class="iconbox-benefit iconbox-benefit-style1">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                            <div class="themesflat-content-box" data-padding="0% 4% 0% 0%"
                                data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%"
                                data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                                <div class="iconbox">
                                    <div class="iconbox-icon">
                                        <img src="{{asset('assets')}}/images/home1/18.png" alt="images">
                                    </div>
                                    <div class="iconbox-content img-one">
                                        <h3>
                                            <a href="#">Certificate</a>
                                        </h3>
                                        <p>
                                            {{ $about->certificate }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                            <div class="themesflat-content-box" data-padding="0% 4% 0% 0%"
                                data-sdesktoppadding="0% 15px 0% 0%" data-ssdesktoppadding="0% 15px 0% 0%"
                                data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                                <div class="iconbox">
                                    <div class="iconbox-icon">
                                        <img src="{{asset('assets')}}/images/home1/19.png" alt="images">
                                    </div>
                                    <div class="iconbox-content img-two">
                                        <h3>
                                            <a href="#">Life Programs</a>
                                        </h3>
                                        <p>
                                            {{ $about->life_program }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                            <div class="themesflat-content-box" data-padding="0% 4% 0% 0%"
                                data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%"
                                data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                                <div class="iconbox">
                                    <div class="iconbox-icon">
                                        <img src="{{asset('assets')}}/images/home1/20.png" alt="images">
                                    </div>
                                    <div class="iconbox-content img-three">
                                        <h3>
                                            <a href="#">Affordability</a>
                                        </h3>
                                        <p>
                                            {{ $about->affordability }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                            <div class="themesflat-content-box" data-padding="0% 4% 0% 0%"
                                data-sdesktoppadding="0% 15px 0% 0%" data-ssdesktoppadding="0% 15px 0% 0%"
                                data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                                <div class="iconbox">
                                    <div class="iconbox-icon">
                                        <img src="{{asset('assets')}}/images/home1/21.png" alt="images">
                                    </div>
                                    <div class="iconbox-content img-four">
                                        <h3>
                                            <a href="#">Social</a>
                                        </h3>
                                        <p>
                                            {{ $about->social }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-benefit-right">
            <div class="apply-admission bg-apply-type1">
                <div class="apply-admission-wrap type3 bd-type2">
                    <div class="apply-admission-inner">
                        <h2 class="title text-center">
                            <span>Apply for admission</span>
                        </h2>
                    </div>
                </div>
                <div class="form-apply">
                    <div class="section-overlay183251"></div>
                    <form action="#" class="apply-now">
                        <ul>
                            <li><input type="search" placeholder="Name"></li>
                            <li><input type="search" placeholder="Email"></li>
                            <li><input type="search" placeholder="Phone"></li>
                        </ul>
                        <div class="btn-50 hv-border text-center">
                            <button class="btn bg-clff5f60">
                                Apply now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- flat-benefit -->

<section class="flat-services style1 parallax parallax1 clearfix">
    <div class="section-overlay"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="services-content-box themesflat-content-box" data-padding="0% 30% 0% 0%"
                    data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                    <div class="flat-imagebox imagebox-services style1">
                        <div class="imagebox-content">
                            <img src="{{asset('assets')}}/images/home1/13.png" alt="images">
                            <h5 class="text-one text-white">Education Services</h5>
                            <p class="text-white">
                                {{ $about->education_services }}
                            </p>
                            <div class="read-more">
                                <a href="{{ $about->education_services_link }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services-content-box themesflat-content-box" data-padding="0% 15% 0% 16%"
                    data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                    <div class="flat-imagebox imagebox-services style1">
                        <div class="imagebox-content">
                            <img src="{{asset('assets')}}/images/home1/14.png" alt="images">
                            <h5 class="text-two text-white">Success Rate</h5>
                            <p class="text-white">
                               {{ $about->success_rate }}
                            </p>
                            <div class="read-more">
                                <a href="{{ $about->success_rate }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="services-content-box themesflat-content-box" data-padding="0% 0% 0% 30.5%"
                    data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                    <div class="flat-imagebox imagebox-services style1">
                        <div class="imagebox-content">
                            <img src="{{asset('assets')}}/images/home1/15.png" alt="images">
                            <h5 class="text-three text-white">Foreign Student</h5>
                            <p class="text-white">
                                {{ $about->foreign_student }}
                            </p>
                            <div class="read-more">
                                <a href="{{ $about->foreign_student_link }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- flat-services -->
<section class="flat-introduce flat-introduce-style1 clearfix">
    <div class="container">
        <div class="col-left">
            <div class="videobox">
                <a class="fancybox" data-type="iframe" href="{{ $about->tour_link }}.'?autoplay=1'">
                    <img src="{{ asset('storage').'/'.$about->tour_image }}" alt="images">
                </a>
            </div>
        </div>
        <div class="col-right">
            <div class="content-introduce content-introduce-style1">
                <div class="title-section">
                    <p class="sub-title lt-sp25">{{ $about->tour_title }}</p>
                    <div class="flat-title larger heading-type1">Take a tour</div>
                </div>
                <div class="content-introduce-inner">
                    <p>
                        {{ $about->tour_description }}
                    </p>
                    <div class="content-list">
                        <ul>
                            <li>
                                <span class="text">
                                    {{ $about->list_one }}
                                </span>
                            </li>
                            <li>
                                <span class="text">
                                    {{ $about->list_two }}
                                </span>
                            </li>
                            <li>
                                <span class="text">
                                    {{ $about->list_three }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- flat-introduce -->
<section class="quick-link quick-link-style1 parallax parallax2">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="wrap-link-left">
                    <div class="caption lt-sp275">
                        {{ $about->started_title }}
                    </div>
                    <div class="heading-lf lt-sp03">
                        Ready to get started?
                    </div>
                    <p>
                        {{ $about->started_description }}
                    </p>
                    <div class="btn-apply-link">
                        <ul>
                            <li>
                                <a class="btn btn-apply bg-clff5f60">Apply now</a>
                            </li>
                            <li>
                                <a class="btn btn-request lt-sp06">Request Service</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="wrap-link-right">
                    <div class="heading-rg">
                        <span>Quick Link</span>
                    </div>
                    <ul class="info-quick-link">
                        <li>
                            <img src="{{asset('assets')}}/images/home1/38.png" alt="images">
                            <a href="#">Tution And Fees</a>
                        </li>
                        <li>
                            <img src="{{asset('assets')}}/images/home1/39.png" alt="images">
                            <a href="#">University Facilities</a>
                        </li>
                        <li>
                            <img src="{{asset('assets')}}/images/home1/40.png" alt="images">
                            <a href="#">Review & Rating</a>
                        </li>
                        <li>
                            <img src="{{asset('assets')}}/images/home1/41.png" alt="images">
                            <a href="#">Community Q&A</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- quick-link -->

@endsection