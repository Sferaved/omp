@if($errors->any())

    <div class="container">
        <div class="alert alert-danger text-center">
            @foreach($errors->all() as $error)

                {{$error}}

            @endforeach
        </div>
    </div>
@endif

@if(session('success'))
    <div class="container">
        <div class="alert alert-success text-center">
            {{session('success')}}

        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif





@if(session('error'))
    <div class="container">
        <div class="alert alert-danger text-center">
            {{session('error')}}
        </div>
    </div>
@endif

