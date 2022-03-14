<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model {

    //affiche ce message lors d'une erreur 404
    public $modelNotFoundMessage = "Device inexistant";

    public $timestamps = false;
    use HasFactory;

    public function measure() {
        return $this->belongsTo(Measure::class, 'id_device', 'id');
    }

    /**
     * La table associée au modèle.
     * @var string
     */
    //protected $table = 'devices';

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
            'name' => 'unique|required|string',
            'identifiant' => 'unique|required|string'
        ];
    }

    /**
     * Liste des attributs modifiables
     * @var array
     */
    protected $fillable = [
        'name',
        'identifiant'
    ];

    /**
     * Liste des attributs cachés
     * Seront exclus dans les réponses
     *
     * @var array
     */
    protected $hidden = [
    ];
}
