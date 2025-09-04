<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">{{ __('Employees') }}</h2></x-slot>

    <div class="p-6">
        <a href="{{ route('employees.create') }}" class="underline">{{ __('New Employee') }}</a>

        <table id="employees-table" class="display w-full mt-4">
            <thead>
                <tr>
                    <th class="p-2 text-left">{{ __('First Name') }}</th>
                    <th class="p-2 text-left">{{ __('Last Name') }}</th>
                    <th class="p-2 text-left">{{ __('Company') }}</th>
                    <th class="p-2 text-left">{{ __('Email') }}</th>
                    <th class="p-2 text-left">{{ __('Phone') }}</th>
                    <th class="p-2 text-left">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $e)
                    <tr>
                        <td class="p-2">{{ $e->first_name }}</td>
                        <td class="p-2">{{ $e->last_name }}</td>
                        <td class="p-2">{{ $e->company?->name }}</td>
                        <td class="p-2">{{ $e->email }}</td>
                        <td class="p-2">{{ $e->phone }}</td>
                        <td class="p-2">
                            <a href="{{ route('employees.edit', $e) }}" class="underline">{{ __('Edit') }}</a>
                            <form action="{{ route('employees.destroy', $e) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="underline text-red-600" onclick="return confirm('{{ __('Delete?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="p-2" colspan="6">{{ __('No employees yet.') }}</td></tr>
                @endforelse
            </tbody>
        </table>


    </div>
</x-app-layout>
