<?php

namespace Tests\Feature;

use App\Repositories\UrlRepository;
use Tests\TestCase;

class ShortUrlTest extends TestCase
{
    /**
     * @return void
     */
    public function test_call_without_params()
    {
        $response = $this->post('/api/v1/short-urls',
            [],
            $this->getAuth());

        $response->assertJsonFragment([
            "success" => false
        ]);

        $response->assertStatus(500);
    }

    /**
     * @return void
     */
    public function test_call_with_error_params()
    {
        $response = $this->post('/api/v1/short-urls',
            ["url" => "cualquiercosa"],
            $this->getAuth()
        );

        $response->assertJsonFragment([
            "success" => false
        ]);
        $response->assertStatus(500);
    }

    /**
     * @return void
     */
    public function test_call_correct_params()
    {
        $urlTest = 'https://tinyurl.com/ylx5uce';

        $this->mock(UrlRepository::class)
            ->shouldReceive('short')
            ->andReturn($urlTest);

        $response = $this->post('/api/v1/short-urls',
            ["url" => "https://google.es"],
            $this->getAuth()
        );

        $response->assertSimilarJson([
            "url" => $urlTest,
            "success" => true
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_call_correct_params_worng_auth()
    {
        $urlTest = 'https://tinyurl.com/ylx5uce';

        $this->mock(UrlRepository::class)
            ->shouldReceive('short')
            ->andReturn($urlTest);

        $response = $this->post('/api/v1/short-urls',
            ["url" => "https://google.es"],
            $this->getInvalidAuth()
        );

        $response->assertSimilarJson([
            "message" => "Error format token",
            "success" => false
        ]);

        $response->assertStatus(500);
    }

    /**
     * @return void
     */
    public function test_call_correct_params_without_auth()
    {
        $urlTest = 'https://tinyurl.com/ylx5uce';

        $this->mock(UrlRepository::class)
            ->shouldReceive('short')
            ->andReturn($urlTest);

        $response = $this->post('/api/v1/short-urls',
            ["url" => "https://google.es"]
        );

        $response->assertSimilarJson([
            "url" => $urlTest,
            "success" => true
        ]);

        $response->assertStatus(200);
    }
}
