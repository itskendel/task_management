# Task Management

## Instruction

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

## API

> **Note:** `APP_URL` comes from the `.env` file (`APP_URL = ENV APP_URL`). If you are using a different `APP_URL`, use that instead.

### Available Objects

- Status
- Priority
- Task

### Task Endpoints

#### GET — Retrieve task(s)

Retrieves all tasks, or a single task when an `id` is provided.

- `id` — optional

Examples:

```
APP_URL/api/tasks/1
APP_URL/api/tasks
```

#### POST — Store task

Creates a new task.

Endpoint:

```
APP_URL/api/tasks
```

Parameters:

| Parameter       | Rule                                                    |
| --------------- | ------------------------------------------------------- |
| `status_id`     | required, must exist in the Status object               |
| `priority_id`   | required, must exist in the Priority object             |
| `client_name`   | required, string                                        |
| `project_name`  | required, string                                        |
| `desc`          | nullable, longText                                      |
| `start_date`    | required, date                                          |
| `due_date`      | required, date, must be after or equal to `start_date`  |

#### PUT / PATCH — Update task

Updates an existing task.

Endpoint:

```
APP_URL/api/tasks/1
```

Parameters:

| Parameter       | Rule                                                    |
| --------------- | ------------------------------------------------------- |
| `status_id`     | required, must exist in the Status object              |
| `priority_id`   | required, must exist in the Priority object             |
| `client_name`   | required, string                                        |
| `project_name`  | required, string                                        |
| `desc`          | nullable, longText                                      |
| `start_date`    | required, date                                          |
| `due_date`      | required, date, must be after or equal to `start_date`  |

#### DELETE — Delete task

Deletes an existing task.

Endpoint:

```
APP_URL/api/tasks/1
```
