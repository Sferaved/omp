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

                    </div>                    <div class="container" style="text-align: center">

                            <h2 class="gradient"><b>Політика конфіденційності</b></h2>

                    </div>
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="text-center">

                                <h5>1. Збір та використання особистих даних</h5>
                                <p class="lead" style="text-align: justify">
                                    Ми цінуємо вашу довірливість і прагнемо забезпечити надійний захист ваших особистих даних. Ця політика конфіденційності пояснює, як ми збираємо, використовуємо та захищаємо ваші особисті дані в рамках використання програм "Наш офис" та "Офіс митного представника", розробником котріх є Андрій Коржов (далі -Додатки).
                                </p>
                                <h5>2. Збірні дані</h5>
                                <p class="lead" style="text-align: justify">
                                    Для роботи Додатків необхідно вказати дані електронної пошти, на яку надходять повідомлення з митниці. Усі налаштування пошти зберігаються у користувача програмою та нікому не передаються. Жодних інших особистих даних користувача для роботи Додатків не потрібно.
                                </p>
                                <h5>3. Налаштування даних</h5>
                                <p class="lead" style="text-align: justify">
                                    Щоб уникнути конфліктів зчитування повідомлень, рекомендується створити окрему поштову скриньку для роботи з Додатками або вимкнути автоматичне отримання повідомлень у брокерській програмі на час роботи Додатків.
                                    Для підключення до поштового сервера використовується сервер imap і пароль для доступу сторонніх програм. Інструкції для <a href="https://www.mdoffice.com.ua/ua/aMDOFAQ.decl?id=508" target="_blank" class="lead" style="text-align: justify"> gmail</a>,
                                    для <a href="https://www.mdoffice.com.ua/ua/aMDOFAQ.decl?id=505" target="_blank" class="lead" style="text-align: justify">ukrnet</a>
                                </p>
                                <h5>4. Згода на обробку даних</h5>
                                <p class="lead" style="text-align: justify">
                                    Використовуючи наші Додатки та надаючи нам свої особисті дані, ви висловлюєте свою згоду на збір та використання  цих даних відповідно до цієї політики конфіденційності.
                                </p>
                                <h5>5. Захист даних</h5>
                                <p class="lead" style="text-align: justify">
                                    Ми докладаємо всіх необхідних заходів для забезпечення безпеки ваших особистих даних та запобігання несанкціонованому доступу до них.
                                    Видаливши Додатки з пристрою Ви тим самим видаліть усі  Ваші персональні дані, які збережені та використовуються цими Додатками.
                                </p>
                                <h5>6. Застосовність законодавства</h5>
                                <p class="lead" style="text-align: justify">
                                    Наші Додатки дотримується положень Загального регламенту захисту персональних даних <a href="https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=CELEX:32016R0679" class="lead" style="text-align: justify">(GDPR)</a> Європейського Союзу щодо збору, використання та обробки особистих даних.
                                </p>
                                <h5>7. Ваші права</h5>
                                <p class="lead" style="text-align: justify">
                                    Ви маєте право в будь-який час з усіх питань зберігання та використання особистих даних постачальника звернутися за адресою <a href="mailto:sferaved@gmail.com" class="lead" style="text-align: justify">sferaved@gmail.com</a>
.                                </p>
                                <h5>8. Згода та зміни</h5>
                                <p class="lead" style="text-align: justify">
                                    Використовуючи Додатки, ви погоджуєтесь з умовами нашої політики конфіденційності. Ми залишаємо за собою право вносити зміни до цієї політики, про що ви будете повідомлені.
                                </p>
                                <p class="lead" style="text-align: justify">
                                    Якщо у вас є додаткові запитання або запити щодо вашої конфіденційності та даних, будь ласка, зв'яжіться з нами за вказаною нижче контактною адресою.
                                </p>

                                <p class="lead" style="text-align: justify">
                                    Дата набрання чинності: 01/03/2024
                                </p>
                                <p class="lead" style="text-align: justify">
                                    Контактна інформація: <a href="mailto:sferaved@gmail.com" class="lead" style="text-align: justify">sferaved@gmail.com</a>

                                <p class="lead"> Будь ласка, ознайомтесь з
                                    <a href="{{ route('umovy') }}" target="_blank" class="lead" style="text-align: justify" >Умовами користування сервісом.</a>
                                </p>
                            </div>
                        </div>
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
