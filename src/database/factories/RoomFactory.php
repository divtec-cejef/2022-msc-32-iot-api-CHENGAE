<?php
namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory {
    /**
     * Le nom du modèle correspondant.
     * @var string
     */
    protected $model = Room::class;

    /**
     * Définir l'état par défaut du modèle.
     * @return array
     */
    public function definition() {
        return [
            'name' => $this->faker->word  // Phrase avec texte aléatoire
        ];
    }
}
