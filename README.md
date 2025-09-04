# Mini-CRM (Laravel)

Simple admin panel to manage **companies** and their **employees**.

## Features
- Admin authentication (login only; no public registration)
- Companies CRUD (name, email, website, **logo upload** ≥ 100×100; stored in `storage/app/public`)
- Employees CRUD (first/last name, company relation, email, phone)
- Eloquent relations, Resource Controllers, Form Request validation
- Migrations & seeders (includes default admin user)
- Pagination (10 per page)
- DataTables for searchable/sortable lists
- AdminLTE UI theme
- Email notification on new company (Mailgun/Mailtrap)
- Multi-language via `lang/`
- Basic PHPUnit tests
