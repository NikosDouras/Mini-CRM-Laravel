<x-mail::message>
# New Company Created

A new company has been added to the CRM.

- **Name:** {{ $company->name }}
- **Email:** {{ $company->email ?? 'N/A' }}
- **Website:** {{ $company->website ?? 'N/A' }}

@if($company->logo)
![Logo]({{ asset('storage/'.$company->logo) }})
@endif

<x-mail::button :url="route('companies.index')">
View Companies
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
