@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="space space--20"></div>

        <div class="row">
            <div class="col-md-8">
                <h1>Hallo {{$user->name}}</h1>
            </div>

            <div class="col-md-4">
{{--                Doet een request naar de route  delete-account --}}
                <a href="{{url('/delete-account')}}">
                    <button type="submit" class="btn btn-danger float-right">Verwijder account</button>
                </a>
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
            <div class="col-md-12">
                <form method="post" action="{{route('users.update', $user)}}">
                    @csrf
                    @method('patch')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" value="{{ $user->name }}"
                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{  ucfirst($message) }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="infix"
                               class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                        <div class="col-md-3">
                             <input id="infix" type="text" value="{{ $user->infix }}" class="form-control" name="infix"
                                   value="{{ old('infix') }}" autocomplete="infix" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname"
                               class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" value="{{ $user->surname }}"
                                   class="form-control @error('surname') is-invalid @enderror" name="surname"
                                   value="{{ old('surname') }}"  autocomplete="surname" autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{  ucfirst($message) }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" value="{{ $user->email }}"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{  ucfirst($message) }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{  ucfirst($message) }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"
                                   autocomplete="new-password">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="phone"
                               class="col-md-4 col-form-label text-md-right">{{ __('Telefoon nummer') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" value="{{ $user->phone }}"
                                   class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                   value="{{ old('phone') }}" autocomplete="phone" autofocus>
                            @error('ephone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{  ucfirst($message) }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="address" type="text" value="{{ $user->address }}"--}}
{{--                                   class="form-control  @error('address') is-invalid @enderror" name="address"--}}
{{--                                   placeholder="Straat" autocomplete="address" autofocus>--}}
{{--                            @error('address')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{  ucfirst($message) }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="name"--}}
{{--                               class="col-md-4 col-form-label text-md-right">{{ __('Postcode en plaats') }}</label>--}}

{{--                        <div class="col-md-3">--}}
{{--                            <input id="zipcode" value="{{ $user->zipcode }}" type="text"--}}
{{--                                   class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"--}}
{{--                                   placeholder="Postcode" value="{{ old('zipcode') }}"  autocomplete="city"--}}
{{--                                   autofocus>--}}

{{--                            @error('zipcode')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{  ucfirst($message) }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <input id="city" type="text" value="{{ $user->city }}"--}}
{{--                                   class="form-control @error('city') is-invalid @enderror" name="city"--}}
{{--                                   placeholder="plaats"--}}
{{--                                   value="{{ old('city') }}"  autocomplete="city" autofocus>--}}

{{--                            @error('city')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{  ucfirst($message) }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row">
                        @if(env('GOOGLE_RECAPTCHA_KEY'))
                            <div class="col-md-4"></div>
                            <div class="g-recaptcha col-md-8"
                                 data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                            </div>
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Opslaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
