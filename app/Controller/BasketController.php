<?php

namespace App\Controller;

use App\Database\AppDatabase;
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
                $total_bill_ht += $product['product']->getPriceWithoutTaxes() * $product['quantity'];
                $total_bill_ttc += $product['product']->getPriceWithTaxes() * $product['quantity'];
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

        if ($_SESSION['auth']['role'] === 'ROLE_USER' && $vehicle->isProfessional()) {
            FlashMessageHelper::add('danger', 'Vous n\'êtes pas autorisé à commander ce type de véhicule');
            RedirectController::redirect('vehicles');
        }

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

    public function removeVehicle() {

        IsAuthenticatedHelper::verifyAuth();

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        if (isset($_SESSION['panier']['vehicules'][$id])) {
            $_SESSION['panier']['vehicules'][$id]['quantity'] -= $quantity;
            if ($_SESSION['panier']['vehicules'][$id]['quantity'] <= 0) {
                unset ($_SESSION['panier']['vehicules'][$id]);
            }
        }
        FlashMessageHelper::add('success', 'Le / Les produits ont été correctement retirés du panier.');
        RedirectController::redirect('vehicles');
    }

    public function empty()
    {
        unset($_SESSION['panier']);
        $_SESSION['panier'] = [];
        FlashMessageHelper::add('success', 'Votre panier a correctement été vidé.');
        RedirectController::redirect('home');
    }

    public function validate()
    {
        IsAuthenticatedHelper::verifyAuth();

        try {
            $date = new \DateTime();
            $query = 'INSERT INTO bills (reference, user_id, date) VALUES (:reference, :user_id, now())';
            $db = AppDatabase::getInstance();
            $db->query($query, false, [
                'reference' => uniqid('wsdafretyuio', true),
                'user_id' => $_SESSION['auth']['id']
            ]);

            $billId = $db->getLastInsertedId();

            $tab = [];

            foreach ($_SESSION['panier']['vehicules'] as $k => $v) {
                $tab[$k] = intval($v['quantity']);
            }

            $query = 'INSERT INTO bill_vehicle (bill_id, vehicle_id, quantity) VALUES (:bill_id, :vehicle_id, :quantity)';

            foreach ($tab as $k => $v) {
                $db->query($query, false, [
                    'bill_id' => $billId,
                    'vehicle_id' => $k,
                    'quantity' => $v
                ]);
            }

            unset($_SESSION['panier']);
            $_SESSION['panier'] = [];

            FlashMessageHelper::add('success', 'Votre achat a bien été effectué.');
            FlashMessageHelper::add('success', 'Une nouvelle facture est disponible dans la section Mon Compte.');
            RedirectController::redirect('home');

        } catch(\PDOException $e) {
            FlashMessageHelper::add('danger', 'Une erreur s\'est produite.');
            RedirectController::redirect('home');
        }
    }
}
