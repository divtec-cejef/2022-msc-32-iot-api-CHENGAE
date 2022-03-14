<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model {

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Room inexistante";

    public $timestamps = false;
    use HasFactory;

    public function measure() {
        return $this->belongsTo(Measure::class);
    }

    /**
     * La table associée au modèle.
     * @var string
     */
    //protected $table = 'rooms';

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
            'name' => 'unique|required|string'
        ];
    }

    /**
     * Liste des attributs modifiables
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Liste des attributs cachés
     * Seront exclus dans les réponses
     * @var array
     */
    protected $hidden = [
    ];
}
