@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="dash-assets/css/oneui.min.css">
<main id="main-container">
    <section class="online-courses online-courses-style1">
        <div class="container">
            <div class="title-section text-center">
                <h1>Packages</h1>
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
        </div>
    </section>
</main>

@endsection