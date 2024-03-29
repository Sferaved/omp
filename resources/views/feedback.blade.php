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
{{--                        <h4 class="my-1 display-7 fw-bold ls-tight gradient">--}}
{{--                            Телефони для зв'язку з диспетчером служби таксі (у тому числі з питань видалення облікового запису)--}}
{{--                        </h4>--}}
                        <h5 class="my-1 display-7 ls-tight gradient" align="left">
                            Для видалення облікового запису на цьому сайті, а також мобільних додатків Андроїд, автором яких є Андрій Коржов, заповніть будь ласка форму на цій сторінці та надішліть повідомлення на електронну пошту адміністратору цього сайту.
                        </h5>
                        <h5 class="my-1 display-7 ls-tight gradient" align="left">
                            На Ваш запит з нашої бази даних буде видалена інформація про Вас, а саме ім'я користувача, адреса електронної пошти та телефон.
                        </h5>
                        <h5 class="my-1 display-7 ls-tight gradient" align="left">
                            Вказана вище інформація зберігається в нашій базі даних до тих пір, поки Ви не попросите її видалити.
                        </h5>
                        <br>
                        <h5 class="my-1 display-7 ls-tight gradient" align="left">
                            Для замовлення консультації митного брокера зверніться за телефонами:
                        </h5>
                        <div class="container-fluid align-items-center">
                            <div class="row">
                            <span class="col-lg-4 col-sm-12">
                              <a class="btn btn-outline-success" href="tel:+38093">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                      <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                 0936734488
                              </a>
                            </span>
                            <span class="col-lg-4 col-sm-12">
                              <a class="btn btn-outline-success" href="tel:+380933242525">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                      <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                  </svg>
                                 0506883305
                              </a>
                            </span>
                            <span class="col-lg-4 col-sm-12">
                                <a class="btn btn-outline-success" href="tel:+380504115575">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                      <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                  0679004012
                               </a>
                             </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{ route("email") }}">
                                @csrf

                                    <div class="row">


                                        <div class="form-outline mb-4">
                                            <input type="email" class="form-control" name="email"
                                                   @isset($params)
                                                   value="{{$params['email']}}"
                                                   @else
                                                   value="{{ Auth::user()->email }}"
                                                   @endisset
                                                   placeholder="myemail@domen" readonly>
                                            <label class="form-label" for="email">Email</label>
                                        </div>



                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                   @isset($params)
                                                   value="{{$params['subject']}}"
                                                   @endisset
                                                   required>
                                            <label class="form-label" for="subject">Тема повідомлення</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <textarea name="message" id="message" class="form-control"   cols="50" rows="3" required>
@isset($params){{$params['message']}} @endisset
                                            </textarea>
                                            <label class="form-label" for="message">Повідомлення</label>
                                        </div>
{{--                                        <div class="form-outline mb-4">--}}
{{--                                            <script src="https://www.google.com/recaptcha/api.js"></script>--}}
{{--                                            <div class="g-recaptcha" data-sitekey="{{ config('app.RECAPTCHA_SITE_KEY') }}"></div>--}}
{{--                                        </div>--}}

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Надіслати повідомлення адміністратору сайту
                                        </button>

                                    </div>
                                </form>
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
