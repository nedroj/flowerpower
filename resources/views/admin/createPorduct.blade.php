@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Nieuwe product toevoegen</h1>
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
            <form class="col-md-12" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h3>Subcategorie</h3>
                    <select  id="subCategorie" name="subCategorie" class="w-100">
                        @foreach($subCategories as $subCategorie)
                            <option value="{{$subCategorie->id}}">{{$subCategorie->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <h3>Naam</h3>
                    <input class="form-control" id="name" name="name" type="text" >
                </div>
                <div class="form-group">
                    <h3>Prijs</h3>
                    <input class="form-control" id="price" name="price" type="text" >
                </div>
                <div class="form-group">
                    <h3>Beschrijving</h3>
                    <textarea  class="form-control" id="description" name="description" type="text" ></textarea>
                </div>
                <div class="form-group">
                    <h3>Plaatje</h3>
                    <input type="file" name="file">
                </div>

                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>

    </div>
@endsection
