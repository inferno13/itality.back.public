<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rule;

/**
 * @OA\Post(
 *   path="/api/login",
 *   summary="Вход",
 *   tags={"Authorization"},
 *
 *   @OA\RequestBody(
 *       @OA\JsonContent(
 *           allOf={
 *              @OA\Schema(
 *                  @OA\Property(property="phone", type="string", example="+79181801818"),
 *                  @OA\Property(property="password", type="string", example="ldsfwsklsdiopj"),
 * )
 *   }
 * )
 *   ),
 *   @OA\Response(
 *   response=200,
 *   description="OK",
 *   @OA\JsonContent(
 *         @OA\Property(property="group", type="array", @OA\Items(
 *        @OA\Property(property="error", type="string", example="Неправильный номер телефона или пароль."),
 *        @OA\Property(property="access_token", type="text", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzIyMDU3MDU3LCJleHAiOjE3MjIwNjA2NTcsIm5iZiI6MTcyMjA1NzA1NywianRpIjoiVlZNOTN3TnlWaTlSVzNseSIsInN1YiI6IjY0IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.MaHANQLMHAwk-nKRXnFlHwNVyI0i0wO-LjNXkloXIog"),
 *        @OA\Property(property="token_type", type="string", example="bearer"),
 *        @OA\Property(property="expires_in", type="integer", example=259200000),
 *   )
 * )
 * )
 * )
 * ),
 * @OA\Post(
 *   path="/api/me",
 *   summary="Информация о пльзователе",
 *   tags={"Authorization"},
 *   @OA\RequestBody(
 *       @OA\JsonContent(
 *           allOf={
 *              @OA\Schema(
 *                  @OA\Property(property="access_token", type="text", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzIyMDU3MDU3LCJleHAiOjE3MjIwNjA2NTcsIm5iZiI6MTcyMjA1NzA1NywianRpIjoiVlZNOTN3TnlWaTlSVzNseSIsInN1YiI6IjY0IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.MaHANQLMHAwk-nKRXnFlHwNVyI0i0wO-LjNXkloXIog"),
 * )
 *   }
 * )
 *   ),
 *   @OA\Response(
 *   response=200,
 *   description="OK не обращать внимание на [] такие скобки в ответе.",
 *   @OA\JsonContent(
 *        @OA\Property(property="group", type="array", @OA\Items(
 *        @OA\Property(property="id", type="integer", example="11"),
 *        @OA\Property(property="name", type="string", example="Jack"),
 *        @OA\Property(property="role", type="string", example="superadmin"),
 *        @OA\Property(property="phone", type="string", example="8918181818"),
 *        @OA\Property(property="email", type="email", example="davo@gmail.com"),
 *        @OA\Property(property="email_verified_at", type="string", example=null),
 *        @OA\Property(property="created_at", type="date", example="2024-08-12T17:41:58.000000Z"),
 *        @OA\Property(property="updated_at", type="date", example="2024-08-13T17:39:32.000000Z"),
 *        @OA\Property(property="group_id", type="integer", example=1),
 *        @OA\Property(property="rules", type="array", @OA\Items(
 *   @OA\Property(property="Group", type="array", @OA\Items(
 *                   @OA\Property(property="DeleteController", type="boolean", example=true),
 *                   @OA\Property(property="ListController", type="boolean", example=false),
 *                   @OA\Property(property="ShowController", type="boolean", example=true),
 *                   @OA\Property(property="StoreController", type="boolean", example=false),
 *                   @OA\Property(property="UpdateController", type="boolean", example=true),
 *   ),),
 *       @OA\Property(property="Order", type="array", @OA\Items(
 *                   @OA\Property(property="DeleteController", type="boolean", example=true),
 *                   @OA\Property(property="ListController", type="boolean", example=false),
 *                   @OA\Property(property="ShowController", type="boolean", example=true),
 *                   @OA\Property(property="StoreController", type="boolean", example=false),
 *                   @OA\Property(property="UpdateController", type="boolean", example=true),
 *   ),),
 *           @OA\Property(property="User", type="array", @OA\Items(
 *                   @OA\Property(property="DeleteController", type="boolean", example=true),
 *                   @OA\Property(property="ListController", type="boolean", example=false),
 *                   @OA\Property(property="ShowController", type="boolean", example=true),
 *                   @OA\Property(property="StoreController", type="boolean", example=false),
 *                   @OA\Property(property="UpdateController", type="boolean", example=true),
 *   ),),
 *
 *
 *   ),),
 *   ),),
 * ),
 * ),
 * ),
 *
 * @OA\Post(
 *   path="/api/logout",
 *   summary="Выход",
 *   tags={"Authorization"},
 *
 *   @OA\RequestBody(
 *       @OA\JsonContent(
 *           allOf={
 *              @OA\Schema(
 *                  @OA\Property(property="access_token", type="text", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzIyMDU3MDU3LCJleHAiOjE3MjIwNjA2NTcsIm5iZiI6MTcyMjA1NzA1NywianRpIjoiVlZNOTN3TnlWaTlSVzNseSIsInN1YiI6IjY0IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.MaHANQLMHAwk-nKRXnFlHwNVyI0i0wO-LjNXkloXIog"),
 * )
 *   }
 * )
 *   ),
 *   @OA\Response(
 *   response=200,
 *   description="OK",
 *   @OA\JsonContent(
 *         @OA\Property(property="group", type="array", @OA\Items(
 *        @OA\Property(property="message", type="string", example="Успешный выход из системы."),
 *   )
 * )
 * )
 * )
 * ),
 */
class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */

  public function __invoke()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  /**
   * Get a JWT via given credentials.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login()
  {
    $credentials = request(['phone', 'password']);

    if (! $token = auth()->attempt($credentials)) {
      return response()->json(['error' => 'Неправильный номер телефона или пароль.'], 401);
    }

    return $this->respondWithToken($token);
  }

  /**
   * Get the authenticated User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function me()
  {
    $group_id = auth()->user()->group_id;

    if(env('APP_ENV') == 'local')
    {
      $dir = __DIR__ . '\\';
    }
    else
    {
      $dir = __DIR__ . '/';
    }

    foreach (scandir($dir) as $folder) {

      if (!str_contains($folder, ".")) {

        foreach (scandir($dir . $folder) as $file) {

          if ($file != '.' and $file != '..') {

            // $folder = $folder;
            $controller = str_replace('.php', '', $file);
            $rules = Rule::where('group_id', $group_id)
              ->where('module', $folder)
              ->where('controller', $controller)
              ->get('active')
              ->first();

            if((isset($rules['active']) AND ($rules['active'] == true OR $rules['active'] == 1) OR auth()->user()->id === 1))
            {
              $mas[$folder][$controller] = true;
            }
            else
            {
              $mas[$folder][$controller] = false;
            }
          }
        }
      }
    }

    auth()->user()->rules = $mas;

    return response()->json(auth()->user());
  }

  /**
   * Log the user out (Invalidate the token).
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout()
  {
    auth()->logout();

    return response()->json(['message' => 'Успешный выход из системы']);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    return $this->respondWithToken(auth()->refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL()
    ]);
  }
}

