<!doctype html>
<html>
<head>
    <title>@yield('app-title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
body {
  min-height: 99vh;
  max-width: 98vw;
  padding: 0 12px;
  display: flex;
  flex-direction: column;
  margin: 0;
}

main {
  flex: 1; /* Pushes footer down */
}

footer {
  /* Optional: margin-top: auto; also works if main is not used */
}   
    </style>
    @yield('styles')
</head>
<body>
    <header>
        <div class="row">
            <div class="col-auto">home</div>
            | <div class="col-auto">church</div>
            | <div class="col-auto">work</div>
            | <div class="col-auto">college</div>
            | <div class="col-auto">leisure</div>
            | <div class="col-auto">social</div>
        </div>
    </header>
    <main>
        @yield('contents')
    </main>
    <footer>
        <div class="row">
            <div class="col-auto">home</div>
            | <div class="col-auto">youtube</div>
            | <div class="col-auto">instagram</div>
            | <div class="col-auto">facebook</div>
            | <div class="col-auto">reddit</div>
            | <div class="col-auto">x</div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@yield('scripts')
</html>