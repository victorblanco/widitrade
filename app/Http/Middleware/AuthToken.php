<?php

namespace App\Http\Middleware;

use App\Exceptions\TokenException;
use App\Token\TokenValidator;
use Closure;
use Illuminate\Http\Request;


class AuthToken
{
    /**
     * @var TokenValidator
     */
    protected TokenValidator $tokenValidator;

    /**
     * @param TokenValidator $tokenValidator
     */
    public function __construct(TokenValidator $tokenValidator)
    {
        $this->tokenValidator = $tokenValidator;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws \App\Exceptions\TokenException
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        if($token) {
            $this->tokenValidator->validate($token);
            return $next($request);
        }

        throw new TokenException('Error format token');
    }
}
