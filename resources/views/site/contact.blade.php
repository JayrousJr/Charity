@include('\site\includes\header')

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start contact-background" style="height: 915px;">
            <div class="banner-content col-lg-9 col-md-12">
                <h1>
                    Contact us <br>
                    Send a message via Our mailing System
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<section class="donate-area relative section-gap">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-end">
            <div class="col-lg-12 col-sm-12 pb-80 header-text">
                <h1>Use our mailing System</h1>
                <p>
                    {{env('APP_NAME')}} is 24/7 active to provide the support to you for any question about our charity
                    programs and events, Please do not hesitate to contact us, Feel free to ask here!
                </p>

            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <div class="col-lg-6 contact-right" id="message">
                @if(session('message'))
                <div class="" id="notification">
                    <div class="alert alert-success">
                        {{@session('message')}}
                    </div>
                </div>
                @endif
                <form class="booking-form" method="post" action="{{route('contact.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column">
                            <input type="hidden" value="{{Auth::check() ? Auth::user()->id : ''}}" name="user_id">
                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="form-control mt-20 @error('name') is-invalid @enderror" type="text" value="{{Auth::check() ? Auth::user()->name : ''}}" readonly>
                        </div>
                        <div class="col-lg-6 d-flex flex-column">
                            <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="form-control mt-20 @error('email') is-invalid @enderror" type="email" value="{{Auth::check() ? Auth::user()->email : ''}}" readonly>
                        </div>
                        <div class="col-lg-12 d-flex flex-column">
                            <input name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" class="form-control mt-20 @error('subject') is-invalid @enderror" type="text" value="{{old('subject')}}">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <textarea class="form-control mt-20 @error('message') is-invalid @enderror" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'">{{old('message')}}</textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 d-flex justify-content-end send-btn">
                            <button class="submit-btn primary-btn mt-20 text-uppercase ">Send Message<span class="lnr lnr-arrow-right"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 contact-left">
                @foreach($address as $key => $data)
                <div class="single-info">
                    <h4>Contact Informations</h4>
                    <p>Email <i class="fa fa-envelope"></i> <a href="mailto:{{$data->email}}">{{$data->email}}</a>
                    <p>Phone <i class="fa fa-phone"></i> <a href="tel:{{$data->phone}}">{{$data->phone}}</a>
                    <p>Address <i class="fa fa-map"></i> {{$data->street}},
                    <p>Address <i class="fa fa-map"></i> {{$data->city}}, {{$data->country}}.</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('\site\includes\footer')