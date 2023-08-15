<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Определите состояние модели по умолчанию.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->word(),
            'income'=> $this->faker->randomNumber('3'),
            'date'=> $this->faker->dateTimeInInterval('-15 days', '+15 days'),
        ];
    }
    /**
     * Название модели, соответствующей фабрике.
     *
     * @var string
     */
    protected $model = Order::class;
}
