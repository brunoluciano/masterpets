@extends('layouts.website')

@section('title', '| Sobre')

@section('content')
    <div class="bgSobre z-depth-2 pt-5">
        <h1 id="sobreTitulo" class="white-text center font-weight-light m-0">Sobre nossa Empresa</h1>
    </div>
    <br>
    <div class="container">
        <div class="row text-justify">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a ex eget mi aliquet dapibus sit amet non metus. Integer auctor dignissim ante, a eleifend nunc lacinia id. Maecenas dignissim convallis elit convallis scelerisque. Donec ut arcu eu nibh pretium tincidunt et in ligula. Proin id risus sit amet metus sodales eleifend mattis ac mi. Proin interdum tristique ante porttitor interdum. Donec nulla est, faucibus vel diam sed, hendrerit tempus risus.</p>
        </div>
        <div class="row">
            <h3 class="grey-text text-darken-2">História</h3>
            <div class="col l7 s12 text-justify">
                <p class="mt-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a ex eget mi aliquet dapibus sit amet non metus. Integer auctor dignissim ante, a eleifend nunc lacinia id. Maecenas dignissim convallis elit convallis scelerisque. Donec ut arcu eu nibh pretium tincidunt et in ligula. Proin id risus sit amet metus sodales eleifend mattis ac mi. Proin interdum tristique ante porttitor interdum. Donec nulla est, faucibus vel diam sed, hendrerit tempus risus.</p>
                <p>Curabitur aliquam, dolor in iaculis fermentum, diam quam consequat erat, in fringilla odio elit quis urna. Donec scelerisque mi elementum nulla consectetur aliquet. Proin lacinia elementum est in aliquam. Integer congue orci ac libero feugiat dictum. Donec non dolor sit amet nibh lobortis volutpat. Nulla sed nisl sit amet nulla venenatis congue. Mauris molestie magna vitae condimentum blandit.</p>
            </div>
            <div class="col l5 s12">
                <img class="responsive-img rounded z-depth-2" src="{{ asset('images/empresaSobre.jpg') }}">
            </div>
        </div>
        <div class="row">
            <h3 class="grey-text text-darken-2">Localização</h3>
            <div class="col l5 s12">
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
            </div>
            <div class="col l7 s12">
                <div id="mapSobre" class="mapSobre"></div>
            </div>

            <script>
                // Initialize and add the map
                function initMap() {
                    // The location of Uluru
                    var uluru2 = {lat: -23.5658425, lng: -46.6636872};
                    // The map, centered at Uluru
                    var map2 = new google.maps.Map(document.getElementById('mapSobre'), {
                        zoom: 12,
                        center: uluru2
                    });
                    // The marker, positioned at Uluru
                    var marker = new google.maps.Marker({
                        position: uluru2,
                        map: map2
                    });
                }
            </script>
        </div>
    </div>
@endsection
