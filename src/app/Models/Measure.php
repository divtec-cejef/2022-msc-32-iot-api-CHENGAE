<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model {

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Mesure inexistante";

    public $timestamps = false;
    use HasFactory;

    public function device() {
        return $this->hasOne(Device::class, 'id', 'id_device');
    }

    public function room() {
        return $this->hasOne(Room::class, 'id', 'id_room');
    }

    /**
     * La table associée au modèle.
     * @var string
     */
    //protected $table = 'measures';

    /**
     * La clé primaire associée à la table.
     * @var string
     */
    //protected $primaryKey = 'id';

    /**
     * Validation des données
     * @return array[] qui contient
     */
    static function validateRules() {
        return [
            'temperature' => 'required|numeric',
            'humidity' => 'required|integer',
            'time' => 'required|integer',
            'id_device' => 'integer',
            'id_room' => 'integer'
        ];
    }

    /**
     * Liste des attributs modifiables
     * @var array
     */
    protected $fillable = [
        'temperature',
        'humidity',
        'time',
        'id_device',
        'id_room'
    ];
}
