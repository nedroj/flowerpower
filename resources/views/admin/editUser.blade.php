@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Wijzig {{$user->name}}</h1>
            </div>

            <div class="col-md-4">

                <form method="post" action="{{route('users.adminDelete', $user)}}">
                    @csrf
                        @method('delete')

                    <button type="submit" class="btn btn-danger float-right">Verwijder</button>
                </form>

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
            <form class="col-md-12" method="post" action="{{ route('users.adminUpdate', $user) }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">Voornaam</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="infix">Tussenvoegsel</label>
                    <input class="form-control" id="infix" name="infix" type="text"
                           placeholder="{{$user->infix}}">
                </div>

                <div class="form-group">
                    <label for="surname">Achternaam</label>
                    <input class="form-control" id="surname" name="surname" type="text"
                           placeholder="{{$user->surname}}">
                </div>

                <div class="form-group">
                    <label for="phone">Telefoon nummer</label>
                    <input class="form-control" id="phone" name="phone" type="text"
                           placeholder="{{$user->phone}}">
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="address">Straat + Huisnummer</label>--}}
{{--                    <input class="form-control" id="address" name="address" type="text"--}}
{{--                           placeholder="{{$user->address}}">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="zipcode">Postcode</label>--}}
{{--                    <input class="form-control" id="zipcode" name="zipcode" type="text"--}}
{{--                           placeholder="{{$user->zipcode}}">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="city">Stad</label>--}}
{{--                    <input class="form-control" id="city" name="city" type="text" placeholder="{{$user->city}}">--}}
{{--                </div>--}}

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" id="email" name="email" type="text" placeholder="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="isadmin">Rol</label>
                    <select class="form-control" id="rollId" name="rollId">

                        <option value="0" @if($user->rollId == 0) selected @endif>Gebruiker</option>
                        <option value="1" @if($user->rollId == 1) selected @endif>Medewerker</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>

    </div>
@endsection
