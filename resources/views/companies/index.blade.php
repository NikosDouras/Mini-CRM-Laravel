<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Companies</h2></x-slot>

    <div class="p-6">
        @if (session('status'))
            <div class="mb-4 text-green-700">{{ session('status') }}</div>
        @endif

        <a href="{{ route('companies.create') }}" class="underline">New Company</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Email</th>
                    <th class="p-2 text-left">Website</th>
                    <th class="p-2 text-left">Logo</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $c)
                    <tr class="border-t">
                        <td class="p-2">{{ $c->name }}</td>
                        <td class="p-2">{{ $c->email }}</td>
                        <td class="p-2">
                            @if($c->website)
                                <a href="{{ $c->website }}" target="_blank" class="underline">{{ $c->website }}</a>
                            @endif
                        </td>
                        <td class="p-2">
                            @if($c->logo)
                                <img src="{{ asset('storage/'.$c->logo) }}" class="h-10" alt="">
                            @endif
                        </td>
                        <td class="p-2">
                            <a href="{{ route('companies.edit', $c) }}" class="underline">Edit</a>
                            <form action="{{ route('companies.destroy', $c) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="underline text-red-600" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="p-2" colspan="5">No companies yet.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $companies->links() }}</div>
    </div>
</x-app-layout>
