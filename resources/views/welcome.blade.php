@extends('layout')


@section('content')
<div class="column6">
                
@if (Route::has('login'))
                @auth
                <a href="/search_d"><div class="card6">
               @else
               <a href="{{ route('login') }}"><div class="card6">
               @endif
               @endauth

                        
                        <img src="images/blood.jpg" width="100%"height="240px">
                         <h1>Find Donor</h1>

                    </div></a>
                </div>

                <div class="column6">

                @if (Route::has('login'))
                @auth
                <a href="/search_a"><div class="card6">
               @else
               <a href="{{ route('login') }}"><div class="card6">
               @endif
               @endauth

                    <img src="images/ambu.jpg" width="100%"height="240px">
                    <h1>Call Ambulance</h1>

                    </div></a>
                </div>
                <div class="column6">
                @if (Route::has('login'))
                @auth
                <a href="/search_f"><div class="card6">
               @else
               <a href="{{ route('login') }}"><div class="card6">
               @endif
               @endauth

                    <img src="images/fuel.jpg" width="100%"height="240px">
                      <h1>Call Fuel Buddies</h1>

                    </div></a>
                </div>

                <div class="column6">
                @if (Route::has('login'))
                @auth
                <a href="/search_r"><div class="card6">
               @else
               <a href="{{ route('login') }}"><div class="card6">
                   @endif
                   @endauth
                    <img src="images/rep.webp" width="100%"height="240px">
                     <h1>Call ReadyRepair</h1>

                    </div></a>
                </div>
</div>

 @endsection