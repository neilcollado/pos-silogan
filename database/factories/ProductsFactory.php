<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = ['Porksilog', 'BurgerSteaksilog','Sardinesilog','Longsilog','Porksilog','Hotsilog','Chosilog','Sisigsilog','Tosilog','Hamsilog','Skinlesssilog','Bangsilog',
        'Chicken Skinsilog','Baconsilog','Burger steaksilog','Beefloafsilog','Spamsilog','Tempurasilog','Coca Cola','Plain Water','Royal','Sprite','Garlic Rice','Plain Rice','Pepsi','Apple Tea',
        'Hotdog','Tocino','Chicken Lumpia','Chicken Skin','Sardines','Bacon','Porkchop','Sisig','Chorizo'];

        // unique()->

        return [
            'category_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'ProdName' => $this->faker->randomElement($products),
            'UnitPrice' => $this->faker->numberBetween($min = 10, $max = 100),
            'ProdDescription' => $this->faker->text,
            'isAvailable' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}
