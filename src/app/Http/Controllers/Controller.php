<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * API情報
 * @OA\Info(
 *     version="1.0.0",
 *     title="laravel-swagger",
 *     description="Swagger UIを使用したAPIテスト"
 * )
 *
 * サーバー情報
 * @OA\Server(
 *   description="Laravel host",
 *   url="http://localhost:8000",
 * )
 *
 * セキュリティスキーマ
 * @OA\SecurityScheme(
 *   securityScheme="BearerAuth",
 *   type="apiKey",
 *   in="header",
 *   name="api_token"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
