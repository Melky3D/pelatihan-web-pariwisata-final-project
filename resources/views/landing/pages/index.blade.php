@extends('landing.master')
@section('content')
    <!-- START HOME -->
    <section id="home" class="home_bg"
        style="background-image: url(storage/landing/assets/img/bg/home-bg.jpg);  background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12 col-xs-12 text-center">
                    <div class="hero-text">
                        <h2>Best Real state deals</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum justo vitae
                            convallis varius. Nulla tristique risus ut justo pulvinar mattis.</p>
                        <div class="home_btn">
                            <a href="about.html" class="app-btn wow bounceIn page-scroll home_btn_color_one"
                                data-wow-delay=".6s">About us</a>
                            <a href="gallery.html" class="app-btn wow bounceIn page-scroll home_btn_color_two"
                                data-wow-delay=".8s">our Listing</a>
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END  HOME -->

    <!-- START PROPERTY -->
    <section class="template_property">
        <div class="container">
            <div class="section-title text-center wow zoomIn">
                <h2>List of Zones</h2>
                <div></div>
            </div>
            <div class="row">
                @forelse($zones as $zone)
                <a href="{{ route('landing', ['type' => 'zone', 'id' => $zone->id]) }}">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="single_property">
                            <img src="{{ Storage::url($zone->image) }}" class="img-fluid" alt="" />
                            <div class="single_property_description text-center">
                                <span><i class="fa fa-object-group"></i>Attraction</span>
                            
                            </div>
                            <div class="single_property_content">
                                <h4><a href="#">{{ $zone->name }}</a></h4>
                                <p>{{ $zone->description }}</p>
                            </div>
                            <div class="single_property_price">
                                Per PAX <span>Rp. {{ $zone->price_range }}</span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div><!--- END SINGLE PROPERTY -->
                    </div>
                    <!--- END COL --></a>
                @empty
				@endforelse               
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</section>
<!-- END  PROPERTY -->

<!-- START PORTFOLIO -->
<section id="gallery" class="works_area">
    <div class="container">
        <div class="section-title  text-center wow zoomIn">
            <h2>List of Attractions</h2>
            <div></div>
        </div>
        <div class="row">
            @foreach($attractions as $attraction)
            <a href="{{ route('landing', ['type' => 'attraction', 'id' => $attraction->id]) }}">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="single_property">
                    <img src="{{ Storage::url($attraction->image) }}" class="img-fluid"
                        alt="" />
                    <div class="single_property_description text-center">
                        <span><i class="fa fa-object-group"></i> Zones</span>
                    </div>
                     <div class="single_property_content">
                                <h4><a href="#">{{ $attraction->name }}</a></h4>
                                <p>{{ $attraction->description }}</p>
                            </div>
                    <div class="single_property_price">
                        Per PAX <span>Rp. {{ $attraction->ticket_price }}</span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div><!--- END  COL--></a>
            @endforeach
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</section>
<!-- END PORTFOLIO -->


@endsection
