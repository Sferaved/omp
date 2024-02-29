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
                                сервіс послуг митного брокера за доступними цінами у всіх митних органах України.</b></h4>
                    </a>

                </div>
            <div class="container text-center">
            <span>
                <a class="btn btn-outline-success" href="tel:+380674061856">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                              <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                         0936734488
                </a>
            </span>
                    <span>
                <a class="btn btn-outline-success" href="tel:+380933242525">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                              <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                          </svg>
                         0506883305
                      </a>
            </span>
                    <span>
                <a class="btn btn-outline-success" href="tel:+380504115575">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                              <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                             06790040012
                       </a>
            </span>
                </div>
<br>
                <div class="container-fluid">
                    <div class="row">
                        <ul class="olderOne">

                            <div class="container-fluid">
                                <div class="row">
                                    <li class="col-lg-6 col-sm-12">
                                        <a href="#">
                                            <h5 class="text-center"><b>Доставка різних вантажів через кордон </b></h5>
                                            <small style="text-align: left">
                                                Доставка різних вантажів через кордон – це процес досить тривалий, складний та трудомісткий.
                                                Він включає: обробку митних послуг, митне оформлення, оплату податку,
                                                що стягується державними органами, і навіть інші непередбачувані проблеми.
                                                Комплекс робіт, що надаються, називається митним очищенням.
                                                Таким видом послуг займається митний брокер.
                                                Дуже важливо, щоб цією діяльністю займався професіонал із ліцензованої організації.
                                                Саме таких співробітників ви і знайдете в нашій компанії. Наші працівники реалізують попередні та основні процедури,
                                                а саме оформлення реєстрації, контроль за документами та коштами, оплату та подальше проходження через митний контроль.
                                                Клієнт отримує весь пакет документів на вантаж.
                                            </small>
                                        </a>
                                    </li>

                                    <li class="col-lg-6 col-sm-12">
                                        <a href="#">
                                            <h5 class="text-center"><b>Які послуги надає наша компанія</b></h5>
                                            <small style="text-align: left">
                                                Ось список наших основних послуг:
                                                <ul style="text-align: justify">
                                                    <li>Реєстрація суб'єкта зовнішньоекономічної діяльності у митних органах України.</li>
                                                    <li>Митне оформлення товарів у всіх митних режимах.</li>
                                                    <li>Дотримання необхідних митних формальностей.</li>
                                                    <li>Попередній розрахунок митних платежів митниці, добір кодів УкрТНЗЕД.</li>
                                                    <li>Надання сертифікатів та декларацій відповідності.</li>
                                                    <li>Консультації під час оформлення пакета документів клієнтів для митниці та багато іншого.</li>
                                                </ul>
                                            </small>
                                        </a>
                                    </li>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <li class="col-lg-6 col-sm-12">
                                        <a href="#">
                                            <h5 class="text-center"><b>Чому ви повинні вибрати саме нас</b></h5>
                                            <small style="text-align: left">
                                                Наші головні позитивні сторони послуг, які ми надаємо:

                                                Фахівці беруть він повну відповідальність за всі етапи митного оформлення.
                                                У нашому офісі працюють лише професіонали своєї справи – кожен митний брокер працює вже понад 20 років у сфері митного оформлення вантажів.
                                                Ми робимо свою роботу в мінімальні терміни, які обговорюються з клієнтом.
                                                Ми маємо опфт митного офрмлення в різних митних режимах різних товарів таких як ігрове, кавове, котельне, деревообробне обладнання, холодильники та пристрої для басейнів. Також займаємося перевезенням генераторів та компресорів, трансформаторів та електроніки, кондиціонерів, різних запчастин. Невеликі за вагою товари ми також готові доставити в найкоротший термін: одяг та взуття, парфумерія та косметика, спортивне харчування, будівельні матеріали, побутова хімія, олії.
                                                Якщо в цьому списку немає Вашого товару, нічого страшного, звертайтесь до нас із запитом і ми зробимо індивідуально для Вас розрахунок, у найкоротші терміни повідомимо Вам вартість доставки та митного очищення (розмитнення) за запитом, що цікавить.

                                            </small>
                                        </a>
                                    </li>

                                    <li class="col-lg-6 col-sm-12">
                                        <a href="#">
                                            <h5 class="text-center"><b>Звертаючись до нас, ви отримуєте повний комплекс професійних послуг у сфері ЗЕД та митної справи</b></h5>
                                            <small style="text-align: left">
                                                Міжнародна торгівля завжди була привабливою для підприємців, адже як і вихід на закордонний ринок зі своєю продукцією так і закупівля іноземних комплектуючих та товарів відкриває великі можливості для розвитку та ведення бізнесу.
                                                Але велика кількість нормативних актів, що регулюють зовнішньоекономічну діяльність, міжнародних правил торгівлі, валютний контроль, контролюючі органи викликає більше питань та неясності, ніж бажання зайнятися торгівлею.
                                                Наша фірма, будучи митним брокером, має дозвіл Державної митної служби на право здійснення брокерської діяльності та представлення інтересів наших клієнтів як у митниці, так і у зовнішньоекономічній діяльності в цілому.
                                            </small>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </ul>

                    </div>

                </div>


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

{{--                <div class="fb-comments" data-href="https://m.easy-order-taxi.site" data-width="auto" data-numposts="5"></div>--}}
{{--                <a  href="{{route('homeCombo')}}" target="_blank" style="text-decoration: none;" onclick="sessionStorage.clear();">--}}
{{--                    <blockquote class="blockquote-3">--}}
{{--                        <p> <?php echo $quitesArr[$rand] ?></p>--}}
{{--                        <cite>Цитата дня</cite>--}}
{{--                    </blockquote>--}}
{{--                </a>--}}
{{--            </div>--}}
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
