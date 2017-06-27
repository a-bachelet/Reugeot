<?php

namespace App\Controller;

use App\Database\AppDatabase;
use App\Helper\FlashMessageHelper;
use App\Helper\IsAuthenticatedHelper;
use App\Model\Bill;
use App\Model\Vehicle;
use App\Repository\BillRepository;
use App\Repository\VehicleRepository;

class BillController extends AppController
{
    public function details($id)
    {
        IsAuthenticatedHelper::verifyAuth();

        $billRepo = new BillRepository();
        /** @var Bill $bill **/
        $bill = $billRepo->find($id);

        if (is_null($bill->getId()) || $_SESSION['auth']['id'] !== $bill->getUser()->getId()) {
            FlashMessageHelper::add('danger', 'Vous n\'êtes pas autorisé à visualiser le contenu de cette page.');
            RedirectController::redirect('home');
        }

        $query = 'SELECT * FROM bill_vehicle WHERE bill_id = :bill_id';
        $db = AppDatabase::getInstance();
        $links = $db->query($query, true, ['bill_id' => $bill->getId()]);

        $vehicleRepo = new VehicleRepository();
        $vehicleTab = [];

        foreach ($links as $link) {
            /** @var Vehicle $vehicle **/
            $vehicle = $vehicleRepo->find($link->vehicle_id);
            $vehicleTab[] = [
                'vehicle' => $vehicle,
                'quantity' => $link->quantity
            ];
        }

        $total_quantity = 0;
        $total_bill_ht = 0;
        $total_bill_ttc = 0;

        foreach ($vehicleTab as $vehicle) {
            $total_quantity += $vehicle['quantity'];
            $total_bill_ht += $vehicle['vehicle']->getPriceWithoutTaxes() * $vehicle['quantity'];
            $total_bill_ttc += $vehicle['vehicle']->getPriceWithTaxes() * $vehicle['quantity'];
        }

        $this->render('default', 'bill.details', [
            'page_name' => 'billDetails',
            'page_title' => 'Reugeot - Facture n°' . $bill->getReference(),
            'bill' => $bill,
            'vehicleTab' => $vehicleTab,
            'total_quantity' => $total_quantity,
            'total_bill_ht' => $total_bill_ht,
            'total_bill_ttc' => $total_bill_ttc
        ]);
    }
}
