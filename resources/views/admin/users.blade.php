@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h1>Admin Gebruikers</h1>
            <a href="{{ url('/beheer/gebruiker/toevoegen') }}">
                <button class="btn btn-success">
                    producten toevoegen
                </button>
            </a>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th class="d-none d-lg-table-cell">ID</th>
                    <th class="d-none d-lg-table-cell">Naam</th>
                    <th class="d-none d-lg-table-cell">Wijzigen</th>
                </tr>
                @foreach($users as $user)


                    <tr>
                        <td class="d-none d-lg-table-cell">
                            {{$user->id}}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{$user->name}}
                        </td>
                        <td>
                            <a href="{{route('users.adminUpdate', $user)}}">Wijzigen</a>
                        </td>
                @endforeach
            </table>

        </div>
        <div class="row d-flex justify-content-center">
            <div>    {!! $users->links() !!}</div>
        </div>
    </div>
@endsection
