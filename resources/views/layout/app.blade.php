<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Paint Job</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- jquery --}}


        {{-- css --}}
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">

    </head>
    <body>
        <div class="container">
            <header>
                <h1>Juan's Auto Paint</h1>
            </header>
            <nav id="cont">
                
                    <a href="{{route("paintjobs.create")}}" class="link">New Paint Job</a>
                
                
                    <a href="{{route("paintjobs.index")}}" class="link active">Paint Jobs</a>
                
            </nav>
            <main>
                @yield('content')
            </main>
        </div>
        {{-- jquery --}}
        <script type="text/javascript" src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script
          src="https://code.jquery.com/jquery-3.4.1.js"
          integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
          crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>
