@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h1>producten beheer</h1>

            <a href="{{ url('/beheer/producten/toevoegen') }}">
                <button class="btn btn-success">
                    producten toevoegen
                </button>
            </a>

        </div>

        <table class="table">
            @foreach($subCategories as $subCategorie)
                <tr>
                    <th colspan="2">
                        <h3>
                            {{ $subCategorie->name }}
                        </h3>
                    </th>
                </tr>
                @foreach ($products as $product)
                    @if($product->subCategoriesId === $subCategorie->id)
                        <tr>
                            <td class="w-100">{{$product->name}} - &euro;{{$product->price}} </td>
                            <td>
                                <a href="{{route('products.adminUpdate', $product)}}">Wijzigen</a>
                            </td>
                            <td class="float-right"><a href="{{route('products.adminDelete', $product)}}">Verwijder</a></td>

                        </tr>
                    @endif
                @endforeach
            @endforeach
        </table>


    </div>
@endsection
