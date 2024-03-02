@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="gradient alert-danger" style="text-align: center">
            <h1 class="gradient">Помилка 404 (Сторінку не знайдено)</h1>
        </div>
    </div>
    <br>
    <a href="{{route('welcome')}}"
       target="_blank" style="text-decoration: none; color: black">
        <h5 style="text-align: center; " class="gradient">
            <b>Office MP – це сучасні послуги митного представника в Україні.<br>
                Замовьте прям зараз.</b>
        </h5>
    </a>
    <br>

@endsection

</body>
</html>
