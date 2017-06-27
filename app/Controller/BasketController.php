<?php

namespace App\Controller;

use App\Helper\FlashMessageHelper;
use App\Helper\IsAuthenticatedHelper;
use App\Model\Vehicle;
use App\Repository\VehicleRepository;

class BasketController extends AppController
{
    public function index()
    {
        IsAuthenticatedHelper::verifyAuth();

        $this->render('default', 'basket.index', [
            'page_name' => 'basketIndex',
            'page_title' => 'Reugeot - Panier',
            'panier' => $_SESSION['panier']
        ]);
    }

    public function addVehicle($id, $quantity)
    {
        IsAuthenticatedHelper::verifyAuth();

        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle $vehicle **/
        $vehicle = $vehicleRepo->find($id);

        if (is_null($vehicle->getId()) || !$vehicle->isActive()) {
            FlashMessageHelper::add('danger', 'Ce véhicule n\'existe plus ou n\'est pas disponible');
            RedirectController::redirect('vehicles');
        }

        if (!isset($_SESSION['panier']['vehicules'][$vehicle->getId()])) {
            $_SESSION['panier']['vehicules'][$vehicle->getId()] = [
                'product' => $vehicle,
                'quantity' => $quantity
            ];
        } else {
            $_SESSION['panier']['vehicules'][$vehicle->getId()]['quantity'] += $quantity;
        }

        FlashMessageHelper::add('success', 'Le / les produits ont été ajoutés au panier.');
        RedirectController::redirect('vehicles');
    }

    public function removeVehicle($id, $quantity) {
        if (isset($_SESSION['panier']['vehicules'][$id])) {
            $_SESSION['panier']['vehicules'][$id]['quantity'] -= $quantity;
            if ($_SESSION['panier']['vehicules'][$id]['quantity'] <= 0) {
                unset ($_SESSION['panier']['vehicules'][$id]);
            }
        }
        FlashMessageHelper::add('success', 'Le / Les produits ont été correctement retirés du panier.');
        RedirectController::redirect('vehicules');
    }

    public function validate()
    {

    }
}
