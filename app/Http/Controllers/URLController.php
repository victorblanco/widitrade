<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Repositories\UrlRepository;
use Illuminate\Http\JsonResponse;
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
     * Short url with URLRespository
     * @return Response
     */
    public function short(UrlRequest $request): JsonResponse
    {

        return response()->json(
            [
                "url" => $this->urlRespository->short($request->input('url')),
                "success" => true
            ]
        );
    }
}
