<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
        <!-- AdminLTE -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.navigation')
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @isset($header)
                    <section class="content-header">
                        <div class="container-fluid">
                            {{ $header }}
                        </div>
                    </section>
                @endisset

                <!-- Flash Messages -->
                @if (session('status'))
                    <div class="container-fluid">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <!-- Main content -->
                <section class="content">
                    {{ $slot }}
                </section>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            $(function () {
                if ($('#companies-table').length) {
                    $('#companies-table').DataTable({
                        dom: 'frtip',            // hide length menu (no "l")
                        pageLength: 10,
                        order: [[0, 'asc']],     // sort by Name
                        columnDefs: [
                            { targets: [3, 4], orderable: false, searchable: false } // Logo, Actions
                        ],
                        language: {
                            search: "{{ __('Search') }}:",
                            info: "{{ __('Showing _START_ to _END_ of _TOTAL_ entries') }}",
                            paginate: {
                                previous: "{{ __('Previous') }}",
                                next: "{{ __('Next') }}"
                            }
                        }
                    });
                }

                if ($('#employees-table').length) {
                    $('#employees-table').DataTable({
                        dom: 'frtip',            // hide length menu
                        pageLength: 10,
                        order: [[1, 'asc']],     // sort by Last Name
                        columnDefs: [
                            { targets: [5], orderable: false, searchable: false }    // Actions
                        ],
                        language: {
                            search: "{{ __('Search') }}:",
                            info: "{{ __('Showing _START_ to _END_ of _TOTAL_ entries') }}",
                            paginate: {
                                previous: "{{ __('Previous') }}",
                                next: "{{ __('Next') }}"
                            }
                        }
                    });
                }
            });
        </script>
    </body>
</html>
