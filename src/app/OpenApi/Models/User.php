<?php

namespace App\OpenApi\Models;

/**
 * @OA\Schema(
 *      title="User"
 * )
 */
class User
{
    /**
     * @OA\Property(
     *      title="userId",
     *      description="ユーザーID",
     *      format="int",
     *      example="1",
     * )
     * 
     * @var int
     */
    private int $id;

    /**
     * @OA\Property(
     *      title="userName",
     *      description="ユーザー名",
     *      format="string",
     *      example="Administrator",
     * )
     * 
     * @var string
     */
    private string $userName;

    /**
     * @OA\Property(
     *      title="email",
     *      description="メールアドレス",
     *      format="string",
     *      example="admin@example.com",
     * )
     * 
     * @var string
     */
    private string $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="パスワード",
     *      format="string",
     *      example="password",
     * )
     * 
     * @var string
     */
    private string $password;
}