<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Master PET</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--<link rel="stylesheet" href="icons/css/all.min.css">-->

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script defer src="{{ asset('icons/js/all.js') }}"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="{{ asset('js/materialize.min.js') }}"></script>

   <!-- jquery.easing.1.3 -->
   <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

    <!-- Toastr -->
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
</head>
<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper bg-menu-gradient pl-3">

                @if (\Gate::allows('isCliente'))
                    @php
                        $homeUser = "cliente";
                    @endphp
                @else
                    @php
                        $homeUser = "dashboard";
                    @endphp
                @endif
                <a href="{{ route($homeUser) }}" class="brand-logo mx-0">Master PET<i class="fas fa-paw ml-1"></i></a>
                {{-- <a href="#" data-target="slide-out" class="sidenav-trigger mr-0"><i class="material-icons">menu</i></a> --}}
                <a href="#" data-target="slide-out" class="sidenav-trigger right ml-0"><i class="fas fa-user-circle fa-lg"></i></a>
                <ul class="right hide-on-med-and-down">
                    @guest
                        {{-- <li class="waves-effect">
                            <a class="#" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        <li>
                            <a class="waves-effect waves-light btn modal-trigger" href="#login"><i class="material-icons left">person_outline</i>Área do Cliente</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="waves-effect">
                                <a class="#" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @cannot('isCliente')
                            <li class="waves-effect active">
                                <a href="{{ route('dashboard') }}"><i class="material-icons left">home</i>Home</a>
                            </li>
                            <li>
                                <div class="center row">
                                    <div class="col s12">
                                        <div class="row" id="topbarsearch">
                                            <div class="input-field col s6 s12 red-text">
                                                <i class="teal-text text-lighten-4 material-icons prefix">search</i>
                                                <input type="text" placeholder="Pesquise aqui" id="autocomplete-input" class="autocomplete teal-text text-lighten-5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endcannot
                        <li class="nav-item dropdown">
                            <a class="dropdown-trigger btn" href="#" data-target="dropdown1">Olá, {{ Auth::user()->name }}</a>
                            {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a> --}}

                            <ul id='dropdown1' class='dropdown-content'>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div> --}}
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>

    <!-- MENU LATERAL -->
    <ul id="slide-out" class="right sidenav ">
        <li class="teal center p-3">
            <h5 class="white-text font-weight-light">Olá, <b>{{ Auth::user()->name }}</b></h5>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

    <!-- Modal LOGIN -->
    <div id="login" class="modal">
        <div class="modal-content p-0">
          <!--<i class="material-icons modal-close right fecharModal">close</i>-->
          <div class="row p-0 mb-0">
              <div class="col s12 m6 white-text bg-login-gradient pt-4 px-5">
                  <br>
                  <h4 class="font-weight-light center">Acessar Sistema</h4>
                  <hr class="divider">
                  <form method="POST" action="{{ route('login') }}" class="white-text">
                      @csrf

                      <div class="row mb-0">
                          <div class="input-field col s12 m12">
                              <input id="email" type="email" name="email" class="validate @error('email') invalid @enderror" required autofocus>
                              <label for="email">E-mail</label>
                          </div>
                          @error('email')
                              <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="row">
                          <div class="input-field col s12 m12">
                              <input id="password" type="password" name="password" class="validate @error('password') invalid @enderror" required>
                              <label for="password">Senha</label>
                              @error('senha')
                                  <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="row pl-2">
                          <label class="white-text">
                              <input type="checkbox" name="remember" id="remember" class="checkbox-light"/>
                              <span>Manter-me conectado</span >
                          </label>
                      </div>
                      <div class="row pl-2">
                          <a href="#" class="font-italic link-hover grey-text text-lighten-2">Esqueci minha senha</a>
                      </div>
                      <div class="row">
                          <button class="btn waves-effect waves-light cyan lighten-1 btn-block hoverable" type="submit" name="action">Entrar</button>
                      </div>
                  </form>
              </div>

              <div class="col s12 m6 p-3 pt-4 center">
                  <br>
                  <h4 class="font-weight-light center text-cyan darken-4">Criar Conta</h4>
                  <hr class="cyan darken-4 divider">
                  <br>
                  <span class="font-weight font-italic center">Não possui conta? Faça uma agora mesmo!</span>
                  <br>
                  <br>
                  <a href="{{ url('cadastrar') }}" class="waves-effect waves-light btn">CADASTRAR-SE</a>
              </div>
          </div>
        </div>
    </div>

    <main>
        <div class="container-fluid pb-4">
            @yield('content')
            <br>
        </div>
    </main>

</body>
</html>

<script>
    $('.dropdown-trigger').dropdown();
</script>
<script>
    $(document).ready(function(){
      $('.sidenav').sidenav({
          edge: 'right',
      });
    });
</script>
<script>
    $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      },
    });
  });
</script>
