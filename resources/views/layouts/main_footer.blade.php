<footer class="text-muted text-center text-small gradient">

    <div style="width: 100%; margin-top: 10px; text-align: center;">
        <!-- Minfin.com.ua currency informer 350x120 blue-->
        <div id="minfin-informer-m1Fn-currency" style="width: 100%;">
            Загружаем <a href="https://minfin.com.ua/currency/" target="_blank">курсы валют</a> от minfin.com.ua
        </div>
        <script>
            var iframe = '<iframe width="100%" height="120" frameborder="0" src="https://informer.minfin.com.ua/gen/course/?color=blue" vspace="0" scrolling="no" hspace="0" allowtransparency="true" style="width:100%;height:120px;overflow:hidden;"></iframe>';
            var cl = 'minfin-informer-m1Fn-currency';
            document.getElementById(cl).innerHTML = iframe;
        </script>
        <noscript>
            <img src="https://informer.minfin.com.ua/gen/img.png" width="1" height="1" alt="minfin.com.ua: курсы валют" title="Курс валют" border="0" />
        </noscript>
        <!-- Minfin.com.ua currency informer 350x120 blue-->
    </div>
    <div class="center gradient">
        <span style="color:black">Сьогодні:</span>
        <span style="color:black;; font-size:14px;">
              <script>
                   document.write(date+" ");
                   document.write(thismonth+ " "+thisyear+" "+"року"+" — "+ DayofWeek);
              </script>
              (<span id="clockdat" style="color:blue;"></span>)
                    <span>
                        🌡️
                        {{\App\Http\Controllers\WeatherController::temp()}}
                        ℃
                    </span>
        </span>
    </div>
    <p class="mb-1">&copy; 2024 Сучасні послуги митного представника в Україні </p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="{{route('welcome')}}" target="_blank">Головна</a></li>
        <li class="list-inline-item"><a href="{{ route('gdpr') }}" target="_blank">Конфіденційність</a></li>
        <li class="list-inline-item"><a href="{{ route('umovy') }}" target="_blank">Умови</a></li>
        <li class="list-inline-item"><a href="{{ route('feedback') }}" target="_blank">Підтримка</a></li>
        <li class="list-inline-item"><a href="{{ route('contact') }}" target="_blank">Контакти</a></li>
    </ul>
    <a href="https://www.facebook.com/CpsferaVed"
       target="_blank" title="Сторінка сайту у Facebook" style="text-decoration: none;">
        <img src="{{ asset('img/icons8-facebook-circled-24.png') }}">
    </a>
{{--    <a href="https://www.linkedin.com/company/taxi-easy-ua/"--}}
{{--       target="_blank" title="Сторінка сайту у Linkedin" style="text-decoration: none;">--}}
{{--        <img src="{{ asset('img/icons8-linkedin-24.png') }}">--}}
{{--    </a>--}}
{{--    <a href="https://t.me/taxieasyua"--}}
{{--       target="_blank" title="Сторінка сайту у Telegram" style="text-decoration: none;">--}}
{{--        <img src="{{ asset('img/icons8-telegram-app-24.png') }}">--}}
{{--    </a>--}}
</footer>
