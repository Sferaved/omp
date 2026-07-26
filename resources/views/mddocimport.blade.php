@extends('layouts.main_layout')

@section('title', 'MDDocImport — AI для митного брокера | ОМП')
@section('meta_description', 'MDDocImport з AI: інвойс → код УКТ ЗЕД, підготовка документів для MasterD DeclPlus. Підписка від 250 грн/міс. Офіс митного представника ОМП.')

@section('content')

<section class="omp-hero omp-hero--compact" aria-label="MDDocImport AI">
    <div class="omp-hero__media">
        <img src="{{ asset('img/city.jpg') }}" alt="MDDocImport" width="1600" height="900" fetchpriority="high">
    </div>
    <div class="omp-hero__veil" aria-hidden="true"></div>
    <div class="omp-hero__grain" aria-hidden="true"></div>
    <div class="omp-hero__inner">
        <p class="omp-hero__brand">
            <span>ПЗ від ОМП · AI co-pilot</span>
            MDDocImport
        </p>
        <h1 class="omp-hero__title">Митний брокер отримує напарника з штучним інтелектом</h1>
        <p class="omp-hero__lead">
            Підготовка документів для MasterD і підказки кодів УКТ ЗЕД — в одному вікні.
            Підписка від <strong>250&nbsp;грн/міс</strong>, рік — <strong>2&nbsp;500&nbsp;грн</strong>.
        </p>
        <div class="omp-hero__actions">
            <a class="omp-btn omp-btn--primary" href="https://github.com/Sferaved/MDDocImport/releases/latest" target="_blank" rel="noopener">Завантажити</a>
            <a class="omp-btn omp-btn--ghost" href="{{ route('contact') }}" onclick="sessionStorage.clear();">Запит тесту</a>
        </div>
    </div>
    <div class="omp-hero__route" aria-hidden="true"><span></span></div>
</section>

<div class="container omp-product py-4">
    <div class="row g-4">
        <div class="col-lg-7">
            <article class="omp-product-card omp-product-card--ai">
                <p class="omp-ai-pill"><span></span> Головна фішка</p>
                <h2>AI, який говорить мовою ГТД</h2>
                <p>
                    Киньте інвойс або опишіть товар. Спочатку MDDocImport шукає схожі позиції
                    у <strong>ваших</strong> деклараціях і довіднику, потім уточнює відповідь через AI
                    (OpenRouter у хмарі або Ollama на ПК).
                </p>
                <p class="omp-quote">
                    «Не гугліть код о третій ночі. Киньте документ у MDDocImport —
                    і отримайте підказку з контекстом офісу.»
                </p>
            </article>
        </div>
        <div class="col-lg-5">
            <article class="omp-product-card">
                <p class="omp-kicker">Для кого</p>
                <h2>Офіс на omp.net.ua</h2>
                <p>
                    Інструмент для декларантів екосистеми MasterD: DeclPlus, довідники, .zmdx, скани —
                    і AI-помічник у тому ж вікні. Підтримка й оновлення зав’язані на інфраструктуру ОМП.
                </p>
            </article>
        </div>
    </div>

    <h2 class="omp-section-title mt-5">Що вміє AI вже зараз</h2>
    <div class="row g-3 mt-1">
        <div class="col-md-4">
            <div class="omp-product-mini">
                <span>01 · Код</span>
                <h3>УКТ ЗЕД за секунди</h3>
                <p>Підбір з опису товару та історії ваших оформлень.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="omp-product-mini">
                <span>02 · Документ</span>
                <h3>Інвойс → сенс</h3>
                <p>PDF, JPG, PNG, TXT: прикріпив — AI працює з текстом документа.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="omp-product-mini">
                <span>03 · Контроль</span>
                <h3>Хмара або свій ПК</h3>
                <p>Ключі лишаються на робочому місці брокера.</p>
            </div>
        </div>
    </div>

    <div class="omp-product-finale mt-5">
        <h2>MasterD + AI = менше кліків, більше впевненості</h2>
        <p>
            MDDocImport — не заміна брокера. Це прискорювач: документи готові, коди ближчі,
            офіс ОМП — у центрі процесу.
        </p>
        <div class="omp-hero__actions">
            <a class="omp-btn omp-btn--primary" href="https://github.com/Sferaved/MDDocImport/releases/latest" target="_blank" rel="noopener">Остання версія</a>
            <a class="omp-btn omp-btn--ghost" href="{{ route('contact') }}">Контакти ОМП</a>
        </div>
    </div>
</div>

@endsection
