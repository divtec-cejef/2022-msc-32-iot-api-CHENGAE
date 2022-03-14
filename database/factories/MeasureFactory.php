<?php
namespace Database\Factories;

use App\Models\Measure;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeasureFactory extends Factory {
    /**
     * Le nom du modèle correspondant.
     *
     * @var string
     */
    protected $model = Measure::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition() {
        return [
            'temperature' => $this->faker->randomFloat(1, 15, 30), // Nombre à virgule aléatoire entre 15 et 30
            'humidity' => (int) $this->faker->numberBetween(1, 100),             // Nombre aléatoire entre 1 et 100
            'time' => $this->faker->numberBetween(1640995200, 1646697600),       // Nombre aléatoire au format Epoch
            'id_device' => $this->faker->numberBetween(1, 5),                    // Nombre aléatoire
            'id_room' => $this->faker->numberBetween(1, 5),                      // Nombre aléatoire
        ];
    }
}
