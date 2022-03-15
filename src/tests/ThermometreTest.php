<?php
use App\Models\Device;
use App\Models\Room;
use App\Models\Measure;
use Laravel\Lumen\Testing\DatabaseTransactions;


class ThermometreTest extends TestCase {

    //migre la bd lors de l'exécution des tests, puis annule la bd lorsque les tests sont terminés.
    use DatabaseTransactions;

    // Création de variables permettant d'effectuer les tests
    private $devices = "";
    private $rooms = "";
    private $measures = "";

    /**
     * Affectation des variables avec la factory
     * Cette méthode est lancée avant l'exécution des tests
     *
     * @return void
     */
    protected function setUp(): void {
        parent::setUp();

        $this->devices = Device::all();
        $this->rooms = Room::all();
        $this->measures = Measure::all();

        /*
        $this->devices = Device::factory()->count(5)->create();
        $this->rooms = Room::factory()->count(5)->create();
        $this->measures = Measure::factory()->count(50)->create();
        */
    }

    /**
     * Test de la Methode GET en récupérant toutes les devices
     *
     * @return void
     */
    public function testShowAllDevices() {
        $this->get('/api/devices');
        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant 1 device selon le 1er id récupéré
     *
     * @return void
     */
    public function testShowOneDevice() {
        $this->get('/api/devices/'.$this->devices[0]->id);
        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant toutes les mesures pour un device.
     *
     * @return void
     */
    public function testShowAllMeasuresPerDevice() {
        $this->get('api/devices/'.$this->devices[0]->id.'/measures');
        $this->assertResponseOk();//Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant toutes les mesures
     *
     * @return void
     */
    public function testShowAllMeasures() {
        $this->get('/api/measures');
        $this->assertResponseOk();//Affirme que la réponse a un code d'état 200:
    }

    /**
     * Test de la Methode GET en récupérant toutes les salles
     *
     * @return void
     */
    public function testShowAllRooms() {
        $this->get('/api/rooms');
        $this->assertResponseOk();//Affirme que la réponse a un code d'état 200:
    }


    public function testCreate() {
        $measure = Measure::factory()->make();

        $this->post('/api/devices/'.$this->devices[0]->identifier.'/measures',
            [
                'temperature' => $measure->temperature,
                'humidity' => $measure->humidity,
                'time' => $measure->time,
                'id_room' => $measure->id_room
            ]);

        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 201:
        $this->seeJsonContains(
            [
                'temperature' => $measure->temperature,
                'humidity' => $measure->humidity,
                'time' => $measure->time + 3600,
                'id_room' => $measure->id_room
            ]);

        $this->seeInDatabase('measures', [
            'temperature' => $measure->temperature,
            'humidity' => $measure->humidity,
            'time' => $measure->time + 3600,
            'id_room' => $measure->id_room
        ]);
    }

    public function testUpdate() {
        $measure = $this->measures[0];

        $newmeasure  = [
            'temperature' => $measure->temperature + 5,
            'humidity' => $measure->humidity + 2,
            'time' => $measure->time,
            'id_device' => $measure->id_device,
            'id_room' => $measure->id_room
        ];

        $this->put('/api/measures/'.$this->measures[0]->id, $newmeasure);

        $this->assertResponseOk(); //Affirme que la réponse a un code d'état 200:
        $this->seeJsonContains($newmeasure);
        $this->seeInDatabase('measures', $newmeasure);
    }

    public function testDelete() {
        $this->delete('/api/measures/'.$this->measures[0]->id);

        $this->assertResponseStatus(204);//Affirme que la réponse a un code d'état 204
        $this->notSeeInDatabase('measures', [
            'id' => $this->measures[0]->id
        ]);
    }


    public function testCreateFailRequired() {
        $measure = Device::factory()->make();
        $this->post('/api/devices/'.$this->devices[0]->id.'/measures',
            [
                // 'temperature' => $device->temperature,
                'humidity' => $measure->humidity,
                'time' => $measure->time,
                'id_device' => $measure->id_device,
                'id_room' => $measure->id_room
            ]);

        $this->assertResponseStatus(422); //Affirme que la réponse a un code d'état 422:
        $this->notSeeInDatabase('measures', [
            'id' =>  $measure->id
        ]);
    }

    public function testCreateFailDataType() {
        $measure = Device::factory()->make();
        $this->post('/api/devices/'.$this->devices[0]->id.'/measures',
            [
                'temperature' => $measure->temperature,
                'humidity' => $measure->humidity,
                'time' => $measure->humidity,
                'id_device' => $measure->id_device,
                'id_room' => $measure->id_room
            ]);

        $this->assertResponseStatus(422); //Affirme que la réponse a un code d'état 422:
        $this->notSeeInDatabase('measures', [
            'id' =>  $measure->id
        ]);
    }

    public function testNotFound() {
        $this->put('/api/measures/kk',
            [
                'temperature' => 50.0,
                'humidity' => 99,
                'time' => 1640995200,
                'id_device' => $this->devices[0]->id,
                'id_room' => 1
            ]);

        $this->assertResponseStatus(404); //Affirme que la réponse a un code d'état 404
        $this->seeJsonContains(['message' => 'Mesure inexistante']);
    }

}
