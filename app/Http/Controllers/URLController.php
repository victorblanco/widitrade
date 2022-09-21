<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UrlRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 *
 */
class URLController extends Controller
{

    /**
     * @var UrlRepository
     */
    protected $urlRespository;

    /**
     * @param UrlRepository $urlRepository
     */
    public function __construct(UrlRepository $urlRepository)
    {
        $this->urlRespository = $urlRepository;
    }

    /**
     * Method invoke
     * @return Response
     */
    public function short(Request $request): JsonResponse
    {
        return response()->json(
            [
                "url" => $this->urlRespository->short($request->input('url')),
                "success" => true
            ]
        );
    }
}
