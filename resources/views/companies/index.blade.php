<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">{{ __('Companies') }}</h2></x-slot>

    <div class="p-6">
        <a href="{{ route('companies.create') }}" class="underline">{{ __('New Company') }}</a>

        <table id="companies-table" class="display w-full mt-4">
            <thead>
                <tr>
                    <th class="p-2 text-left">{{ __('Name') }}</th>
                    <th class="p-2 text-left">{{ __('Email') }}</th>
                    <th class="p-2 text-left">{{ __('Website') }}</th>
                    <th class="p-2 text-left">{{ __('Logo') }}</th>
                    <th class="p-2 text-left">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $c)
                    <tr>
                        <td class="p-2">{{ $c->name }}</td>
                        <td class="p-2">{{ $c->email }}</td>
                        <td class="p-2">
                            @if($c->website)
                                <a href="{{ $c->website }}" target="_blank" rel="noopener" class="underline">{{ $c->website }}</a>
                            @endif
                        </td>
                        <td class="p-2">
                            @if($c->logo)
                                <img src="{{ asset('storage/'.$c->logo) }}" class="h-10" alt="">
                            @endif
                        </td>
                        <td class="p-2">
                            <a href="{{ route('companies.edit', $c) }}" class="underline">{{ __('Edit') }}</a>
                            <form action="{{ route('companies.destroy', $c) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="underline text-red-600" onclick="return confirm('{{ __('Delete?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="p-2" colspan="5">{{ __('No companies yet.') }}</td></tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>
