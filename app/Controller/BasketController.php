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

        $total_quantity = 0;
        $total_bill_ht = 0;
        $total_bill_ttc = 0;

        foreach ($_SESSION['panier'] as $category) {
            foreach ($category as $product) {
                $total_quantity += $product['quantity'];
                $total_bill_ht += $product['product']->getPriceWithoutTaxes();
                $total_bill_ttc += $product['product']->getPriceWithTaxes();
            }
        }

        $this->render('default', 'basket.index', [
            'page_name' => 'basketIndex',
            'page_title' => 'Reugeot - Panier',
            'panier' => $_SESSION['panier'],
            'total_quantity' => $total_quantity,
            'total_bill_ht' => $total_bill_ht,
            'total_bill_ttc' => $total_bill_ttc
        ]);
    }

    public function addVehicle()
    {
        IsAuthenticatedHelper::verifyAuth();

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        if (!isset($_POST['id']) || !isset($_POST['quantity'])) {
            FlashMessageHelper::add('danger', 'L\'ajout de véhicules dans le panier a échoué.');
            RedirectController::redirect('vehicles');
        }

        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle $vehicle **/
        $vehicle = $vehicleRepo->find($_POST['id']);

        if (is_null($vehicle->getId()) || !$vehicle->isActive()) {
            FlashMessageHelper::add('danger', 'Ce véhicule n\'existe plus ou n\'est pas disponible');
            RedirectController::redirect('vehicles');
        }

        if (!isset($_SESSION['panier']['vehicules'][$vehicle->getId()])) {
            $_SESSION['panier']['vehicules'][$vehicle->getId()] = [
                'product' => $vehicle,
                'quantity' => $_POST['quantity']
            ];
        } else {
            $quantity = $_SESSION['panier']['vehicules'][$vehicle->getId()]['quantity'];
            $_SESSION['panier']['vehicules'][$vehicle->getId()]['quantity'] = $quantity + $_POST['quantity'];
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
