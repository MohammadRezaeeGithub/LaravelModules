<div align="center">

# Laravel Modules

**A modular Laravel application built from scratch — demonstrating clean architecture, Docker-based infrastructure, and custom Role-Based Access Control without any third-party packages.**

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)
[![Nginx](https://img.shields.io/badge/Nginx-1.x-009639?style=flat-square&logo=nginx&logoColor=white)](https://nginx.org)
[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?style=flat-square&logo=docker&logoColor=white)](https://docker.com)

[Features](#-features) · [Architecture](#-architecture) · [Modules](#-modules) · [Getting Started](#-getting-started) · [Screenshots](#-screenshots)

</div>

---

##  About The Project

This project was built as a deep-dive into **software engineering principles** and **web application design** using Laravel — fully containerized with Docker.

The goal was to implement a modular monolith architecture **from scratch**, without relying on any external packages (no Spatie, no third-party RBAC libraries). Every feature — from the Role-Based Access Control system to the shopping basket's storage abstraction — was hand-crafted to maximize learning and demonstrate engineering fundamentals.

---

## Features

- ✅ **Modular Architecture** — each feature is a self-contained module with its own routes, models, migrations, views, and service providers
- ✅ **Custom RBAC** — roles and permissions system built from scratch using Laravel Gates and middleware
- ✅ **Storage Abstraction** — basket storage uses a contract/interface pattern, making it easy to swap between session, database, or any future storage driver
- ✅ **Fully Dockerized** — PHP-FPM, Nginx, and MySQL all orchestrated with Docker Compose
- ✅ **Blade Frontend** — clean server-side rendered views focused on backend architecture demonstration

---

##  Architecture

The application follows a **Modular Monolith** pattern. Each module lives under `src/modules/` and is completely self-sufficient:

```
src/
├── app/                  # Laravel core
├── modules/
│   ├── AccessControl/    # RBAC module
│   │   ├── Database/
│   │   ├── Http/
│   │   ├── Models/
│   │   ├── Providers/
│   │   ├── resources/views/
│   │   ├── routes/
│   │   ├── Services/
│   │   └── Traits/
│   └── Basket/           # Shopping basket module
│       ├── Database/
│       ├── Exceptions/
│       ├── Http/Controllers/
│       ├── Models/
│       ├── Providers/
│       ├── resources/views/
│       ├── routes/
│       └── Services/
│           ├── Basket/
│           └── Storage/
│               └── Contracts/   # StorageInterface + SessionStorage
├── config/
├── database/
├── public/
├── resources/
├── routes/
└── ...
```

### Docker Infrastructure

```
dockerfiles/
├── php.dockerfile        # PHP-FPM container
├── nginx.dockerfile      # Nginx web server
└── entrypoint.sh         # Container bootstrap script

nginx/
└── nginx.conf            # Nginx site configuration

env/
└── mysql.env             # MySQL environment variables

docker-compose.yaml       # Orchestration: backend + server + db + composer
```

**Containers:**

| Container | Role |
|---|---|
| `laravelmodules-backend` | PHP-FPM application server |
| `laravelmodules-server` | Nginx web server |
| `laravelmodules-db` | MySQL 8 database |
| `laravelmodules-composer` | Composer dependency installer |

---

##  Modules

###  AccessControl

Handles everything related to **users, roles, and permissions** — all implemented without any external RBAC package.

**How it works:**
- Roles and permissions are stored in the database
- On boot, the `AccessControlServiceProvider` registers all permissions as **Laravel Gates**, enabling `$user->can('permission-name')` checks anywhere in the app
- A custom `RoleMiddleware` protects routes by role
- Blade directives like `@role('admin')` are registered for easy view-level access control

**Capabilities:**
- List all users
- Create, edit, and manage roles
- Assign roles to users
- Permission-based authorization via Gates

###  Basket

A shopping basket module with a clean **storage abstraction layer**.

**Design highlight — Storage Contracts:**

The basket uses a `StorageInterface` contract, currently implemented by `SessionStorage`. This means switching to database or Redis storage in the future requires zero changes to business logic — just swap the implementation.

```
Services/
└── Storage/
    └── Contracts/
        ├── StorageInterface.php   # Contract
        └── SessionStorage.php     # Current implementation
```

**Capabilities:**
- Browse products
- Add items to basket
- View basket with payment summary (subtotal, shipping, total)
- Place order
- Cart badge with live item count

---

## Getting Started

### Prerequisites

- [Docker](https://www.docker.com/get-started) and Docker Compose installed on your machine

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/MohammadRezaeeGithub/LaravelModules.git
cd LaravelModules
```

**2. Set up environment variables**

```bash
cp src/.env.example src/.env
```

**3. Build and start all containers**

```bash
docker compose up -d --build
```

**4. Run migrations and seed the database**

```bash
docker compose exec backend php artisan migrate:fresh --seed --force
```

**5. Open the application**

```
http://localhost:8000
```

> **That's it.** No local PHP or Composer installation needed — everything runs inside Docker.

---

## Roadmap

- [x] AccessControl module (roles & permissions)
- [x] Basket module with storage abstraction
- [ ] Authentication module (login / register)
- [ ] Payment integration

---

## Contributing

This project is primarily a personal learning project, but contributions, suggestions, and feedback are always welcome.

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/my-feature`
5. Open a Pull Request

---

##  License

Distributed under the MIT License. See `LICENSE` for more information.

---

