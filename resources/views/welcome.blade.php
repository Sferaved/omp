@extends('layouts.main_layout')

@section('content')


       <div class="container-fluid">
        <div class="row">
            @include ('layouts.services')

            <div class="col-lg-9 col-sm-6 col-md-9" >

                <div class="container-fluid">
                    <a href="#"
                       style="text-decoration: none" onclick="sessionStorage.clear();">
                        <h4 class="text-center text-primary gradient"> <b>Пропонуємо Вам найсучасніший
                                сервіс та послуг митного брокера за доступними цінами у всіх митних органах України.</b></h4>
                    </a>

                </div>


{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <ul class="olderOne">--}}
{{--                            <div class="container-fluid">--}}
{{--                                <div class="row">--}}
{{--                                    <li class="col-lg-6 col-sm-12">--}}
{{--                                        <a href="{{route('orderReklama')}}">--}}
{{--                                            <h5 class="text-center"><b>Попереднє замовлення</b></h5>--}}
{{--                                            <small style="text-align: left">--}}
{{--                                                Можливість оформити замовлення таксі на бажаний час та день.--}}
{{--                                                Зручно при поїздках до аеропортів та вокзалів Києва. Швидко, надійно та недорого.--}}
{{--                                                Розрахуйте точну вартість на сайті.--}}
{{--                                            </small>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="col-lg-6 col-sm-12">--}}
{{--                                        <a href="{{route('driverReklama')}}">--}}
{{--                                            <h5 class="text-center"><b>Послуга "тверезий водій"</b></h5>--}}
{{--                                            <small style="text-align: left">--}}
{{--                                                Професійний водій нашої служби акуратно та швидко пережене за вказаною адресою--}}
{{--                                                або на найближче паркування Ваш автомобіль. Замовити на сайті--}}
{{--                                            </small>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="container-fluid">--}}
{{--                                <div class="row">--}}
{{--                                    <li class="col-lg-6 col-sm-12">--}}
{{--                                        <a href="{{route('stationReklama')}}">--}}
{{--                                            <h5 class="text-center"><b>Таксі на вокзал</b></h5>--}}
{{--                                            <small style="text-align: left">--}}
{{--                                                Можливість оформити замовлення таксі на бажаний час та день при поїздках до--}}
{{--                                                вокзалів Києва  та області. Швидко, надійно та недорого. Розрахуйте точну вартість на сайті.--}}
{{--                                            </small>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="col-lg-6 col-sm-12">--}}
{{--                                        <a href="{{route('airportReklama')}}">--}}
{{--                                            <h5 class="text-center"><b>Таксі в аеропорти Бориспіль та Жуляни</b></h5>--}}
{{--                                            <small style="text-align: left">--}}
{{--                                                Оцініть  найвигідніші ціни та якісний сервіс на поїздку в аеропорти міста Києва.--}}
{{--                                                Розрахуйте вартість онлайн.--}}
{{--                                            </small>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="container-fluid">--}}
{{--                                <div class="row">--}}
{{--                                    <li class="col-lg-6 col-sm-12">--}}
{{--                                        <a href="{{route('regionReklama')}}">--}}
{{--                                            <h5 class="text-center"><b>Дешеве обласне міжміське таксі</b></h5>--}}
{{--                                            <small style="text-align: left">--}}
{{--                                                Великий парк комфортабельних автомобілів для міжміських поїздок.--}}
{{--                                                Дізнайтесь на сайті.--}}
{{--                                            </small>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

{{--                                    <li class="col-lg-6 col-sm-12">--}}
{{--                                        <a href="{{route('tableReklama')}}">--}}
{{--                                            <h5 class="text-center"><b>Зустріч водієм таксі з табличкою</b></h5>--}}
{{--                                            <small style="text-align: left">--}}
{{--                                                Водій зустріне вас з табличкою біля виходу з паспортного контролю--}}
{{--                                                або біля виходу з вагона на вокзалі.--}}
{{--                                            </small>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </ul>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="container-fluid" style="margin: 10px">--}}
{{--                    <a href="{{route('homeCombo')}}"--}}
{{--                       target="_blank" style="text-decoration: none; color: black"--}}
{{--                       onclick="sessionStorage.clear();">--}}
{{--                        <h5 style="text-align: center; " class="gradient">--}}
{{--                            <b>Служба Таксі Лайт Юа – це завжди надійно, комфортно та вигідно. <br>--}}
{{--                                Замовьте таксі прям зараз.</b>--}}
{{--                        </h5>--}}
{{--                    </a>--}}
{{--                </div>--}}

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                У чому полягає робота митного брокера?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="#" target="_blank"
                                   style="text-decoration: none; color: black" onclick="sessionStorage.clear();">
                                    <p style="text-align: justify">
                                        Компанія бере на себе всі зобов'язання щодо митного оформлення ввезення або вивезення вантажу. Відсутність ризиків, пов'язаних із негативними результатами під час перевірок. Брокер сповістить, код потрібно сертифікувати товар. Також фахівець виконує розрахунки для правильного визначення розміру державного мита.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Які послуги надає митний брокер?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="#" target="_blank"
                                   style="text-decoration: none; color: black">

                                    <ul style="text-align: justify">
                                        <li>Підбір набору кодів УкрТНЗЕД</li>
                                        <li>Розрахунок та внесення митних платежів</li>
                                        <li>Подання декларації на товари</li>
                                        <li>Веде всі додаткові процедури, якщо в процесі розмитнення виникне необхідність огляду товару, або оформлення додаткових документів</li>

                                    </ul>

                                </a>
                            </div>
                        </div>
                    </div>
{{--                    <div class="accordion-item">--}}
{{--                        <h2 class="accordion-header" id="headingThree">--}}
{{--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                Что нужно для того чтобы стать таможенным брокером?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">--}}
{{--                            <div class="accordion-body">--}}
{{--                                <a href="{{route('homeCombo')}}" target="_blank"--}}
{{--                                   style="text-decoration: none; color: black" onclick="sessionStorage.clear();">--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        Служба Таксі Лайт Юа - це найкращий вибір завжди дешевого таксі,--}}
{{--                                        онлайн розрахунок вартості послуг завжди можна зробити на сайті швидше,--}}
{{--                                        ніж через дзвінок оператору.--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="accordion-item">--}}
{{--                        <h2 class="accordion-header" id="headingFour">--}}
{{--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">--}}
{{--                                Коли таксі дешевше у Києві?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">--}}
{{--                            <div class="accordion-body">--}}
{{--                                <a href="{{route('homeCombo')}}" target="_blank"--}}
{{--                                   style="text-decoration: none; color: black" onclick="sessionStorage.clear();">--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        Є періоди, коли через знижений попит на послугу перевізники--}}
{{--                                        ставлять мінімальні тарифи на поїздки до таксі. Це будні дні--}}
{{--                                        (крім п'ятниці) з 11.00 до 15.00, а також вихідні. Нестрокові--}}
{{--                                        подорожі краще планувати в цей час.--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="accordion-item">--}}
{{--                        <h2 class="accordion-header" id="headingFive">--}}
{{--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">--}}
{{--                                Скільки коштує таксі в Києві зараз, яке таксі в Києві найдешевше--}}
{{--                                і які розцінки на послуги таксі?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">--}}
{{--                            <div class="accordion-body">--}}
{{--                                <a href="{{route('homeCombo')}}" target="_blank"--}}
{{--                                   style="text-decoration: none; color: black" onclick="sessionStorage.clear();">--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        Служба Таксі Лайт Юа – це поїздки містом від 40 грн.--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="accordion-item">--}}
{{--                        <h2 class="accordion-header" id="headingSix">--}}
{{--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">--}}
{{--                                Яке таксі зараз працює у Києві у воєнний час?--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">--}}
{{--                            <div class="accordion-body">--}}
{{--                                <a href="{{route('callBackForm')}}" target="_blank"--}}
{{--                                   style="text-decoration: none; color: black">--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        У комендантську годину Ви можете залишити свій телефон на сайті--}}
{{--                                        служби Таксі Лайт Юа та наш оператор зв'яжеться з Вами у зручний для Вас час.--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="accordion-item">--}}
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Що входить до обов'язків митного брокера?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="#" target="_blank"
                               style="text-decoration: none; color: black" onclick="sessionStorage.clear();">

                                <ul style="text-align: justify">
                                    <li>Декларування товару</li>
                                    <li>Контроль за своєчасним початком митної процедури</li>
                                    <li>Контроль зі сплати внесків, пов'язаних із процесом розмитнення</li>
                                    <li>Надання необхідних документів та інформації щодо товару</li>
                                    <li>Організувати облік товарів при роботі митних органів</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    </div>
{{--                    <div class="accordion-item">--}}
{{--                        <h2 class="accordion-header" id="headingEight">--}}
{{--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">--}}
{{--                                Ознайомтеся з додатковими послугами нашої служби таксі.--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">--}}
{{--                            <div class="accordion-body">--}}
{{--                                <a href="#poslugy" target="_blank"--}}
{{--                                   style="text-decoration: none; color: black">--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        Таксі Лайт Юа - це замовлення таксі та трансферів в аеропорт, на залізничний--}}
{{--                                        вокзал та автовокзал, а також зустріч із табличкою. Втомилися від--}}
{{--                                        водіння або не можете сісти за кермо - замовте послугу--}}
{{--                                        "тверезий водій" і ми акуратно та швидко доставимо Ваш--}}
{{--                                        автомобіль до місця стоянки.--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="accordion-item">--}}
{{--                        <h2 class="accordion-header" id="headingNine">--}}
{{--                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">--}}
{{--                                Пропонуємо роботу водіям у нашій службі таксі.--}}
{{--                            </button>--}}
{{--                        </h2>--}}
{{--                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">--}}
{{--                            <div class="accordion-body">--}}
{{--                                <a href="{{route('callWorkForm')}}" target="_blank"--}}
{{--                                   style="text-decoration: none; color: black">--}}
{{--                                    <p style="text-align: justify">--}}
{{--                                        Залишіть телефон на сайті і зв'яжемося з Вами.--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

                <news-component></news-component>

                <div class="fb-comments" data-href="https://m.easy-order-taxi.site" data-width="auto" data-numposts="5"></div>
{{--                <a  href="{{route('homeCombo')}}" target="_blank" style="text-decoration: none;" onclick="sessionStorage.clear();">--}}
{{--                    <blockquote class="blockquote-3">--}}
{{--                        <p> <?php echo $quitesArr[$rand] ?></p>--}}
{{--                        <cite>Цитата дня</cite>--}}
{{--                    </blockquote>--}}
{{--                </a>--}}
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
