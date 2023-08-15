<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
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
            'date'=> $this->faker->dateTimeInInterval('now', '+30 days'),
        ];
    }
    /**
     * Название модели, соответствующей фабрике.
     *
     * @var string
     */
    protected $model = Stock::class;
}
