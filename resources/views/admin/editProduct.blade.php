@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Wijzig {{$product->name}}</h1>
            </div>

            <div class="col-md-4">

                <a href="{{route('products.adminDelete', $product)}}">Verwijder</a>

            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form class="col-md-12" method="post" action="{{ route('products.adminUpdate', $product)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group">
                    <h3>Naam</h3>
                    <input class="form-control" id="name" name="name" type="text" placeholder="{{$product->name}}">
                </div>
                <div class="form-group">
                    <h3>Subcategorie</h3>
                    <select  id="subCategoriesId" name="subCategoriesId" class="w-100">
                        @foreach($subCategories as $subCategorie)
                            <option value="{{$subCategorie->id}}" @if($product->subCategoriesId == $subCategorie->id ) selected @endif >{{$subCategorie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">prijs</label>
                    <input class="form-control" id="price" name="price" type="text" placeholder="{{$product->price}}">
                </div>
                <div class="form-group">
                    <h3>Beschrijving</h3>
                    <textarea class="form-control" id="description" name="description" type="text" placeholder="{{$product->description}}"></textarea>
                </div>
                <div class="form-group">
                    <h3>Plaatje</h3>
                    <input type="file" name="file">
                    <img style="max-width: 100%"
                         src="{{ asset('/images/'.$product->image) }}"
                         alt="geen foto">
                </div>

                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>

    </div>
@endsection
