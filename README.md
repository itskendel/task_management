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

**Response (201):**

```json
{
    "message": "User successfully registered",
    "access_token": "1|abc...",
    "token_type": "Bearer"
}
```

**Error Response (422):**

```json
{
    "message": "The email has already been taken.",
    "errors": {
        "email": ["The email has already been taken."]
    }
}
```

### Login

```
POST /api/login
```

| Parameter  | Required |
| ---------- | -------- |
| `email`    | Yes      |
| `password` | Yes      |

**Response (200):**

```json
{
    "access_token": "1|abc...",
    "token_type": "Bearer",
    "expires_at": "2026-09-18T00:00:00.000000Z"
}
```

**Error Response (401):**

```json
{
    "message": "Unauthorized: Invalid credentials provided."
}
```

### Logout

```
POST /api/logout
Authorization: Bearer <Token>
```

**Response (200):**

```json
{
    "message": "Successfully logged out and token revoked."
}
```

---

## API Endpoints

All endpoints below require authentication via `Authorization: Bearer <Token>`.

> **Note:** `APP_URL` comes from your `.env` file. If you are using a different `APP_URL`, use that instead.

### Available Objects

#### Status

| Field        | Type     | Description                        |
| ------------ | -------- | ---------------------------------- |
| `id`         | integer  | Unique identifier                  |
| `name`       | string   | Status name (unique, max 255)      |
| `desc`       | string   | Description (nullable)             |
| `created_at` | datetime | Creation timestamp                 |
| `updated_at` | datetime | Last update timestamp              |

#### Priority

| Field        | Type     | Description                        |
| ------------ | -------- | ---------------------------------- |
| `id`         | integer  | Unique identifier                  |
| `name`       | string   | Priority name (unique, max 255)    |
| `desc`       | string   | Description (nullable)             |
| `created_at` | datetime | Creation timestamp                 |
| `updated_at` | datetime | Last update timestamp              |

#### Task

| Field          | Type     | Description                                      |
| -------------- | -------- | ------------------------------------------------ |
| `id`           | integer  | Unique identifier                                |
| `status_id`    | integer  | Foreign key to Status                            |
| `priority_id`  | integer  | Foreign key to Priority                          |
| `client_name`  | string   | Client name (max 255)                            |
| `project_name` | string   | Project name (max 255)                           |
| `desc`         | string   | Description (nullable)                           |
| `start_date`   | date     | Task start date                                  |
| `due_date`     | date     | Task due date (must be after or equal to start)  |
| `status`       | string   | Status name (appended from Status relation)      |
| `priority`     | string   | Priority name (appended from Priority relation)  |
| `created_at`   | datetime | Creation timestamp                               |
| `updated_at`   | datetime | Last update timestamp                            |

---

### Status

#### GET — Retrieve statuses

```
GET /api/statuses
GET /api/statuses/{id}
```

**Response (200):**

```json
[
    {
        "id": 1,
        "name": "Pending",
        "desc": "Task is pending",
        "created_at": "2026-09-10T10:00:00.000000Z",
        "updated_at": "2026-09-10T10:00:00.000000Z"
    }
]
```

**Error Response (404):**

```json
{
    "message": "Status not found."
}
```

#### POST — Store status

```
POST /api/statuses
```

| Parameter | Required | Rule                              |
| --------- | -------- | --------------------------------- |
| `name`    | Yes      | String, max 255, unique in statuses |
| `desc`    | No       | String                            |

**Response (200):**

```json
{
    "id": 1,
    "name": "Pending",
    "desc": "Task is pending",
    "created_at": "2026-09-10T10:00:00.000000Z",
    "updated_at": "2026-09-10T10:00:00.000000Z"
}
```

**Error Response (422):**

```json
{
    "message": "The name has already been taken.",
    "errors": {
        "name": ["The name has already been taken."]
    }
}
```

#### PUT / PATCH — Update status

```
PUT /api/statuses/{id}
PATCH /api/statuses/{id}
```

| Parameter | Required | Rule                              |
| --------- | -------- | --------------------------------- |
| `name`    | Sometimes| String, max 255, unique in statuses |
| `desc`    | No       | String                            |

**Response (200):**

```json
{
    "id": 1,
    "name": "Updated Status",
    "desc": "Updated description",
    "created_at": "2026-09-10T10:00:00.000000Z",
    "updated_at": "2026-09-10T12:00:00.000000Z"
}
```

**Error Response (404):**

```json
{
    "message": "Status not found."
}
```

#### DELETE — Delete status

```
DELETE /api/statuses/{id}
```

**Response (200):**

```json
{
    "message": "Status deleted successfully."
}
```

**Error Response (404):**

```json
{
    "message": "Status not found."
}
```

---

### Priority

#### GET — Retrieve priorities

```
GET /api/priorities
GET /api/priorities/{id}
```

**Response (200):**

```json
[
    {
        "id": 1,
        "name": "High",
        "desc": "High priority",
        "created_at": "2026-09-10T10:00:00.000000Z",
        "updated_at": "2026-09-10T10:00:00.000000Z"
    }
]
```

**Error Response (404):**

```json
{
    "message": "Priority not found."
}
```

#### POST — Store priority

```
POST /api/priorities
```

| Parameter | Required | Rule                                |
| --------- | -------- | ----------------------------------- |
| `name`    | Yes      | String, max 255, unique in priorities |
| `desc`    | No       | String                              |

**Response (200):**

```json
{
    "id": 1,
    "name": "High",
    "desc": "High priority",
    "created_at": "2026-09-10T10:00:00.000000Z",
    "updated_at": "2026-09-10T10:00:00.000000Z"
}
```

**Error Response (422):**

```json
{
    "message": "The name has already been taken.",
    "errors": {
        "name": ["The name has already been taken."]
    }
}
```

#### PUT / PATCH — Update priority

```
PUT /api/priorities/{id}
PATCH /api/priorities/{id}
```

| Parameter | Required | Rule                                |
| --------- | -------- | ----------------------------------- |
| `name`    | Sometimes| String, max 255, unique in priorities |
| `desc`    | No       | String                              |

**Response (200):**

```json
{
    "id": 1,
    "name": "Updated Priority",
    "desc": "Updated description",
    "created_at": "2026-09-10T10:00:00.000000Z",
    "updated_at": "2026-09-10T12:00:00.000000Z"
}
```

**Error Response (404):**

```json
{
    "message": "Priority not found."
}
```

#### DELETE — Delete priority

```
DELETE /api/priorities/{id}
```

**Response (200):**

```json
{
    "message": "Priority deleted successfully."
}
```

**Error Response (404):**

```json
{
    "message": "Priority not found."
}
```

---

### Task

#### GET — Retrieve task(s)

Retrieves all tasks, or a single task when an `id` is provided.

```
GET /api/tasks
GET /api/tasks/{id}
```

**Response (200):**

```json
[
    {
        "id": 1,
        "status_id": 1,
        "priority_id": 2,
        "client_name": "John Doe",
        "project_name": "Project Alpha",
        "desc": "Project description",
        "start_date": "2026-09-10",
        "due_date": "2026-09-20",
        "status": "Pending",
        "priority": "High",
        "created_at": "2026-09-10T10:00:00.000000Z",
        "updated_at": "2026-09-10T10:00:00.000000Z"
    }
]
```

**Error Response (404):**

```json
{
    "message": "Task not found."
}
```

#### POST — Store task

```
POST /api/tasks
```

| Parameter      | Required | Rule                                        |
| -------------- | -------- | ------------------------------------------- |
| `status_id`    | Yes      | Integer, must exist in the Status object    |
| `priority_id`  | Yes      | Integer, must exist in the Priority object  |
| `client_name`  | Yes      | String, max 255                             |
| `project_name` | Yes      | String, max 255                             |
| `desc`         | No       | String                                      |
| `start_date`   | Yes      | Date                                        |
| `due_date`     | Yes      | Date, must be after or equal to `start_date`|

**Response (201):**

```json
{
    "id": 1,
    "status_id": 1,
    "priority_id": 2,
    "client_name": "John Doe",
    "project_name": "Project Alpha",
    "desc": "Project description",
    "start_date": "2026-09-10",
    "due_date": "2026-09-20",
    "status": "Pending",
    "priority": "High",
    "created_at": "2026-09-10T10:00:00.000000Z",
    "updated_at": "2026-09-10T10:00:00.000000Z"
}
```

**Error Response (422):**

```json
{
    "message": "The status id field is required.",
    "errors": {
        "status_id": ["The status id field is required."]
    }
}
```

#### PUT / PATCH — Update task

```
PUT /api/tasks/{id}
PATCH /api/tasks/{id}
```

| Parameter      | Required | Rule                                        |
| -------------- | -------- | ------------------------------------------- |
| `status_id`    | Sometimes| Integer, must exist in the Status object    |
| `priority_id`  | Sometimes| Integer, must exist in the Priority object  |
| `client_name`  | Sometimes| String, max 255                             |
| `project_name` | Sometimes| String, max 255                             |
| `desc`         | Sometimes| String                                      |
| `start_date`   | Sometimes| Date                                        |
| `due_date`     | Sometimes| Date, must be after or equal to `start_date`|

**Response (200):**

```json
{
    "id": 1,
    "status_id": 2,
    "priority_id": 1,
    "client_name": "John Doe",
    "project_name": "Project Alpha Updated",
    "desc": "Updated description",
    "start_date": "2026-09-10",
    "due_date": "2026-09-25",
    "status": "In Progress",
    "priority": "High",
    "created_at": "2026-09-10T10:00:00.000000Z",
    "updated_at": "2026-09-10T12:00:00.000000Z"
}
```

**Error Response (404):**

```json
{
    "message": "Task not found."
}
```

#### DELETE — Delete task

```
DELETE /api/tasks/{id}
```

**Response (200):**

```json
{
    "message": "Task deleted successfully."
}
```

**Error Response (404):**

```json
{
    "message": "Task not found."
}
```

---

## Error Responses

All endpoints may return the following errors:

**Validation Error (422):**

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "field": ["Error message for this field."]
    }
}
```

**Unauthenticated (401):**

```json
{
    "message": "Unauthenticated."
}
```

**Server Error (500):**

```json
{
    "message": "Something went wrong."
}
```
