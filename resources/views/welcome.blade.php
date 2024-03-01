@extends('layouts.main_layout')

@section('content')


       <div class="container-fluid">
        <div class="row">
            @include ('layouts.services')

            <div class="col-lg-9 col-sm-6 col-md-9" >

                <div class="container-fluid">
                    <a href="{{route('contact')}}" target="_blank"
                       style="text-decoration: none" onclick="sessionStorage.clear();">
                        <h4 class="text-center text-primary gradient"> <b>Пропонуємо Вам найсучасніший
                                сервіс послуг митного брокера за доступними цінами у всіх митних органах України.</b></h4>
                    </a>

                </div>

                <div class="container-fluid">
                    <div class="row">
                        <ul class="olderOne">

                            <div class="container-fluid">
                                <div class="row">
                                    <li class="col-lg-6 col-sm-12">
                                        <a href="{{route('contact')}}" target="_blank">
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
                                        <a href="{{route('contact')}}" target="_blank">
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
                            <div class="container-fluid">
                                <div class="row">
                                    <li class="col-lg-6 col-sm-12">
                                        <a href="{{route('contact')}}" target="_blank">
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
                                        <a href="{{route('contact')}}" target="_blank">
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
                        </ul>

                    </div>

                </div>
                <br>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                У чому полягає робота митного брокера?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <a href="{{route('contact')}}" target="_blank" target="_blank"
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
                                <a href="{{route('contact')}}" target="_blank" target="_blank"
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

                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Що входить до обов'язків митного брокера?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="{{route('contact')}}" target="_blank" target="_blank"
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
                <br>
                <!--Mdoffice.com.ua -->
                <iframe
                    src="https://www.mdoffice.com.ua/ua/MDONewsScript.html?p_days=1" height="300px" class="container-fluid"></iframe>
                <!--//Mdoffice.com.ua-->


        </div>

    </div>

@endsection
