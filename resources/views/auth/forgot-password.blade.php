{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

{{-- ################################################ --}}
{{-- new layout --}}

@extends('admin.template-forms')

@section('title', 'Forgot Password')

@section('content')

    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Forgot Password</h4>
        </div>
    </div>

    <div class="card-body">

        <p class="text-center mb-3">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

        <form role="form" class="text-start" method="POST" action="{{ route('password.email') }}">
            @csrf
                <div class="input-group input-group-outline my-3 mt-5 mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required autofocus />
                    @error('email') <span class="text-danger-sm">{{ $message }}</span>@enderror
                </div>

                <div class="text-center p-3 mt-3" style="cursor: pointer">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>

        </form>
    </div>

@endsection
