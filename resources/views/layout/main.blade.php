<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Заметки') | NoteSpace</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
<div class="bg-orb orb-1"></div>
<div class="bg-orb orb-2"></div>

<nav class="navbar navbar-expand-lg navbar-dark glass-nav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{route('notes.index')}}">
            <span class="brand-badge">NS</span>
            <span class="fw-semibold">NoteSpace</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('notes.index')}}">Главная</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('notes.index')}}">Заметки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('notes.index')}}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('notes.index')}}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-ghost" href="{{route('notes.create')}}">Новая заметка</a>
                </li>
            </ul>
        </div>
        <form action="{{route('notes.index')}}" method="get">
            <div class="dropdown row px-lg-4">
                <select class="form-select" name="order" onchange="this.form.submit()" aria-label="Пример выбора по умолчанию">
                    <option value="desc" {{request('order', 'desc') == 'desc' ? 'selected' : ''}}>Новые</option>
                    <option value="asc" {{request('order') == 'asc' ? 'selected' : ''}}>Старые</option>
                </select>
            </div>
        </form>
    </div>
</nav>

{{--Поиск--}}
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search" action="{{route('notes.index')}}" method="get">
            <input class="form-control me-2" type="search"
                   name="search" value="{{request('search')}}"
                   placeholder="Поиск" aria-label="Поиск">
            <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form>
    </div>
</nav>

<main class="container content-wrap">
    <header class="page-hero">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <p class="eyebrow">Личный блокнот</p>
                <h1 class="display-6 mb-2">@yield('title', 'Заметки')</h1>
                <p class="text-muted mb-0">@yield('subtitle', 'Организуй мысли, идеи и планы в одном месте.')</p>
            </div>
            <div class="hero-actions">
                @yield('actions')
            </div>
        </div>
    </header>

    @yield('content')
</main>

<footer class="footer mt-5">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
        <div class="text-muted">© {{date('Y')}} NoteSpace. Все права защищены.</div>
        <div class="text-muted">Сделано на Laravel + Bootstrap</div>
    </div>
</footer>
</body>
</html>
