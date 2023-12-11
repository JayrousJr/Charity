@include('/site/includes/header')
@if(session('message'))
<div class="success" id="message">
    {{@session('message')}}
</div>
@endif
@if(session('error'))
<div class="error" id="message">
    {{@session('error')}}
</div>
@endif
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start" style="height: 915px;">
            <div class="banner-content col-lg-9 col-md-12">
                <h1>
                    We touch other's Lives <br>
                    we make them happy
                </h1>
                <!-- <a href="#donate" class="head-btn btn text-uppercase">Donate Now</a> -->
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start callto Area -->
<section class="callto-area relative">
    <div class="container">
        <div class="row d-flex callto-wrap justify-content-between pt-40 pb-40">
            <h3 class="text-white">Help the need, remember Giving is far better than Receiving</h3>
            <!-- <a href="#" class="head-btn head-btn2 btn text-uppercase">Donate Now</a> -->
        </div>
    </div>
</section>
<!-- End callto Area -->


<!-- Start project Area -->
<section class="project-area section-gap" id="project">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-80 header-text">
                <h1>News news and Events</h1>
                <p>
                    Our latest news and charity events to be carried out
                </p>
            </div>
        </div>
        <div class="container">
            <div id="volunteerCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($volunteer->chunk(4) as $key => $chunk)
                    <li data-target="#volunteerCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- make Carousel -->
                <div class="carousel-inner">
                    @foreach($news->chunk(3) as $key => $chunk)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $data)

                            <div class="col-lg-4 col-md-4 project-wrap">
                                <div class="single-project">
                                    <div class="content">
                                        <a target="_blank">
                                            <!-- <div class="content-overlay"></div> -->
                                            <img class="content-image img-fluid d-block mx-auto" src="/storage/{{$data->image_path}}" alt="">
                                            <!-- <div class="content-details fadeIn-bottom">
                                            <a href="#" class="head-btn btn text-uppercase">Donate Now</a>
                                        </div> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="details">
                                    <a style="font-size:13px; color:cadetblue; font-weight:100">
                                        Posted:
                                        {{$data->created_at->diffForHumans(['syntax' => \Carbon\Carbon::DIFF_RELATIVE_TO_NOW, 'short' => false]) }}</a>
                                    <a>
                                        <h2>{{$data->head}}</h2>
                                    </a>

                                    <p class="descr">{!!$data->description!!}</p>

                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#volunteerCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#volunteerCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!-- <div class="col-lg-4 col-md-4 project-wrap">
                <div class="single-project">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="/storage/images/system/p2.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <a href="#" class="head-btn btn text-uppercase">Donate Now</a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="details">
                    <a href="#">
                        <h2>Easy Flight Search</h2>
                    </a>
                    <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        women face higher conduct.</p>
                    <a class="text-uppercase" href="#">read more</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 project-wrap">
                <div class="single-project">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="/storage/images/system/p3.jpg" alt="">
                            <div class="content-details fadeIn-bottom">
                                <a href="#" class="head-btn btn text-uppercase">Donate Now</a>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="details">
                    <a href="#">
                        <h2>Easy Flight Search</h2>
                    </a>
                    <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        women face higher conduct.</p>
                    <a class="text-uppercase" href="#">read more</a>
                </div>
            </div> -->

            </div>
        </div>
</section>
<!-- End project Area -->

<!-- Start about Area -->
<section class="about-area" id="about">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end align-items-center">
            <div class="col-lg-6 col-md-12 about-left no-padding">
                <img class="img-fluid" src="/storage/images/system/about-img.jpg" alt="">
            </div>
            <div class="col-lg-6 col-md-12 about-right">
                <h1>A very Lovely Welcome <br>
                    to {{env('APP_NAME')}}
                </h1>
                <p>
                    The charity is not a job to receive but a job to give, we have alot of people form our societies who
                    need alot from us, Much can not reach us bu we can reach on them and make them greatful.<br>If
                    greatful make it thanks giving!
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End about Area -->

<!-- Start volunteer Area -->
<section class="volunteer-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-80 header-text">
                <h1>Our Volunteers</h1>
                <p>
                    Become a volunteer by fillnug a simple form below, <br>We really lik as many as people with a good
                    heart a you
                </p>
            </div>
        </div>
        <div class="container">
            <div id="volunteerCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($volunteer->chunk(4) as $key => $chunk)
                    <li data-target="#volunteerCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Slides -->
                <div class="carousel-inner">
                    @foreach($volunteer->chunk(4) as $key => $chunk)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $single)
                            <div class="col-lg-3 col-md-3 vol-wrap">
                                <div class="single-vol">
                                    <div class="content">
                                        <a target="_blank">
                                            <div class="content-overlay"></div>
                                            <img class="content-image img-fluid d-block mx-auto" src="/storage/{{ $single->profile_photo_path }}" alt="">
                                            <div class="content-details fadeIn-bottom">
                                                <h4>{{ $single->name }}</h4>
                                                <p><strong>{{ $single->volunteer_category }}</strong></p>
                                                <p>Since <strong>{{ $single->created_at->format('M, Y') }}</strong></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="carousel-control-prev" href="#volunteerCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#volunteerCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
</section>
<!-- End volunteer Area -->


<!-- Start donate Area -->
<section class="donate-area relative section-gap" id="volunteer">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-end">
            <div class="col-lg-6 col-sm-12 pb-80 header-text">
                <h1>Want To be A Volunteer?</h1>
                <p>
                    We need you, we need people who we can all together go and visit different centers together, we need
                    people to volunteer and make thisng go, Just fill in this simple form to become a volunteer.
                </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 contact-left">
                <div class="single-info">
                    <h4>A volunteer is a friend!</h4>
                    <p>
                        A volunteer is the first friend we really need, a volunteer can help push the life of others to
                        move forward!.
                    </p>
                </div>
                <div class="single-info">
                    <h4>The volunteer is a guy to share happiness!</h4>
                    <p>
                        We all need happyness, and a volunteer is a first person we can share our happiness with.
                    </p>
                </div>
                <div class="single-info">
                    <h4>A volunteer is a releaver!</h4>
                    <p>
                        pople out there need us to releave their pain and troubles, a volunteer is a frst person to help
                        them releave the pain and make them feel good .
                    </p>
                </div>
            </div>

            <div class="col-lg-6 contact-right">
                <form class="booking-form" method="post" action="{{route('volunteer')}}">
                    @csrf
                    <div class="row">

                        <input type="hidden" value="{{Auth::check() ? Auth::user()->id : ''}}" name="user_id">
                        <input type="hidden" value="{{Auth::check() ? Auth::user()->name : ''}}" name="name">



                        <div class="col-lg-12 d-flex flex-column">
                            <select name="category" class="app-select form-control  @error('category') is-invalid @enderror" value="{{old('category')}}">
                                <option value="Single Event Volunteer" selected>Single Event Volunteer</option>
                                <option value="Life Time Volunteer">Life Time Volunteer</option>
                                <option value="Uncategorized">UnCategorized</option>
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 d-flex flex-column">
                            <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="form-control mt-20 @error('email') is-invalid @enderror" type="email" value="{{Auth::check() ? Auth::user()->email : ''}}" readonly>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 d-flex flex-column">
                            <textarea class="form-control mt-20  @error('inspiration_words') is-invalid @enderror" name="inspiration_words" placeholder="Type Some Inspiration Words" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type Some Inspiration Words'" value="{{old('inspiration_words')}}"></textarea>
                            @error('inspiration_words')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 d-flex justify-content-end send-btn">
                            <button class="submit-btn primary-btn mt-20 text-uppercase ">Be A Volunteer<span class="lnr lnr-arrow-right"></span></button>
                        </div>

                    </div>
            </div>

        </div>
    </div>
</section>
<!-- End donate Area -->
@include('/site/includes/footer')