@extends('layouts.main_layout')

@section('content')

    @isset($info)
        <div class="container  wrapper">
            {{$info}}
        </div>
    @endisset

    <section class="">
        <!-- Jumbotron -->
        <div class="container text-center" style="background-color: hsl(0, 0%, 96%)">
            <br>
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">


                            <h5 class="my-1 display-7 ls-tight gradient" align="center">
                                Замовлення консультації митного брокера:
                            </h5>

                            <div class="row text-center text-lg-center" align="center">
                                <span class="col-lg-4 col-sm-4 mb-2 mb-lg-0">
                                  <a class="btn btn-outline-success" href="tel:+380936734488">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                          <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg>
                                     0936734488
                                  </a>
                                </span>
                                <span class="col-lg-4 col-sm-4 mb-2 mb-lg-0">
                                  <a class="btn btn-outline-success" href="tel:+380506883305">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                          <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                      </svg>
                                     0506883305
                                  </a>
                                </span>
                                <span class="col-lg-4 col-sm-4 mb-2 mb-lg-0">
                                    <a class="btn btn-outline-success" href="tel:+380679004012">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                          <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg>
                                      0679004012
                                   </a>
                                 </span>
                            </div>


                            <div style="margin-top: 30px">

                                <a href="https://play.google.com/store/apps/dev?id=8830024160014473355" class="my-1  ls-tight gradient" style="text-decoration: none;">
                                    <h5 class="my-1 display-7 ls-tight gradient" align="center">
                                        Виготовлення сайтів на Laravel та простих мобільних додатків Android:
                                    </h5>
                                </a>

                                <a href="mailto:sferaved@gmail.com" class="my-1  ls-tight gradient"> <h5><b>andrey18051@gmail.com</b></h5></a>


                            </div>


                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">

                            <div class="card-body py-5 px-md-5">
                                <img src="{{ asset('img/city.jpg') }}" style="width: 100%; margin-top: 20px; text-align: center;">
                                <h5 class="my-1 display-7 ls-tight gradient" align="center" >
                                    вул.Клочківська буд.192А оф 422 (Бізнес-центр "Місто"), місто Харків
                                </h5>

                                <a href="mailto:sferaved@gmail.com" class="my-1  ls-tight gradient"> <h5><b>sferaved@gmail.com</b></h5></a>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
    <div class="container-fluid" style="margin: 10px">
        <a href="{{route('welcome')}}"
           target="_blank" style="text-decoration: none; color: black">
            <h5 style="text-align: center; " class="gradient">
                <b>Office MP – це сучасні послуги митного представника в Україні.<br>
                    Замовьте прям зараз.</b>
            </h5>
        </a>
    </div>

@endsection
