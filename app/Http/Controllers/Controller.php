<?php

namespace App\Http\Controllers;

use App\Models\LogError;
use Illuminate\Http\JsonResponse;
use Throwable;

abstract class Controller
{
    protected function success(mixed $data, int $status = 200): JsonResponse
    {
        return response()->json($data, $status);
    }

    protected function notFound(string $message, string $model, ?int $model_id, string $event): JsonResponse
    {
        $this->logError($model, $model_id, $event, $message);

        return response()->json(['message' => $message], 404);
    }

    protected function serverError(Throwable $e, string $model, ?int $model_id, string $event): JsonResponse
    {
        $message = 'Something went wrong.';

        $this->logError($model, $model_id, $event, $message . ': ' . $e->getMessage());

        return response()->json(['message' => $message], 500);
    }

    private function logError(string $model, ?int $model_id, string $event, string $description): void
    {
        try {
            LogError::create([
                'model' => $model,
                'model_id' => $model_id,
                'event' => $event,
                'desc' => $description,
            ]);
        } catch (Throwable) {
        }
    }
}
