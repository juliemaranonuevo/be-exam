<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->randomElement([
            'Asus Laptop',
            'Adidas Shoes',
            'Nokia 5510',
            'Lambo 525',
            'Ferrari K005',
            'Tribal',
            'Bear Brand',
            'Cake',
            'Cookies',
            '7-up',
            'Chocolate Milk',
            'Plain Milk',
            'Maru White Bread',
            'Crop Top',
            'Lace Skirt',
            'Juniors Chambray Hirt',
            'Designer T-shirts',
            'Crochet Lace',
            'Argentina Corned Beef',
            'Cellphone'
        ]);

        $category = $this->faker->randomElement([
            'Electronic',
            'Car',
            'T-Shirt',
            'Tops & Tees',
            'dairy',
            'Bread',
            'Beverage',
            'Can Goods'
        ]);

        return [
            'name' => $name,
            'category' => $category,
            'description' => $this->faker->text,
            'date_time' => $this->faker->dateTime()
        ];
    }
}
