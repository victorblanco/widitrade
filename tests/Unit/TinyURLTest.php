<?php
namespace Tests\Unit;

use App\Repositories\TinyURLRepository;
use GuzzleHttp\Exception\RequestException;
use Tests\TestCase;

class TinyURLTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_call_tinyurl_repository_return_url()
    {
        /**
         * @var TinyURLRepository
         */
        $urlRepository = app(TinyURLRepository::class);

        $str = $urlRepository->short('https://google.es');
        $this->assertStringContainsString('tinyurl.com', $str);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_call_tinyurl_repository_without_params()
    {
        $this->expectException(RequestException::class);
        /**
         * @var TinyURLRepository
         */
        $urlRepository = app(TinyURLRepository::class);
        $urlRepository->short('');
    }
}
