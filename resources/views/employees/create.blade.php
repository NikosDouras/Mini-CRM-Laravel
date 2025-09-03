<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">New Employee</h2></x-slot>

    <div class="p-6 max-w-xl">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block">First name *</label>
                <input name="first_name" class="border w-full" value="{{ old('first_name') }}">
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Last name *</label>
                <input name="last_name" class="border w-full" value="{{ old('last_name') }}">
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Company *</label>
                <select name="company_id" class="border w-full">
                    <option value="">-- select --</option>
                    @foreach($companies as $id => $name)
                        <option value="{{ $id }}" @selected(old('company_id') == $id)>{{ $name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input name="email" class="border w-full" value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block">Phone</label>
                <input name="phone" class="border w-full" value="{{ old('phone') }}">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <x-primary-button>Save</x-primary-button>
        </form>
    </div>
</x-app-layout>
