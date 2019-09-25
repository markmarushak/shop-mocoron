@if($products)
    <div class="card-deck">
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4 col">
                    <div class="card card-profile ml-auto mr-auto">
                        <div class="card-header card-header-image">
                            <a href="{{ route('show-product', $product->id) }}" style="display: block;">
                                <img src="{{ asset('storage/product_photo/'.$product->photos->path) }}" class="card-img-top" alt="...">
                            </a>
                            @auth
                                @if(\Auth::user()->id == $product->user_id)
                                    <div class="tools">
                                        <a href="#" data-id="{{ $product->id }}" class="btn btn-danger  btn-fab btn-round text-light"
                                           onclick="event.preventDefault();
                                           document.getElementById('product-delete').setAttribute('value', this.getAttribute('data-id'));
                                           document.getElementById('delete-form').submit();">
                                            <i class="material-icons">delete</i>
                                        </a>
                                        <a href="#" data-id="{{ $product->id }}" class="btn btn-warning  btn-fab btn-round text-light">
                                            <i class="material-icons">build</i>
                                        </a>

                                    </div>
                                @endif
                            @endauth
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('show-product', $product->id) }}">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <div class="price">
                                <ul class="list-group">
                                    <li>
                                        <span class="text-dark">UAH</span>
                                        {{ $product->price['uah'] }}
                                    </li>
                                    <li>
                                        <span class="text-dark">USD</span>
                                        {{ $product->price['usd'] }}</li>
                                    <li>
                                        <span class="text-dark">EUR</span>
                                        {{ $product->price['eur'] }}</li>
                                </ul>

                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <p class="card-text">{{ $product->text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <form id="delete-form" action="{{ route('delete-product') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" id="product-delete" name="id" value="">
            </form>
        </div>

        <div id="pagination" class="form-group">
            {{ $products->links('layouts.partials.pagination') }}
        </div>
    </div>
@endif