@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include ('layouts.services')

            <div class="col-lg-9 col-sm-6 col-md-9" >



                <div class="container" style="background-color: hsl(0, 0%, 96%)">
                    <div class="container-fluid">
                        <a href="{{route('welcome')}}" target="_blank"
                           style="text-decoration: none" onclick="sessionStorage.clear();">
                            <h4 class="text-center text-primary gradient"> <b>Пропонуємо Вам найсучасніший
                                    сервіс послуг митного брокера за доступними цінами у всіх митних органах України.</b></h4>
                        </a>

                    <div class="container-fluid">
                        <!--Mdoffice.com.ua -->
                        <iframe
                            src="https://www.mdoffice.com.ua/ua/payacc.html" frameborder="0" marginheight=0 marginwidth=0 height="400px"  class="container-fluid"></iframe>
                        <!--//Mdoffice.com.ua-->
                    </div>
                    <div class="container-fluid" style="margin: 10px">
                        <a href="{{route('welcome')}}"
                           target="_blank" style="text-decoration: none; color: black">
                            <h5 style="text-align: center; " class="gradient">
                                <b>Office MP – це сучасні послуги митного представника в Україні.<br>
                                    Замовьте прям зараз.</b>
                            </h5>
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>


    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 5 seconds
        }
    </script>

@endsection
