<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class VehicleController extends AppController
{
    public function index()
    {
        $this->render('admin', 'admin.vehicle.index', [
            'page_name' => 'adminVehicleIndex',
            'page_title' => 'Administration - Véhicules'
        ]);
    }

    public function details($id)
    {
        $this->render('admin', 'admin.vehicle.details', [
            'page_name' => 'adminVehicleDetails',
            'page_title' => 'Administration - Véhicules'
        ]);
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
