<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master PET @yield('title')</title>

     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">

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
                <a href="{{ url('/') }}" class="brand-logo mx-0">Master PET<i class="fas fa-paw ml-1"></i></a>
                <a href="#" data-target="slide-out" class="sidenav-trigger mr-0"><i class="material-icons">menu</i></a>
                <a href="#login" class="sidenav-trigger right ml-0 modal-trigger"><i class="fas fa-user-circle fa-lg"></i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="waves-effect {{ Route::currentRouteName() == "index" ? 'active' : '' }}">
                        <a href="{{ url('/') }}"><i class="material-icons left">home</i>Home</a>
                    </li>
                    <li class="waves-effect {{ request()->is('produtos*') ? 'active' : '' }}">
                        <a href="{{ url('/produtos') }}">Produtos</a>
                    </li>
                    <li class="waves-effect {{ request()->is('sobre*') ? 'active' : '' }}">
                        <a href="{{ url('/sobre') }}">Sobre</a>
                    </li>
                    <li class="waves-effect {{ request()->is('contato*') ? 'active' : '' }}">
                        <a href="{{ url('/contato') }}">Contato</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-light btn modal-trigger" href="#login"><i class="material-icons left">person_outline</i>Área do Cliente</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <ul id="slide-out" class="sidenav">
        <li class="{{ request()->is('*') ? 'active' : '' }}">
            <a href="{{ url('/') }}"><i class="small material-icons">home</i></a>
        </li>
        <li class="{{ request()->is('produtos*') ? 'active' : '' }}">
            <a href="{{ url('/produtos') }}">Produtos</a>
        </li>
        <li class="{{ request()->is('sobre*') ? 'active' : '' }}">
            <a href="{{ url('/sobre') }}">Sobre</a>
        </li>
        <li class="{{ request()->is('contato*') ? 'active' : '' }}">
            <a href="{{ url('/contato') }}">Contato</a>
        </li>
        @if (Route::has('login'))
            <li>
                @auth
                    <a class="waves-effect waves-light btn" href="{{ url('/home') }}"><i class="material-icons white-text left mr-0">home</i>Home</a>
                @else
                    <a class="waves-effect waves-light btn modal-trigger" href="#login"><i class="material-icons white-text left mr-0">person_outline</i>Área do Cliente</a>
                @endauth
            </li>
        @endif
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

    <footer class="page-footer blue-grey darken-4">
      <div class="container">
        <div class="row hide-on-med-and-down">
            <div class="col l4 s12">
                <h5 class="white-text center">Quem Somos</h5>
                <p class="grey-text text-lighten-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in risus a eros maximus ornare. Mauris a sollicitudin neque. Nam at ex nisl. Morbi posuere sapien turpis, non blandit ante condimentum sit amet. Curabitur aliquet rhoncus neque, et cursus est convallis et. Pellentesque tortor sem, ullamcorper et tempor eu, fringilla in urna.</p>
            </div>
            <div class="col l4 s12 border-left border-right">
                <h5 class="white-text center">Contato</h5>
                <table class="table my-0">
                    <tr>
                        <td>
                            <i class="material-icons right green-text lighten-1">phone</i>
                        </td>
                        <td>
                            <p class="m-0">(18) 3351-1234</p>
                            <p class="m-0">(18) 99876-5432</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="material-icons right green-text lighten-1">location_on</i>
                        </td>
                        <td colspan="2">
                            <p class="m-0">Av. Brasil, 123 - Centro</p>
                            <p class="m-0">São Paulo - SP</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="material-icons right green-text lighten-1">email</i>
                        </td>
                        <td>
                            <p class="m-0">masterpet@gmail.com</p>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="row center">
                    <div class="col l3"><a class="hoverable" href="#"><i class="fab fa-facebook-square fa-lg cyan-text"></i></a></div>
                    <div class="col l3"><a class="hoverable" href="#"><i class="fab fa-instagram fa-lg cyan-text"></i></a></div>
                    <div class="col l3"><a class="hoverable" href="#"><i class="fab fa-twitter fa-lg cyan-text"></i></a></div>
                    <div class="col l3"><a class="hoverable" href="#"><i class="fab fa-youtube fa-lg cyan-text"></i></a></div>
                </div>
            </div>
            <div class="col l4 s12">
                <h5 class="white-text center">Localização</h5>
                <div id="mapRodape"></div>
            </div>
        </div>

        <!-- MOBILE -->
        <div class="row hide-on-large-only">
            <div class="row">
                <div class="col s12">
                        <h5 class="white-text center">Quem Somos</h5>
                        <p class="grey-text text-lighten-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in risus a eros maximus ornare. Mauris a sollicitudin neque. Nam at ex nisl. Morbi posuere sapien turpis, non blandit ante condimentum sit amet. Curabitur aliquet rhoncus neque, et cursus est convallis et. Pellentesque tortor sem, ullamcorper et tempor eu, fringilla in urna.</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col s12">
                    <h5 class="white-text center">Contato</h5>
                    <table class="table my-0">
                        <tr>
                            <td>
                                <i class="material-icons right green-text lighten-1">phone</i>
                            </td>
                            <td>
                                <p class="m-0">(18) 3351-1234</p>
                                <p class="m-0">(18) 99876-5432</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="material-icons right green-text lighten-1">location_on</i>
                            </td>
                            <td colspan="2">
                                <p class="m-0">Av. Brasil, 123 - Centro</p>
                                <p class="m-0">São Paulo - SP</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="material-icons right green-text lighten-1">email</i>
                            </td>
                            <td>
                                <p class="m-0">masterpet@gmail.com</p>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="row center">
                        <div class="col l3 s3"><a href="#"><i class="fab fa-facebook-square fa-lg cyan-text"></i></a></div>
                        <div class="col l3 s3"><a href="#"><i class="fab fa-instagram fa-lg cyan-text"></i></a></div>
                        <div class="col l3 s3"><a href="#"><i class="fab fa-twitter fa-lg cyan-text"></i></a></div>
                        <div class="col l3 s3"><a href="#"><i class="fab fa-youtube fa-lg cyan-text"></i></a></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col s12">
                    <h5 class="white-text center">Localização</h5>
                    <div id="mapRodape"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="footer-copyright black">
        <div class="container">
        © 2020 Copyright
        <a class="grey-text text-lighten-4 right" href="#">Desenvolvido por: Bruno Luciano</a>
        </div>
      </div>
    </footer>

    @if ($message = Session::get('success'))
        <script>
            setTimeout(function () {
                toastr.options = {
                    "positionClass": "toast-bottom-full-width",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"]("{{ $message }}")
            },2000);
        </script>
    @endif

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpCDXV0Rl5DBfVUfIcHjkmEGUyvfq96Uw&callback=initMap"></script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: -23.5658425, lng: -46.6636872};
            // The map, centered at Uluru
            var map = new google.maps.Map(document.getElementById('mapRodape'), {
                zoom: 12,
                center: uluru
            });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script>
      $(document).ready(function(){
        $('.sidenav').sidenav();
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.modal').modal();
      });
    </script>
</body>
</html>
