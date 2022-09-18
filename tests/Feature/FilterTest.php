<?php

namespace Tests\Feature;

use App\Domain\Product\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_filter_city_one()
    {
        $city = Product::pluck('city')->first();
        $response = $this->get('/', [
                'city' => $city,
            ]
        );

        $response->assertStatus(200);
    }

    public function test_filter_city_more_that_one()
    {
        $countCity = Product::pluck('city')->count();
        $city = Product::limit($countCity - rand(1,  $countCity))->pluck('city');
        $response = $this->get('/', [
                'city' => $city,
            ]
        );

        $response->assertStatus(200);
    }

    public function test_filter_category()
    {

        $category = Product::pluck('category')->first();
        $response = $this->get('/', [
                'category' => $category,
            ]
        );

        $response->assertStatus(200);
    }

    public function test_filter_category_and_city()
    {
        $category = Product::pluck('category')->first();
        $city = Product::pluck('city')->first();
        $response = $this->get('/', [
                'category' => $category,
                'city' => $city,
            ]
        );

        $response->assertStatus(200);
    }
}
