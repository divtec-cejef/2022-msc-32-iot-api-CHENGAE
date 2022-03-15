<?php
namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory {
    /**
     * Le nom du modèle correspondant.
     * @var string
     */
    protected $model = Device::class;

    /**
     * Définir l'état par défaut du modèle.
     * @return array
     */
    public function definition() {
        return [
            'name' => $this->faker->word,         // Phrase avec texte aléatoire
            'identifier' => $this->faker->word,  // Phrase avec texte aléatoire
        ];
    }
}
