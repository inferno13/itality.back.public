<?php

namespace App\Http\Middleware;

use App\Models\Rule;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRules
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'Вы не авторизованны.']);
        }

        if (auth()->user()->id == 1) {

            return $next($request);
        }

        $path = explode('/', $request->path());


        if(count($path) > 1)
        {
            $module = ucfirst($path[1]);
        }

        if(count($path) > 2)
        {
            $controller = ucfirst($path[2]) . 'Controller';
        }

        $rules = Rule::where('group_id', auth()->user()->group_id)
            ->get();

        foreach ($rules as $rule) {

            if (trim($rule->module) == $module && trim($rule->controller) == $controller) {

                return $next($request);
            }

        }

        if ($module == 'Me' OR $module == 'Logout') {

            return $next($request);
        }


        return response()->json(['message' => 'У Вас нет прав доступа к данному разделу. Обратитесь к администратору сайта.']);
    }
}
