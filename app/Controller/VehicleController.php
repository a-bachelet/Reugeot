<?php

namespace App\Controller;

use App\Helper\FlashMessageHelper;
use App\Model\Vehicle;
use App\Repository\VehicleRepository;

class VehicleController extends AppController
{
    public function index()
    {
        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle[] $vehicles **/
        $vehicles = $vehicleRepo->findAll();

        $this->render('default', 'vehicle.index', [
            'page_name' => 'vehiclesIndex',
            'page_title' => 'Reugeot - Liste des véhicules',
            'vehicles' => $vehicles
        ]);
    }

    public function details($id)
    {
        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle $vehicle **/
        $vehicle = $vehicleRepo->find($id);

        if (is_null($vehicle->getId())) {
            RedirectController::redirect('err404');
        }

        $this->render('default', 'vehicle.details', [
            'page_name' => 'vehiclesDetails',
            'page_title' => 'Reugeot - Détail du véhicule : ' . $vehicle->getModel(),
            'vehicle' => $vehicle
        ]);
    }
}
