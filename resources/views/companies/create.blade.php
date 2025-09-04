<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">{{ __('New Company') }}</h2></x-slot>

    <div class="p-6 max-w-xl">
        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block">{{ __('Name') }} *</label>
                <input name="name" class="border w-full" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">{{ __('Email') }}</label>
                <input name="email" class="border w-full" value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">{{ __('Website') }}</label>
                <input name="website" class="border w-full" value="{{ old('website') }}">
                <x-input-error :messages="$errors->get('website')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">{{ __('Logo (min 100x100)') }}</label>
                <input type="file" name="logo" class="border w-full">
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
