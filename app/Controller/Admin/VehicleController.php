<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\RedirectController;
use App\Helper\FlashMessageHelper;
use App\Model\Vehicle;
use App\Repository\VehicleRepository;

class VehicleController extends AppController
{
    public function index()
    {
        $vehicleRepo = new VehicleRepository();
        $vehicleCount = $vehicleRepo->count();
        $vehicleByPage = 5;
        $pageCount = ceil($vehicleCount/$vehicleByPage);
        $viewedPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if ($viewedPage < 1 || $viewedPage > $pageCount) {
            $viewedPage = 1;
        }
        $offset = ($viewedPage - 1) * $vehicleByPage;
        $limit = $vehicleByPage;
        /** @var Vehicle[] $vehicles **/
        $vehicles = $vehicleRepo->findBetween($offset, $limit, 'DESC');

        $this->render('admin', 'admin.vehicle.index', [
            'page_name' => 'adminVehicleIndex',
            'page_title' => 'Administration - Véhicules',
            'vehicles' => $vehicles,
            'viewedPage' => intval($viewedPage),
            'pageCount' => intval($pageCount)
        ]);
    }

    public function details($id)
    {
        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle $vehicle **/
        $vehicle = $vehicleRepo->find($id);
        if (is_null($vehicle->getId())) {
            FlashMessageHelper::add('danger', 'Ce véhicule n\'existe pas.');
            RedirectController::redirect('adminVehicle');
        } else {
            $this->render('admin', 'admin.vehicle.details', [
                'page_name' => 'adminVehicleDetails',
                'page_title' => 'Administration - Véhicules',
                'vehicle' => $vehicle
            ]);
        }
    }

    public function addGet()
    {
        $this->render('admin', 'admin.vehicle.add', [
            'page_name' => 'adminVehicleAdd',
            'page_title' => 'Administration - Véhicules'
        ]);
    }

    public function addPost()
    {

    }

    public function editGet($id)
    {
        $this->render('admin', 'admin.vehicle.edit', [
            'page_name' => 'adminVehicleEdit',
            'page_title' => 'Administration - Véhicules'
        ]);
    }

    public function editPost($id)
    {

    }

    public function delete($id)
    {

    }
}
