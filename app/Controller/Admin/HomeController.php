<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Repository\UserRepository;
use App\Repository\VehicleBrandRepository;
use App\Repository\VehicleCategoryRepository;
use App\Repository\VehicleRepository;

class HomeController extends AppController
{
    public function index()
    {
        $userRepo = new UserRepository();
        $vehicleRepo = new VehicleRepository();
        $vehicleCategoryRepo = new VehicleCategoryRepository();
        $vehicleBrandRepo = new VehicleBrandRepository();

        $userCount = $userRepo->count();
        $vehicleCount = $vehicleRepo->count();
        $vehicleCategoryCount = $vehicleCategoryRepo->count();
        $vehicleBrandCount = $vehicleBrandRepo->count();

        $this->render('admin', 'admin.home.index', [
            'page_name' => 'adminHomeIndex',
            'page_title' => 'Administration - Accueil',
            'userCount' => $userCount,
            'vehicleCount' => $vehicleCount,
            'vehicleCategoryCount' => $vehicleCategoryCount,
            'vehicleBrandCount' => $vehicleBrandCount
        ]);
    }
}
