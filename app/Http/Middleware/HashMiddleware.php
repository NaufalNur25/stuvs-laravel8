<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class HashMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');

        if ($id) {
            $decryptedId = $this->decryptId($id);

            if (!$decryptedId) {
                return redirect('/siswa');
            }

            $request->route()->setParameter('id', $decryptedId);
        }

        return $next($request);
    }

    protected function decryptId($id)
    {
        try {
            return (int) decrypt($id);
        } catch (DecryptException $e) {
            return false;
        }
    }
}
