<!doctype html>
<html>
<head>
    <title>@yield('app-title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.datatables.net/3.1.3/css/dataTables.dataTables.min.css" />
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
        <nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index.home') }}">Your App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            @if (request()->routeIs('index.home'))
                            <a class="nav-link active" aria-current="page" href="{{ route('index.home') }}">Home</a>
                            @else
                            <a class="nav-link" href="{{ route('index.home') }}">Home</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">First menu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Second menu
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">First submenu</a></li>
                                <li><a class="dropdown-item" href="#">Second submenu</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled menu</a>
                        </li>
                    </ul>
                    <form id="searcher" class="d-flex" role="search">
                        <input class="form-control me-2" id="term" type="search" placeholder="Word or part search" aria-label="Search"/>
                        <select class="form-select me-2" id="options">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                        </select>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('contents')
    </main>
    <footer>
        <nav id="navbarFoot" class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index.home') }}">Your App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentFoot" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContentFoot">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-current="page" href="#">You have reached the page footer</a>
                        </li>
                    </ul>
                    <form id="searcher" class="d-flex" role="search">
                        <input class="form-control me-2" id="term" type="search" placeholder="Word or part search" aria-label="Search"/>
                        <select class="form-select me-2" id="options">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                        </select>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/js/all.min.js" integrity="sha512-2+f4MxT8KwN4tUzw6/hv9kxKiix603S9kmBcix+0y0dBhd6zdaPOV1Thf1DM886pFZG+cAtmshBi8UBpo6m3JA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/3.1.3/js/dataTables.min.js"></script>
<script>
$('#navbar #searcher, #navbarFoot #searcher').on('submit',function(e){
    e.preventDefault();

    const routes = [
        "{{ route('index.home') }}",
        "{{ route('index.search', ['type'=>1]) . '?q=_arg' }}",
        "{{ route('index.search', ['type'=>2]) . '?q=_arg' }}"
    ];

    let option = $('#options', this).val(),
        term = $('#term', this).val();
    
    window.open(routes[option].replace('_arg',term), '_self');
});
</script>
@yield('scripts')
</html>