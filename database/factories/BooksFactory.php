<?php
// database/factories/BookFactory.php
namespace Database\Factories;

use App\Models\Books;
use App\Models\Authors;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    protected $model = Books::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'author_id' => Authors::factory(),
            'publish_date' => $this->faker->date(),
            'description' => $this->faker->paragraph(),
        ];
    }
}