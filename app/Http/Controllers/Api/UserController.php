<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/user",
     *      operationId="getUserList",
     *      tags={"users"},
     *      summary="ユーザー情報の一覧取得",
     *      description="ユーザー一覧を返却します。",
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="No Content",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=404,
     *          description="Not Found",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     * )
     */
    public function index()
    {
        return response()->json(User::all(), Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *      path="/api/user",
     *      operationId="createUser",
     *      tags={"users"},
     *      summary="ユーザー情報の登録",
     *      description="リクエストで受け取ったユーザー情報を登録し、ユーザーIDを返却します。",
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="userName",
     *                      type="string",
     *                      format="string",
     *                      example="Administrator",
     *                      description="ユーザー名",
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      format="string",
     *                      example="admin@example.com",
     *                      description="メールアドレス",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      type="string",
     *                      format="string",
     *                      example="password",
     *                      description="パスワード",
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     *       @OA\Response(
     *          response=500,
     *          description="Internal Server Error",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/User",
     *          ),
     *       ),
     * )
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'userName' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ];
        $validated = $request->validate($rules);

        User::create([
            'name' => $validated['userName'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user = User::where('email', $validated['email'])->first();

        return response()->json(['userId' => $user->id], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
