@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Nieuwe gerbuiker toevoegen</h1>
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
                    <label for="name">Voornaam</label>
                    <input class="form-control" id="name" name="name" type="text">
                </div>

                <div class="form-group">
                    <label for="infix">Tussenvoegsel</label>
                    <input class="form-control" id="infix" name="infix" type="text">
                </div>

                <div class="form-group">
                    <label for="surname">Achternaam</label>
                    <input class="form-control" id="surname" name="surname" type="text">
                </div>

                <div class="form-group">
                    <label for="phone">Telefoon nummer</label>
                    <input class="form-control" id="phone" name="phone" type="text">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" id="email" name="email" type="text">
                </div>

                <div class="form-group">
                    <label for="rollId">Rol</label>
                    <select class="form-control" id="rollId" name="rollId">
                        <option value="0" >Gebruiker</option>
                        @foreach($rolls as $roll)
                            <option value="{{$roll->id}}">{{$roll->name}}</option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>

    </div>
@endsection
