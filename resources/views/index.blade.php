@extends('layouts.website')

@section('content')
    <br>
    <div class="row">
        <div class="col s12 l12">
            <div id="carouselFirst" class="carousel carousel-slider center z-depth-2">
                <div class="carousel-item black-text" href="#one!">
                    <img class="responsive-img" src="{{ asset('images/slide1.jpg') }}">
                </div>
                <div class="carousel-item amber white-text" href="#two!">
                    <img class="responsive-img" src="{{ asset('images/slide2.jpeg') }}">
                </div>
                <div class="carousel-item green white-text" href="#three!">
                    <img class="responsive-img" src="{{ asset('images/slide3.png') }}">
                </div>
                <div class="carousel-item blue white-text" href="#four!">
                    <img class="responsive-img" src="{{ asset('images/slide4.jpg') }}">
                </div>
                <div class="row slider-center">
                    <i id="carousel-next" class="material-icons z-depth-2 teal darken-1">chevron_right</i>
                    <i id="carousel-prev" class="material-icons z-depth-2 teal darken-1">chevron_left</i>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col l4 m4 s12">
            <div class="card green lighten-4">
                <div class="card-image card-same-height waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset('images/BanhoETosa.jpg') }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">
                        Banho e Tosa<i class="material-icons right">more_vert</i>
                    </span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">
                        Banho e Tosa<i class="material-icons right">close</i>
                    </span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
        </div>
        <div class="col l4 m4 s12">
            <div class="card green lighten-4">
                <div class="card-image card-same-height waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset('images/consulta.png') }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">
                        Consultas<i class="material-icons right">more_vert</i>
                    </span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">
                        Consultas<i class="material-icons right">close</i>
                    </span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
        </div>
        <div class="col l4 m4 s12">
            <div class="card green lighten-4">
                <div class="card-image card-same-height waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset('images/produtos.jpg') }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">
                        Produtos<i class="material-icons right">more_vert</i>
                    </span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">
                        Produtos<i class="material-icons right">close</i>
                    </span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    <a href="{{ url('/produtos') }}" class="waves-effect waves-light btn btn-block">Acessar Página</a>
                </div>
            </div>
        </div>

    </div>

    <script>
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });

        $('#carousel-next').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#carouselFirst').carousel('next');
        });

        $('#carousel-prev').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#carouselFirst').carousel('prev');
        });

        autoplay();
        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 4500);
        }
    </script>
@endsection
