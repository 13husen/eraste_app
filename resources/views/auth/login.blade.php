@extends('layouts.app')

@section('content')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <h4>Login Eraste </h4>
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input  type="email"  name="email"  required autocomplete="email" autofocus>
                                @error('email')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="password" >{{ __('Password') }}</label>
                            <div>
                                <input  type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                <div >
                                    <input type="checkbox" name="remember">
                                    <label>
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                            <div>
                                <button type="submit" >
                                    {{ __('Login') }}
                                </button>
                            </div>
                    </form>
@endsection
