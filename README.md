# API Clientes — Laravel + React

API REST para gestionar clientes (CRUD), hecha con **Laravel** y **PostgreSQL**, con un frontend en **React + TypeScript** (Vite). Todo corre con **Docker Compose**.

## Tecnologías
- Backend: Laravel (PHP 8.3), PostgreSQL 17
- Frontend: React + TypeScript + Vite
- Docker / Docker Compose

## Estructura
```
clientes-proyecto/
├── backend/   # API Laravel + docker-compose.yml
└── front/     # App React
```

## Endpoints
| Método | Ruta | Acción |
|---|---|---|
| GET | `/api/clientes` | Listar clientes |
| POST | `/api/clientes` | Crear cliente |
| GET | `/api/clientes/{id}` | Ver un cliente |
| PUT/PATCH | `/api/clientes/{id}` | Actualizar cliente |
| DELETE | `/api/clientes/{id}` | Eliminar cliente |

## Cómo correrlo
1. Copia el archivo de entorno y pon tu contraseña de base de datos en `DB_PASSWORD`:
   ```bash
   cd backend
   cp .env.example .env
   ```
   Configura `DB_CONNECTION=pgsql`, `DB_HOST=postgres`, `DB_DATABASE=api_clientes`, `DB_USERNAME=postgres`.
2. Levanta los contenedores (desde `backend/`):
   ```bash
   docker compose up -d --build
   ```
3. Instala dependencias y migra:
   ```bash
   docker compose exec laravel composer install
   docker compose exec laravel php artisan key:generate
   docker compose exec laravel php artisan migrate
   ```
4. Abre:
   - API: http://localhost:8000/api/clientes
   - Frontend: http://localhost:5173
