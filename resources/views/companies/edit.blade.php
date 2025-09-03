<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Edit Company</h2></x-slot>

    <div class="p-6 max-w-xl">
        <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block">Name *</label>
                <input name="name" class="border w-full" value="{{ old('name', $company->name) }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input name="email" class="border w-full" value="{{ old('email', $company->email) }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Website</label>
                <input name="website" class="border w-full" value="{{ old('website', $company->website) }}">
                <x-input-error :messages="$errors->get('website')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Logo (min 100x100)</label>
                <input type="file" name="logo" class="border w-full">
                @if($company->logo)
                    <img src="{{ asset('storage/'.$company->logo) }}" class="h-10 mt-2" alt="">
                @endif
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <x-primary-button>Update</x-primary-button>
        </form>
    </div>
</x-app-layout>
