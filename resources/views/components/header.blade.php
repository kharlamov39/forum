<header>
    @if (session('success'))
        <div class="alert alert-success mb-0 container">
            {{ session('success') }}
        </div>
    @endif
<nav class="navbar navbar-expand-lg bg-primary " data-bs-theme="dark">
  <div class="container-fluid container">
    <a class="navbar-brand" href="#">Kh39 forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Создать тему +</a>
        </li>

        @auth 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Личный кабинет
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Мои посты</a></li>
                    <li><a class="dropdown-item" href="#">Рейтинг</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('login.logout') }}">Выйти</a></li>
                </ul>
            </li>   
        @else 
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register.index') }}">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.index') }}">Войти</a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
</header>
<main class="container">