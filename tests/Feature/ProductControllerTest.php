<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Products;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_create()
    {
        $productData = [
            'category_id' => 2,
            'ProdName' => 'Laravel T-Shirt',
            'ProdDescription' => 'We are discorvered save yourself.',
            'UnitPrice' => 56.22,
            'isAvailable' => 1
        ];
    
        $response = $this->post('/products', $productData);
    
        $response->assertStatus($response->status(), 200);
    }
}
