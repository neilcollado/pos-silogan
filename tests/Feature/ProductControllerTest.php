<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Products;
use App\Models\Category;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_create()
    {
        $productData = [
            'category_id' => 2,
            'ProdName' => 'Test Name',
            'ProdDescription' => 'We are discorvered save yourself.',
            'UnitPrice' => 56.22,
            'isAvailable' => 1
        ];
    
        $response = $this->post('/products', $productData);
    
        $response->assertStatus($response->status(), 200);
    }

    public function test_product_view(){
        $productData = [
            'category_id' => 2,
            'ProdName' => 'Test Name',
            'ProdDescription' => 'We are discorvered save yourself.',
            'UnitPrice' => 56.22,
            'isAvailable' => 1
        ];
    
        $response = $this->get('/products', $productData);
    
        $response->assertStatus($response->status(), 200);
    }

    public function test_product_update(){
        $category = Category::factory()->make();
        $product = Products::factory()->make([
            'category_id' => $category->id,
            'ProdName' => 'Test Name',
            'ProdDescription' => 'We are discorvered save yourself.',
            'UnitPrice' => 56.22,
            'isAvailable' => 1
        ]);
    
        $response = $this->put('/products', [
            'category_id' => $category->id,
            'ProdName' => 'Test Update',
            'ProdDescription' => 'We are discorvered do not save yourself.',
            'UnitPrice' => 99.22,
            'isAvailable' => 0
        ]);
    
        $response->assertStatus($response->status(), 200);
    }

    public function test_product_delete(){
        $product = Products::factory()->make();

        $response = $this->delete('products/' . $product->id);

        $response->assertStatus($response->status(), 200);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
