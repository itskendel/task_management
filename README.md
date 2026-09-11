# Task Management

## Project Setup

1. Rename `env.example` to `.env`
2. Define the database connection: `sqlite`, `mysql`, or `redis`
3. For `mysql` and `redis`, the following must be filled: `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
4. Generate the application key:

   ```sh
   php artisan key:generate
   ```

5. Run the project:

   ```sh
   composer run dev
   ```

6. Run the migration:

   ```sh
   php artisan migrate
   ```

7. Seed the database:

   ```sh
   php artisan db:seed
   ```

   This generates the data sourced from the back-end repo `test_data.json`.

> **Note:** If you are using a different `APP_URL`, use that instead of the examples below.

---

## API Authentication

### Register

```
POST /api/register
```

| Parameter              | Required |
| ---------------------- | -------- |
| `name`                 | Yes      |
| `email`                | Yes      |
| `password`             | Yes      |
| `password_confirmation`| Yes      |

### Login

```
POST /api/login
```

| Parameter  | Required |
| ---------- | -------- |
| `email`    | Yes      |
| `password` | Yes      |

Returns an access token. Use it in subsequent requests as a Bearer token.

### Logout

```
POST /api/logout
Authorization: Bearer <Token>
```

---

## API Endpoints

All endpoints below require authentication via `Authorization: Bearer <Token>`.

> **Note:** `APP_URL` comes from your `.env` file. If you are using a different `APP_URL`, use that instead.

### Available Objects

- Status
- Priority
- Task

---

### Status

#### GET — Retrieve statuses

```
GET /api/statuses
GET /api/statuses/{id}
```

#### POST — Store status

```
POST /api/statuses
```

#### PUT / PATCH — Update status

```
PUT /api/statuses/{id}
PATCH /api/statuses/{id}
```

#### DELETE — Delete status

```
DELETE /api/statuses/{id}
```

---

### Priority

#### GET — Retrieve priorities

```
GET /api/priorities
GET /api/priorities/{id}
```

#### POST — Store priority

```
POST /api/priorities
```

#### PUT / PATCH — Update priority

```
PUT /api/priorities/{id}
PATCH /api/priorities/{id}
```

#### DELETE — Delete priority

```
DELETE /api/priorities/{id}
```

---

### Task

#### GET — Retrieve task(s)

Retrieves all tasks, or a single task when an `id` is provided.

```
GET /api/tasks
GET /api/tasks/{id}
```

#### POST — Store task

```
POST /api/tasks
```

| Parameter      | Required | Rule                                        |
| -------------- | -------- | ------------------------------------------- |
| `status_id`    | Yes      | Must exist in the Status object             |
| `priority_id`  | Yes      | Must exist in the Priority object           |
| `client_name`  | Yes      | String                                      |
| `project_name` | Yes      | String                                      |
| `desc`         | No       | Long text                                   |
| `start_date`   | Yes      | Date                                        |
| `due_date`     | Yes      | Date, must be after or equal to `start_date`|

#### PUT / PATCH — Update task

```
PUT /api/tasks/{id}
PATCH /api/tasks/{id}
```

| Parameter      | Required | Rule                                        |
| -------------- | -------- | ------------------------------------------- |
| `status_id`    | Sometimes| Must exist in the Status object             |
| `priority_id`  | Yes      | Must exist in the Priority object           |
| `client_name`  | Yes      | String                                      |
| `project_name` | Yes      | String                                      |
| `desc`         | No       | Long text                                   |
| `start_date`   | Yes      | Date                                        |
| `due_date`     | Yes      | Date, must be after or equal to `start_date`|

#### DELETE — Delete task

```
DELETE /api/tasks/{id}
```
