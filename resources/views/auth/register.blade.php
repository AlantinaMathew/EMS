@extends('layout')


@section('content')
<x-guest-layout style="margin-top:-10p;">
    <x-auth-card>
    <x-slot name="logo">
            <!--a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </!a-->
        </x-slot>
          

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" style="margin-top:0;">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
             <!-- PHONE -->
             <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>
            <!-- PHONE -->
            <div class="mt-4">
                <x-label for="place" :value="__('Place')" />

                <select id="place" class="block mt-1 w-full"  name="place" :value="old('place')" required >
                <option disabled selected>--SELECT A PLACE--</option>
                    <option value="kanjirappaly">kanjirappaly</option>
                    <option value="koovappaly">koovappaly</option>
                    <option value="erumely">erumely</option>
                    <option value="mundakayam">mundakayam</option>
                </select>
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
