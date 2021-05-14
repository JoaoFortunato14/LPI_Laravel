@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                Tourist Guide Invicta
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{url('/profile')}}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{url('/userMap')}}">
                                        {{ __('Available Routes') }}
                                    </a>
                            </div>
                            
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@endsection

@section('content')
<br>
<br>
<h2>Informaçao Pessoal</h2>
<br>
<br>

<ul class="list-group">
    
    <li class="list-group-item">
        <h5>Name: {{ Auth::user()->name }} </h5>
    </li>
    <li class="list-group-item">
        <h5>Last Name: {{ Auth::user()->last_name }} </h5>
    </li>
    <li class="list-group-item">
        <h5>Address: {{ Auth::user()->address }} </h5>
    </li>
    <li class="list-group-item">
        <h5>Phone Number: {{ Auth::user()->phone_number }} </h5>
    </li> 
    <li class="list-group-item">
        <h5>City: {{ Auth::user()->city }} </h5>
    </li> 
    <li class="list-group-item">
        <h5>Country: {{ Auth::user()->country }} </h5>
    </li>  
    <li class="list-group-item">
        <h5>Email: {{ Auth::user()->email }} </h5>
    </li>  
</ul>
@endsection