@extends('layouts.main_layout')

@section('title', 'MDDocImport з AI — Офіс митного представника')
@section('meta_description', 'MDDocImport від ОМП: AI читає інвойс і підказує коди УКТ ЗЕД. Підготовка документів для MasterD. Підписка від 250 грн/міс.')

@section('content')

<section class="omp-hero" aria-label="MDDocImport">
    <div class="omp-hero__media">
        <img src="{{ asset('img/city.jpg') }}" alt="Офіс Формула ОМП" width="1600" height="900" fetchpriority="high">
    </div>
    <div class="omp-hero__veil" aria-hidden="true"></div>
    <div class="omp-hero__grain" aria-hidden="true"></div>

    <div class="omp-hero__inner">
        <p class="omp-hero__brand">
            <span>ПЗ від ОМП · Windows · AI inside</span>
            MDDocImport
        </p>
        <h1 class="omp-hero__title">AI читає інвойс — ви берете код УКТ ЗЕД</h1>
        <p class="omp-hero__lead">
            Власна програма для митних брокерів: підготовка пакету документів
            <strong>і штучний інтелект</strong>, що шукає коди спочатку у ваших деклараціях, потім уточнює через AI.
            Підписка від <strong>250&nbsp;грн/міс</strong>, річний тариф <strong>2&nbsp;500&nbsp;грн</strong>.
        </p>
        <div class="omp-hero__actions">
            <a class="omp-btn omp-btn--primary" href="{{ route('mddocimport') }}">AI і ціни</a>
            <a class="omp-btn omp-btn--ghost" href="{{ route('contact') }}" onclick="sessionStorage.clear();">Запит тестової версії</a>
        </div>
    </div>
    <div class="omp-hero__route" aria-hidden="true"><span></span></div>
</section>

<div class="container-fluid omp-home">
    <div class="row">
        @include('layouts.services')

        <div class="col-lg-9 col-sm-6 col-md-9">

            <div class="omp-strip omp-strip--ai">
                <p class="omp-ai-pill"><span></span> AI всередині MDDocImport</p>
                <h2>Митний брокер отримує напарника з штучним інтелектом</h2>
                <p>
                    Не загальний чат «про все». Прикріпіть PDF чи фото інвойсу — або опишіть товар.
                    Програма спочатку шукає схожі позиції у <strong>ваших</strong> деклараціях MasterD,
                    потім уточнює відповідь через хмарний або локальний AI. Ви лишаєтесь автором рішення.
                </p>
                <ul class="omp-ai-points">
                    <li><strong>Код УКТ ЗЕД</strong> — підказка з історії офісу, не «середнє по інтернету»</li>
                    <li><strong>Документ → сенс</strong> — PDF, JPG, PNG, TXT у тому ж вікні</li>
                    <li><strong>Хмара або свій ПК</strong> — OpenRouter чи Ollama, ключі на робочому місці</li>
                </ul>
                <div class="omp-strip__actions">
                    <a class="btn btn-success" href="{{ route('mddocimport') }}">Як працює AI</a>
                    <a class="btn btn-outline-primary" href="https://github.com/Sferaved/MDDocImport/releases/latest" target="_blank" rel="noopener">Завантажити</a>
                    <a class="btn btn-outline-secondary" href="{{ route('contact') }}">Тестова версія</a>
                </div>
            </div>

            <div class="omp-strip">
                <h2>Митний брокерський сервіс ОМП</h2>
                <p>
                    Паралельно з ПЗ пропонуємо професійне митне оформлення та супровід ЗЕД
                    у всіх митних органах України — від розрахунку платежів до повного пакету документів.
                </p>
                <div class="omp-strip__actions">
                    <a class="btn btn-outline-success" href="{{ route('contact') }}">Контакти брокера</a>
                    <a class="btn btn-outline-primary" href="{{ route('payments') }}" target="_blank">Розрахунок платежів</a>
                    <a class="btn btn-outline-secondary" href="{{ url('/refund') }}">Повернення коштів за ПЗ</a>
                </div>
            </div>

            <div class="container-fluid px-0">
                <ul class="omp-feature-grid row g-0">
                    <li class="col-lg-6 col-sm-12">
                        <div class="omp-feature">
                            <a href="{{ route('contact') }}" target="_blank">
                                <h3>Доставка різних вантажів через кордон</h3>
                                <small>
                                    Доставка різних вантажів через кордон – це процес досить тривалий, складний та трудомісткий.
                                    Він включає: обробку митних послуг, митне оформлення, оплату податку,
                                    що стягується державними органами, і навіть інші непередбачувані проблеми.
                                    Комплекс робіт, що надаються, називається митним очищенням.
                                    Таким видом послуг займається митний брокер.
                                    Дуже важливо, щоб цією діяльністю займався професіонал із ліцензованої організації.
                                    Саме таких співробітників ви і знайдете в нашій компанії.
                                </small>
                            </a>
                        </div>
                    </li>
                    <li class="col-lg-6 col-sm-12">
                        <div class="omp-feature">
                            <a href="{{ route('contact') }}" target="_blank">
                                <h3>Повний комплекс послуг у сфері ЗЕД та митної справи</h3>
                                <small>
                                    Міжнародна торгівля відкриває великі можливості для бізнесу.
                                    Наша фірма, будучи митним брокером, має дозвіл Державної митної служби
                                    на право здійснення брокерської діяльності та представлення інтересів клієнтів
                                    у митниці та у зовнішньоекономічній діяльності в цілому.
                                </small>
                            </a>
                        </div>
                    </li>
                    <li class="col-lg-6 col-sm-12">
                        <div class="omp-feature">
                            <a href="{{ route('mddocimport') }}">
                                <h3>MDDocImport + AI — менше рутини в DeclPlus</h3>
                                <small>
                                    Підготовка PDF і фото, робота з MasterD і підказки кодів УКТ ЗЕД в одному вікні.
                                    AI спочатку дивиться ваші декларації — потім допомагає сформулювати відповідь.
                                </small>
                            </a>
                        </div>
                    </li>
                    <li class="col-lg-6 col-sm-12">
                        <div class="omp-feature">
                            <a href="{{ route('contact') }}" target="_blank">
                                <h3>Які послуги надає наша компанія</h3>
                                <small>
                                    Реєстрація суб'єкта ЗЕД, митне оформлення у всіх режимах,
                                    розрахунок платежів, добір кодів УкрТНЗЕД, сертифікати та консультації.
                                </small>
                            </a>
                        </div>
                    </li>
                </ul>
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
                            <p style="text-align: justify">
                                Компанія бере на себе всі зобов'язання щодо митного оформлення ввезення або вивезення вантажу.
                                Брокер сповістить, коли потрібно сертифікувати товар, і виконає розрахунки для визначення розміру державного мита.
                            </p>
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
                            <ul style="text-align: justify">
                                <li>Підбір набору кодів УкрТНЗЕД (зокрема з AI у MDDocImport)</li>
                                <li>Розрахунок та внесення митних платежів</li>
                                <li>Подання декларації на товари</li>
                                <li>Додаткові процедури при огляді чи оформленні документів</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            Що входить до обов'язків митного брокера?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul style="text-align: justify">
                                <li>Декларування товару</li>
                                <li>Контроль за своєчасним початком митної процедури</li>
                                <li>Контроль зі сплати внесків, пов'язаних із процесом розмитнення</li>
                                <li>Надання необхідних документів та інформації щодо товару</li>
                                <li>Організувати облік товарів при роботі митних органів</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <p class="omp-news-title">
                <a href="{{ route('contact') }}" target="_blank" onclick="sessionStorage.clear();">Новини митного оформлення в Україні</a>
            </p>
            <iframe
                src="https://www.mdoffice.com.ua/ua/MDONewsScript.html?p_days=2"
                height="470px"
                class="container-fluid"
                title="Новини MD Office"></iframe>
        </div>
    </div>
</div>

@endsection
