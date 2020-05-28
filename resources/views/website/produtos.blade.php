@extends('layouts.website')

@section('title', '| Produtos')

@section('content')
    <div class="row pt-4">
        <div class="col l12 center">
            <img class="responsive-img" src="{{ asset('images/bannerProdutos.jpg') }}">
        </div>
    </div>
    <div class="row">
        <div class="col l2 m3 hide-on-small-only">
            <h5 class="my-0 ml-3 light-blue-text text-darken-3">Animais</h5>
            <div class="collection">
                <a href="#!" class="collection-item grey-text text-darken-2">Cachorro</a>
                <a href="#!" class="collection-item grey-text text-darken-2">Gato</a>
                <a href="#!" class="collection-item grey-text text-darken-2">Pássaro</a>
                <a href="#!" class="collection-item grey-text text-darken-2">Peixe</a>
                <a href="#!" class="collection-item grey-text text-darken-2">Outros Pets</a>
            </div>
            <hr class="divider my-4">
            <h5 class="my-0 ml-3 light-blue-text text-darken-3">Fase da Vida</h5>
            <form class="" action="#">
                <p>
                  <label class="grey-text text-darken-2">
                    <input type="checkbox" />
                    <span>Filhote</span>
                  </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                        <input type="checkbox" />
                        <span>Adulto</span>
                    </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                      <input type="checkbox" />
                      <span>Sênior</span>
                    </label>
                </p>
            </form>
            <hr class="divider my-4">
            <h5 class="my-0 ml-3 light-blue-text text-darken-3">Peso</h5>
            <form class="" action="#">
                <p>
                  <label class="grey-text text-darken-2">
                    <input type="checkbox" />
                    <span>Até 1 kg</span>
                  </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                        <input type="checkbox" />
                        <span>De 1 a 2 kg</span>
                    </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                      <input type="checkbox" />
                      <span>De 2 a 4 kg</span>
                    </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                        <input type="checkbox" />
                        <span>De 4 a 10 kg</span>
                    </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                        <input type="checkbox" />
                        <span>Acima de 10 kg</span>
                    </label>
                </p>
            </form>
            <hr class="divider my-4">
            <h5 class="my-0 ml-3 light-blue-text text-darken-3">Porte</h5>
            <form class="" action="#">
                <p>
                  <label class="grey-text text-darken-2">
                    <input type="checkbox" />
                    <span>Pequeno</span>
                  </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                        <input type="checkbox" />
                        <span>Médio</span>
                    </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                      <input type="checkbox" />
                      <span>Grande</span>
                    </label>
                </p>
                <p>
                    <label class="grey-text text-darken-2">
                      <input type="checkbox" />
                      <span>Gigante</span>
                    </label>
                </p>
            </form>
        </div>

        <div class="col l10 m9 s12">
            <div class="row mb-0 mr-1">
                <div class="input-field col l2 offset-l8 s6 mb-0">
                    <select id="select=dark" class="select-dark">
                        <option value="1">25</option>
                        <option value="2">50</option>
                        <option value="3">100</option>
                    </select>
                    <label class="label-dark">Mostrar por página</label>
                </div>
                <div class="input-field col l2 s6 mb-0">
                    <select id="select=dark" class="select-dark">
                        <option value="1">Mais relevantes</option>
                        <option value="1">A-Z</option>
                        <option value="1">Z-A</option>
                        <option value="1">Lançamentos</option>
                        <option value="1">Maior Preço</option>
                        <option value="2">Menor Preço</option>
                    </select>
                    <label class="label-dark">Ordenar por</label>
                </div>
            </div>
            <div class="row mx-1">
                <div class="rounded z-depth-1 grey lighten-5">
                    <div class="row mb-0">
                        <div class="col l10 offset-l1 s12 pt-3">
                            <h5 class="font-weight-light center teal-text mx-0"><b>Novidades que chegaram para você!</b></h5>
                            <div id="carouselFirst" class="carousel mt-0 my-0 py-0">
                                @for ($i = 0; $i < 5; $i++)
                                    <a class="carousel-item" href="#{{ $i }}">
                                        <div class="card hoverable z-depth-2 margin-top-slide">
                                            <div class="card-image">
                                                <img src="{{ asset('images/produtoSemFigura.jpg') }}">
                                            </div>
                                            <div class="card-content center px-1 py-2">
                                                <h5 class="m-0 grey-text text-darken-2">Produto Exemplo</h5>
                                                <hr class="grey-text text-lighten-5">
                                                <span class="font-weight-light grey-text text-darken-1">A partir de</span>
                                                <h6 class="m-0 font-weight-bold green-text text-darken-3">R$ XXX,XX</h6>
                                            </div>
                                        </div>
                                    </a>
                                @endfor
                                <div class="row slider-center margin-top-slide">
                                    <i id="carousel-next" class="material-icons z-depth-2 teal">chevron_right</i>
                                    <i id="carousel-prev" class="material-icons z-depth-2 teal">chevron_left</i>
                                </div>
                            </div>
                            <hr class="mx-0">
                            <div class="row">
                                @for ($i = 0; $i < 20; $i++)
                                    <div class="col l3 s6">
                                        <div class="card hoverable z-depth-2">
                                            <div class="card-image">
                                                <img src="{{ asset('images/produtoSemFigura.jpg') }}">
                                            </div>
                                            <div class="card-content center p-2">
                                                <h5 class="m-0 grey-text text-darken-2">Produto Exemplo</h5>
                                                <hr class="grey-text text-lighten-5">
                                                <span class="font-weight-light grey-text text-darken-1">A partir de</span>
                                                <h6 class="m-0 font-weight-bold green-text text-darken-3">R$ XXX,XX</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l10 offset-l1 s12">
                            <hr>
                            <ul class="pagination center">
                                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                                <li class="active teal"><a href="#!">1</a></li>
                                <li class="waves-effect"><a href="#!">2</a></li>
                                <li class="waves-effect"><a href="#!">3</a></li>
                                <li class="waves-effect"><a href="#!">4</a></li>
                                <li class="waves-effect"><a href="#!">5</a></li>
                                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOBILE -->
        <div class="hide-on-med-and-up">
            <div class="fixed-action-btn">
                <a href="#" data-target="filtro-mobile" class="btn-floating btn-large green sidenav-trigger z-depth-2">
                    <i class="fas fa-filter fa-lg"></i>
                </a>
            </div>
        </div>
        <ul id="filtro-mobile" class="sidenav p-4">
            <li>
                <h4 class="center">Filtrar Produtos</h4>
            </li>
            <hr>
            <li>
                <h5 class="my-0 ml-3 light-blue-text text-darken-3">Animais</h5>
                <div class="collection">
                    <a href="#!" class="collection-item grey-text text-darken-2">Cachorro</a>
                    <a href="#!" class="collection-item grey-text text-darken-2">Gato</a>
                    <a href="#!" class="collection-item grey-text text-darken-2">Pássaro</a>
                    <a href="#!" class="collection-item grey-text text-darken-2">Peixe</a>
                    <a href="#!" class="collection-item grey-text text-darken-2">Outros Pets</a>
                </div>
            </li>
            <hr class="divider my-4">
            <li>
                <h5 class="my-0 ml-3 light-blue-text text-darken-3">Fase da Vida</h5>
                <form class="" action="#">
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Filhote</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Adulto</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Sênior</span>
                        </label>
                    </p>
                </form>
            </li>
            <hr class="divider my-4">
            <li>
                <h5 class="my-0 ml-3 light-blue-text text-darken-3">Peso</h5>
                <form class="" action="#">
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Até 1 kg</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>De 1 a 2 kg</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>De 2 a 4 kg</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>De 4 a 10 kg</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Acima de 10 kg</span>
                        </label>
                    </p>
                </form>
            </li>
            <hr class="divider my-4">
            <li>
                <h5 class="my-0 ml-3 light-blue-text text-darken-3">Porte</h5>
                <form class="" action="#">
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Pequeno</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Médio</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Grande</span>
                        </label>
                    </p>
                    <p class="my-0 py-0">
                        <label class="grey-text text-darken-2">
                            <input type="checkbox" />
                            <span>Gigante</span>
                        </label>
                    </p>
                </form>
            </li>
        </ul>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems, {
            direction: 'left',
            hoverEnabled: false
            });
        });
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton();
        });
    </script>
    <script>
        $(document).ready(function(){
          $('.filtro-mobile').sidenav();
        });
    </script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.carousel').carousel();
            autoplay();
            function autoplay() {
                $('.carousel').carousel('next');
                setTimeout(autoplay, 4500);
            }
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
    </script>
@endsection

