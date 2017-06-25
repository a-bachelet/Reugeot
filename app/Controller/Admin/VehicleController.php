<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\RedirectController;
use App\Database\AppDatabase;
use App\Form\VehicleForm;
use App\Helper\FlashMessageHelper;
use App\Helper\FormErrorHelper;
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
        $return  = ['valid' => true, 'errors' => []];

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new VehicleForm();
        $form->handleValues($_POST);

        if ($form->isValid()) {

            if (isset($_FILES['vehicle_pic'])) {

                $image_name = $_FILES['vehicle_pic']['name'];
                $types = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg'];
                $guessedExtension = explode('.', $image_name);
                $guessedExtension = end($guessedExtension);

                if (isset($types[$guessedExtension])) {

                    $tmp = $_FILES['profile_pic']['tmp_name'];
                    $infos = getimagesize($tmp);
                    if ($infos['mime'] === $types[$guessedExtension] ) {

                        $src = imagecreatefromjpeg($tmp);
                        list($width, $height) = $infos;

                        $newWidth = 200;
                        $newHeight = 200;

                        $tmp = imagecreatetruecolor($newWidth, $newHeight);
                        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        $priceWithTaxes = $_POST['price_without_taxes'] + ($_POST['price_without_taxes'] * 20 / 100);
                        $professional = $_POST['professional'] === 'on' ? 1 : 0;
                        $active = $_POST['active'] === 'on' ? 1 : 0;

                        $query = 'INSERT INTO vehicles (model, vehicle_category_id, vehicle_brand_id, price_without_taxes, price_with_taxes, professional, vehicle_picture, active) VALUES (:model, :vehicle_category_id, :vehicle_brand_id, :price_without_taxes, :price_with_taxes, :professional, :vehicle_picture, :active)';
                        $db = AppDatabase::getInstance();

                        $db->query($query, false, [
                            'model' => $_POST['model'],
                            'vehicle_category_id' => $_POST['vehicle_category_id'],
                            'vehicle_brand_id' => $_POST['vehicle_brand_id'],
                            'price_without_taxes' => $_POST['price_without_taxes'],
                            'price_with_taxes' => $priceWithTaxes,
                            'professional' => $professional,
                            'active' => $active
                        ]);

                        $lastId = intval($db->getLastInsertedId());

                        imagejpeg($tmp, FOLDER_ROOT . '/web/uploads/vehicles_pics/' . $lastId . '.' . $guessedExtension);

                        $query = 'UPDATE vehicles SET vehicle_picture = :vehicle_picture WHERE id = :id';
                        $db->query($query, false, [
                            'vehicle_picture' =>  '/uploads/vehicles_pics/' . $lastId . '.' . $guessedExtension,
                            'id' => $lastId
                        ]);

                        imagedestroy($src);
                        imagedestroy($tmp);

                    } else {
                        $return = ['valid' => false, 'errors' => ['vehicle_pic' => ['', 'Le type MIME du fichier est incorrect !']]];
                    }

                } else {
                    $return = ['valid' => false, 'errors' => ['vehicle_pic' => ['', 'L\'extension .' . $guessedExtension . ' n\'est pas acceptée !']]];
                }

            }  else {
                $return = ['valid' => false, 'errors' => ['vehicle_pic' => ['', 'Aucune photo n\'a été envoyée !']]];
            }

        } else {
            $return = ['valid' => false, 'errors' => $form->getErrors()];
        }

        echo utf8_encode(json_encode($return));
        exit(0);
    }

    public function editGet($id)
    {
        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle $vehicle **/
        $vehicle = $vehicleRepo->find($id);

        if (is_null($vehicle->getId())) {
            FlashMessageHelper::add('danger', 'Ce véhicule n\'existe pas.');
            RedirectController::redirect('adminVehicle');
        }

        $this->render('admin', 'admin.vehicle.edit', [
            'page_name' => 'adminVehicleEdit',
            'page_title' => 'Administration - Véhicules',
            'vehicle' => $vehicle
        ]);
    }

    public function editPost($id)
    {

    }

    public function delete($id)
    {
        $vehicleRepo = new VehicleRepository();
        /** @var Vehicle $vehicle **/
        $vehicle = $vehicleRepo->find($id);

        if (is_null($vehicle->getId())) {
            FlashMessageHelper::add('danger', 'Ce véhicule n\'existe pas.');
            RedirectController::redirect('adminVehicle');
        }

        $query = 'DELETE FROM vehicles WHERE id = :id';
        $db = AppDatabase::getInstance();

        try {
            $db->query($query, false, ['id' => $vehicle->getId()]);
            FlashMessageHelper::add('success', 'Le véhicule ' . $vehicle->getId() . ' a bien été supprimé.');
            RedirectController::redirect('adminVehicle');
        } catch (\PDOException $e) {
            FlashMessageHelper::add('danger', 'Une erreur est survenue lors de la suppression.');
            RedirectController::redirect('adminVehicle');
        }
    }
}
