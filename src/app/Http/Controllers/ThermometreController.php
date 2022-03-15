<?php
namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Measure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ThermometreController extends Controller {
    /**
     * Affiche tous les devices
     *
     * @response 200
     *
     * @return JsonResponse
     */
    public function showAllDevices() {
        return Device::orderBy('name', 'ASC')->get();
    }

    /**
     * Affiche un device selon son id
     *
     * @response 200
     *
     * @param int $id
     * @return JsonResponse
     */
    public function showOneDevice($id) {
        return Device::findOrFail($id);
    }

    /**
     * Affiche toutes les mesures d'un device selon son id
     *
     * @response 200
     *
     * @return JsonResponse
     */
    public function showAllMeasuresPerDevice($id) {
        return Measure::where('id_device', '=', $id)->get();
    }

    /**
     * Affiche toutes les mesures
     *
     * @response 200
     *
     * @return JsonResponse
     */
    public function showAllMeasures() {
        //return Measure::orderBy('time', 'DESC')->get();
        return Measure::orderBy('time', 'DESC')->with('room', 'device')->get();
    }

    /**
     * Valide la saisie des données dans la requête
     * Ajoute une une tache
     *
     * @response 201
     *
     * @return JsonResponse
     */
    public function create($identifier, Request $request) {
        $this->validate($request, Measure::validateRules());

        //Récupère l'ID d'un device en fonction de son Identifier Sigfox.
        $idDevice = Device::where('identifier', '=', $identifier)->get()->first()->id;

        //Récupère le nouvel enregistrement.
        $data = $request->all();

        //Ajoute l'ID du device dans le nouvel enregistrement.
        $data['id_device'] = (int)$idDevice;

        //Récupère l'heure et y ajoute 1h (décalage horaire Sigfox).
        $time = $data['time'];
        $time += 3600;
        $data['time'] = (int)$time;

        return Measure::create($data);
    }

    /**
     * Valide la saisie des données dans la requête
     * Met à jour une tache
     *
     * @response 200
     *
     * @return JsonResponse
     */

    public function update($idDevice, $idMeasure, Request $request) {
        $this->validate($request, Measure::validateRules());
        Measure::findOrFail($idMeasure)->where('id_device', '=', $idDevice)->update($request->all());
        return Measure::findOrFail($idMeasure);
    }

    /**
     * Supprime une tache
     *
     * @response 204
     *
     * @return JsonResponse
     */
    public function delete($idDevice, $idMeasure) {
        Measure::findOrFail($idMeasure)->where('id_device', '=', $idDevice)->delete();
        return response('', 204);
    }

    /**
     * Valide la saisie des données dans la requête
     * Change l'état d'une tache à terminé
     *
     * @response 200
     *
     * @return JsonResponse
     */
    public function completed($id) {
        $task = Measure::findOrFail($id);
        $task->complet = 1;
        $task->update();
        return Measure::findOrFail($id);
    }

}
