@extends('pages.layout')

@section('main')



        <div class="row">
            <div class="col-sm-9 col-12">
                <div class="card card-blog">

                    <div class="row">
                        <div class="col-sm-8 col-12">

                            <div class="card-header card-header-image">
                                <a href="#pablo">
                                    <img src="{{ asset("storage/product_photo/".$product->photos->path) }}" class="card-img-top" alt="...">
                                    <div class="card-title">
                                        <h3>{{ $product->name }}</h3>
                                    </div>
                                </a>
                            </div>

                            <div class="card-body">
                                <br>
                            </div>

                        </div>

                        <div class="col-sm-4 col-12">

                            <div class="card-body">
                                <p class="card-text">{{ $product->text }} <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto blanditiis consequatur delectus dolore laborum, natus, necessitatibus non nulla perferendis quasi sed sit totam vero voluptate voluptatibus. Ducimus magnam nam quisquam.</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col">
                <div class="card currency">
                    <div class="card-header card-header-text card-header-primary text-right">
                        <div class="card-text">
                            <h4 class="card-title">UAH</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>{{ $product->price['uah'] }}</h3>
                    </div>
                </div>

                <div class="card currency">
                    <div class="card-header card-header-text card-header-primary text-right">
                        <div class="card-text">
                            <h4 class="card-title">USD</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>{{ $product->price['usd'] }}</h3>
                    </div>
                </div>

                <div class="card currency">
                    <div class="card-header card-header-text card-header-primary text-right">
                        <div class="card-text">
                            <h4 class="card-title">EUR</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>{{ $product->price['eur'] }}</h3>
                    </div>
                </div>


                <div class="group-btn btn-group-lg">
                    @auth
                        @if(\Auth::user()->id == $product->user_id)
                            <a href="#" data-id="{{ $product->id }}" class="btn btn-danger  btn-fab btn-round text-light"
                               onclick="event.preventDefault();
                                           document.getElementById('product-delete').setAttribute('value', this.getAttribute('data-id'));
                                           document.getElementById('delete-form').submit();">
                                <i class="material-icons">delete</i>
                            </a>
                        @endif
                    @endauth
                    <button class="btn btn-success btn-round">
                        <i class="material-icons">favorite</i>
                        Buy
                    </button>
                </div>

            </div>

        </div>
        <form id="delete-form" action="{{ route('delete-product') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" id="product-delete" name="id" value="">
        </form>




@endsection