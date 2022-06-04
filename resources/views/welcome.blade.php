@extends('layouts.app')

@section('content')

@if($homes->count() > 0)
<section class="flat-slider style1 clearfix">
    <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev-slider1" class="rev_slider fullwidthabanner">
            <ul>
                @foreach($homes as $data)
                    @if($data->url > 0)
                        <p>Pogi ako</p>  
                    @endif
                    <li data-transition="random">
                        <!-- Main Image -->
                        <img src="{{asset('assets')}}/images/header/02.png" alt="" data-bgposition="center center"
                            data-no-retina>
                        <div class="overlay"></div>

                        <!-- Layers -->
                        <div class="tp-caption tp-resizeme education" data-x="['left','left','left','center']"
                            data-hoffset="['0','4','4','15']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-113','-80','-70','-70']" data-fontsize="['70','70','50','30']"
                            data-lineheight="['90','90','70','50']" data-width="full" data-height="none"
                            data-whitespace="normal" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on">
                            <div class="education-text text-white">{{ $data->title }}</div>
                        </div>

                        <div class="tp-caption tp-resizeme text-white complete text-edukin"
                            data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-22','-5','-10','-10']"
                            data-fontsize="['17','17','15','14']" data-lineheight="['30','30','26','22']" data-width="full"
                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on"
                            data-paddingright="['550','155','50','2']">{{ $data->description }}</div>

                        <div class="tp-caption" data-x="['left','left','left','center']" data-hoffset="['0','4','4','15']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['88','80','60','70']"
                            data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on"
                            data-paddingtop="['50','50','50','50']" data-paddingbottom="['50','50','50','50']"> <a href="{{ (!empty($data->url))? $data->url : '' }}"
                                class="btn btn-styl1">Read More</a> <a href="{{ (!empty($data->video_link))? $data->video_link.'?autoplay=1' : '' }}" class="btn btn-styl2"><i class="fa fa-play"
                                    aria-hidden="true"></i></a></div>

                        <div class="tp-caption sl-address" data-x="['left','left','left','center']"
                            data-hoffset="['0','4','4','15']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['325','280','250','200']" data-width="full" data-height="none"
                            data-whitespace="normal" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on"
                            data-paddingtop="['50','50','50','50']" data-paddingbottom="['50','50','50','50']"> <a href="#"
                                class="text-white sl-phone"><i class="fa fa-phone" aria-hidden="true"></i> {{ $data->contact_num }}
                            </a><a href="#" class="text-white    sl-email"><i class="fa fa-envelope" aria-hidden="true"></i>
                                {{ $data->contact_email }}</a></div>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </div>
</section><!-- flat-slider -->
@else
<div style="background-color: #212529; height: 100px; margin-bottom: 150px;"></div>
@endif


<section class="partner-clients partner-clients-style1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="slide-client owl-carousel" data-auto="false" data-item="4" data-nav="false"
                    data-dots="false" data-gap="0">
                    <ul>
                        <li><img src="{{asset('assets')}}/images/home1/01.png" alt="images"></li>
                    </ul>
                    <ul>
                        <li><img src="{{asset('assets')}}/images/home1/02.png" alt="images"></li>
                    </ul>
                    <ul>
                        <li><img src="{{asset('assets')}}/images/home1/03.png" alt="images"></li>
                    </ul>
                    <ul>
                        <li><img src="{{asset('assets')}}/images/home1/04.png" alt="images"></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="iconbox-style1">
                    <div class="apply-admission">
                        <div class="apply-admission-wrap type2 bd-type1">
                            <div class="apply-admission-inner">
                                <h2 class="title text-center">
                                    <span>Apply for admission</span>
                                </h2>
                                <div class="caption text-center">
                                    Make it more simple!
                                </div>
                                <div class="apply-sent apply-sent-style1">
                                    <form action="#" class="form-sent">
                                        <input type="text" placeholder="Enter your email ....">
                                        <button class="sent-button bg-cl3f4c99">
                                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- partner-clients -->
<section class="online-courses online-courses-style1">
    <div class="container">
        <div class="title-section text-center">
            <p class="sub-title lt-sp17">Most popular courses</p>
            <div class="flat-title medium">
                2000 + Online courses
            </div>
        </div>
        <div class="online-courses-wrap">
            <div class="row">
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="imagebox-courses-type1">
                        <div class="featured-post"><img src="{{ $package->Image() }}" alt="images"></div>
                        <div class="author-info">
                            <div class="avatar"><img src="{{ $package->Avatar() }}" alt="images"></div>
                            <div class="category">
                                {{ $package->category }}
                            </div>
                            <div class="name"><a href="#">{{ $package->title }}</a></div>
                            <div class="border-bt"></div>
                            <div class="evaluate">
                                <div class="price"><span class="price-now">${{ $package->price }}</span> <span
                                        class="price-previous"><del>${{ $package->sub_price }}</del></span></div>
                                <div class="review">
                                    <?php 
                                                switch ($package->rate) {
                                                    case 1:
                                                      echo '<i aria-hidden="true" class="fa fa-star"></i> 
                                                      <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                      <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                      <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                      <i aria-hidden="true" class="fa fa-star" style="color: gray"></i>';
                                                      break;
                                                    case 2:
                                                        echo '<i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i>';
                                                      break;
                                                    case 3:
                                                        echo '<i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i>';
                                                      break;
                                                    case 4:
                                                        echo '<i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i>';
                                                      break;
                                                    case 5:
                                                        echo '<i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i> 
                                                        <i aria-hidden="true" class="fa fa-star"></i>';
                                                      break;
                                                    default:
                                                        echo '<i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i> 
                                                        <i aria-hidden="true" class="fa fa-star" style="color: gray"></i>';
                                                  }
                                            ?>
                                    <span>({{ $package->num_rate }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="browse-all-courses pd-browse-course text-center">
            <a href="{{ route('home.package') }}" class="btn-browse-courses">Browse all courses</a>
        </div>
    </div>
</section><!-- online-courses -->

<section class="flat-event flat-event-style1 clearfix">
    <div class="container-fluid">
        <div class="col-left">
            <div class="content-event-style1 themesflat-content-box" data-padding="13.7% 1.2% 0% 0%"
                data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%"
                data-smobipadding="0% 0% 0% 0%">
                <div class="title-section">
                    <div class="flat-title larger heading-type3">All upcoming events</div>
                </div>
                <?php $counting = 1; ?>
                <?php $arrCount = 0; $arr = ['one', 'two', 'three']; $arrSec = ['7ecc88', '3f4c99', 'ff5f60']?>

                @foreach($events as $data)
                
                    <div class="content-event">
                        <div class="entry-info clearfix">
                            <div class="entry-title">
                                <a href="#" class="cl-7ecc88">
                                   {{ $data->title }}
                                </a>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li class="date clearfix">
                                        <span class="icon-event icon-icons8-planner-100"></span>
                                        <span class="detail-event">{{ $data->date }}</span>
                                    </li>
                                    <li class="time clearfix">
                                        <span class="icon-event icon-icons8-stopwatch-100"></span>
                                        <span class="detail-event">{{ $data->start_time }} - {{ $data->end_time }}</span>
                                    </li>
                                    <li class="location clearfix">
                                        <span class="icon-event icon-icons8-marker-100"></span>
                                        <span class="detail-event">{{ $data->location }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="entry-number number-{{ $arr[$arrCount] }}">
                            <span class="cl-{{ $arrSec[$arrCount] }}">{{ $counting++ }}</span>
                        </div>
                        <?php $arrCount++;?>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-right">
            <div class="images-list themesflat-content-box" data-padding="0% 0% 0% 15.1%"
                data-sdesktoppadding="0% 0% 0% 5%" data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%"
                data-smobipadding="0% 0% 0% 0%">
                <div class="row">
                    <?php $IMGcount = 1; ?>
                    <?php $arr_count = 0; $arrColor = ['cl7ecc88', 'cl3f4c99', 'clff5f60']; ?>

                    @foreach($events as $data)
                        <div class="col-6">
                                <div class="img-event">
                                    <img src="{{ asset('storage').'/'.$data->image }}" alt="images">
                                    <span class="number bg-{{ $arrColor[$arr_count] }}">{{ $IMGcount++ }}</span>
                                </div>
                        </div>
                        <?php $arr_count++?>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</section><!-- flat-event -->


<div class="title-section"><div class="flat-title larger heading-type3">Feedback</div></div>
@if($feedbacks->count() > 0)
<section class="slider testimonial-flexslider testimonial-style1 equalize sm-equalize-auto clearfix">
    <div class="wrap-info themesflat-content-box" data-padding="0% 0% 0% 10%" data-sdesktoppadding="0% 0% 0% 0%"
        data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
        <div id="carousel-testimonial" class="flexslider">
            <ul class="slides translate-none">
                @foreach($feedbacks as $feedback)
                <li class="avatar">
                    <img src="/storage/{{ $feedback->image }}" alt="images">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="wrap-quote themesflat-content-box" data-padding="10.47% 14.1% 0% 0%"
        data-sdesktoppadding="10.47% 15px 0% 15px" data-ssdesktoppadding="16% 15px 0% 15px"
        data-mobipadding="100px 15px 85px 15px" data-smobipadding="100px 15px 85px 15px">
        <div id="slider-testimonial" class="flexslider">
            <ul class="slides client-info">
                @foreach($feedbacks as $feedback)
                <li>
                    <span class="icon-quote icon-icons8-get-quote-filled-100"></span>
                    <p class="speech">
                        "{{ $feedback->feedback }}"
                    </p>
                    <div class="name">
                        {{ $feedback->name }}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section><!-- testimonial -->
@endif
<div>
    <!-- Add Feedback -->
    <div class="browse-all-courses pd-browse-course text-center"><a class="btn-browse-courses" data-toggle="modal"
            data-target="#mediumModal">Add your feedback</a></div>

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Add Feedback</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <form action="{{ route('feedback.store') }}" method="post" id="addForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <label for="exampleInputBorderWidth2">Full Name</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="name"
                                id="name" placeholder="ex: John Doe" required>
                        </div>

                        <div class="form-group">

                            <label for="feedback">Comment Or Feedback</label>
                            <textarea id="feedback" name="feedback" rows="4" cols="5" maxlength="250" required>
                            {{ (old('feedback'))? old('feedback') : '' }}
                        </textarea>
                        </div>

                        <div class="form-group">
                            <label for="example-file-input-custom">Profile</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                    data-toggle="custom-file-input" id="example-file-input-custom" name="image"
                                    required>
                                <label class="custom-file-label" for="example-file-input-custom">Choose
                                    Image</label>
                            </div>
                        </div>
                        <input type="submit" value="submit" id="addSubmitBTN" class="btn btn-lg btn-success py-0">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="latest-blog cl-dots1 latest-blog-type1 latest-blog-style1">
    <div class="container">
        <div class="title-section">
            <div class="flat-title small heading-type4">
                Latest Blog
            </div>
        </div>
        <div data-gap="30" data-column="2" data-column2="2" data-column3="1" data-column4="1" data-dots="true"
            data-auto="false" data-nav="false" class="flat-carousel-box data-effect clearfix">
            <div class="owl-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 5000px;">
                        @foreach($posts as $data)
                        <div class="owl-item active" style="width: 470px; margin-right: 30px;">
                            <article class="post post-style1 post-bg">
                                <div class="bg clearfix">
                                    <div class="position cl-fe5e5f lt-sp4">
                                        {{ $data->cat_title }}
                                    </div>
                                    <div class="featured-post"><img src="{{ asset('storage').'/'.$data->thumb }}" alt="images" width="350px"></div>
                                </div>
                                <div class="post-content clearfix">
                                    <div class="entry-info cleafix">
                                        <div class="avatar"><img src="http://127.0.0.1:8000/assets/images/home1/36.png"
                                                alt="images"></div>
                                        <div class="post-title">
                                            <h5><a href="{{ route('home.blog', $data->id) }}" class="lt-sp04">{{ $data->title }}</a></h5>
                                        </div>
                                    </div>
                                    
                                    <div class="post-link"><a href="{{ route('home.blog', $data->id) }}">Read Now</a></div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feedback Function -->
@endsection