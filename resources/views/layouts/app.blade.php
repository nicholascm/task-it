<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <title>Task it!</title>

        <!-- CSS And JavaScript -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('js/jquery3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/todo.js') }}"></script>

    </head>

    <body>
        <div class="container">
          <!--  <nav class="navbar navbar-default">

            </nav> --> 
            <br>
            <br>
        </div>

        @yield('content')
    </body>
</html>