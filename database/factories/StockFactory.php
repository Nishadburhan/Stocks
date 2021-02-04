<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku'=> $this->faker->hexcolor,
            'office'=> $this->faker->randomDigit,
            'das'=> $this->faker->randomDigit,
            'zero_one'=> $this->faker->randomDigit,
            'zero_two'=> $this->faker->randomDigit,
            'techmate'=> $this->faker->randomDigit,
            'totalStock'=> $this->faker->randomDigit,
            'otherSalesRate'=> $this->faker->randomDigit,
            'PurchaseRate'=> $this->faker->randomDigit,
        ];
    }
}