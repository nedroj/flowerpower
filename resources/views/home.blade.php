@extends('layouts.app')

@section('content')
    <div class="container">
            @foreach($subCategories as $subCategorie)
                <div class="row">
                    <h4>{{$subCategorie->name}}</h4>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        @if($product->subCategoriesId === $subCategorie->id)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">
                                            <div class="product-imitation">
                                                <img style="max-width: 100%"
                                                     src="{{ asset('/images/'.$product->image) }}"
                                                     alt="geen foto">

                                            </div>
                                            <div class="product-desc">
                                                <span class="product-price">
                                                    <p>&euro;{{$product->price}}</p>
                                                </span>
                                                <small class="text-muted">{{$subCategorie->name}}</small>
                                                <p class="product-name"> {{$product->name}}</p>

                                                <div class="small m-t-xs">
                                                    {{$product->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
@endsection
