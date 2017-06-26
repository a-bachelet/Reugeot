<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\RedirectController;
use App\Database\AppDatabase;
use App\Form\VehicleBrandForm;
use App\Helper\FlashMessageHelper;
use App\Helper\FormErrorHelper;
use App\Model\VehicleBrand;
use App\Repository\VehicleBrandRepository;

class VehicleBrandController extends AppController
{
    public function index()
    {
        $vehicleBrandRepo = new VehicleBrandRepository();
        $vehicleBrandCount = $vehicleBrandRepo->count();
        $vehicleBrandByPage = 5;
        $pageCount = ceil($vehicleBrandCount/$vehicleBrandByPage);
        $viewedPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if ($viewedPage < 1 || $viewedPage > $pageCount) {
            $viewedPage = 1;
        }
        $offset = ($viewedPage - 1) * $vehicleBrandByPage;
        $limit = $vehicleBrandByPage;
        /** @var VehicleBrand[] $vehicleBrands **/
        $vehicleBrands = $vehicleBrandRepo->findBetween($offset, $limit, 'DESC');

        $this->render('admin', 'admin.vehicle-brand.index', [
            'page_name' => 'adminVehicleBrandIndex',
            'page_title' => 'Administration - Marques',
            'vehicleBrands' => $vehicleBrands,
            'viewedPage' => intval($viewedPage),
            'pageCount' => intval($pageCount)
        ]);
    }

    public function addGet()
    {
        $this->render('admin', 'admin.vehicle-brand.add', [
            'page_name' => 'adminVehicleBrandAdd',
            'page_title' => 'Administration - Marques'
        ]);
    }

    public function addPost()
    {
        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new VehicleBrandForm();
        $form->handleValues($_POST);

        if ($form->isValid()) {

            $query = 'INSERT INTO vehicle_brands (name) VALUES (:name)';
            $db = AppDatabase::getInstance();

            try {
                $db->query($query, false, ['name' => $_POST['name']]);
                FlashMessageHelper::add('success', 'La marque de véhicules a été ajoutée avec succès.');
                RedirectController::redirect('adminVehicleBrand');
            } catch (\PDOException $e) {
                FlashMessageHelper::add('danger', 'Une erreur est survenue lors de l\'ajout de la marque de véhicules.');
                RedirectController::redirect('adminVehicleBrandAdd');
            }

        } else {
            FormErrorHelper::add('vehicleCategoryForm', $form->getErrors());
            RedirectController::redirect('adminVehicleBrandAdd');
        }
    }

    public function editGet($id)
    {
        $vehicleBrandRepo = new VehicleBrandRepository();
        /** @var VehicleBrand $vehicleBrand **/
        $vehicleBrand = $vehicleBrandRepo->find($id);

        if (is_null($vehicleBrand->getId())) {
            FlashMessageHelper::add('danger', 'Cette marque de véhicules n\'existe pas.');
            RedirectController::redirect('adminVehicleBrand');
        }

        $this->render('admin', 'admin.vehicle-brand.edit', [
            'page_name' => 'adminVehicleBrandEdit',
            'page_title' => 'Administration - Marques',
            'vehicleBrand' => $vehicleBrand
        ]);
    }

    public function editPost($id)
    {
        $vehicleBrandRepo = new VehicleBrandRepository();
        /** @var VehicleBrand $vehicleBraqnd **/
        $vehicleBrand = $vehicleBrandRepo->find($id);

        if (is_null($vehicleBrand->getId())) {
            FlashMessageHelper::add('danger', 'Cette marque de véhicules n\'existe pas.');
            RedirectController::redirect('adminBrandCategory');
        }

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new VehicleBrandForm();
        $form->handleValues($_POST);

        if ($form->isValid()) {

            $query = 'UPDATE vehicle_brands SET name = :name WHERE id = :id';
            $db = AppDatabase::getInstance();

            try {
                $db->query($query, false, [
                    'name' => $_POST['name'],
                    'id' => $id
                ]);
                FlashMessageHelper::add('success', 'La marque de véhicules a été éditée avec succès.');
                RedirectController::redirect('adminVehicleBrand');
            } catch (\PDOException $e) {
                FlashMessageHelper::add('danger', 'Une erreur est survenue lors de l\'édition" de la marque de véhicules.');
                RedirectController::redirect('adminVehicleBrandEdit', ['id' => $id]);
            }

        } else {
            FormErrorHelper::add('vehicleBrandForm', $form->getErrors());
            RedirectController::redirect('adminVehicleBrandEdit', ['id' => $id]);
        }
    }

    public function delete($id)
    {
        $vehicleBrandRepo = new VehicleBrandRepository();
        /** @var VehicleBrand $vehicleBrand **/
        $vehicleBrand= $vehicleBrandRepo->find($id);
        if (is_null($vehicleBrand->getId())) {
            FlashMessageHelper::add('danger', 'Cette marque de véhicules n\'esxiste pas.');
            RedirectController::redirect('adminVehicleBrand');
        }
        $query = 'DELETE FROM vehicle_brands WHERE id = :id';
        $db = AppDatabase::getInstance();
        try {
            $db->query($query, false, ['id' => $vehicleBrand->getId()]);
            FlashMessageHelper::add('success', 'La marque de véhicules ' . $vehicleBrand->getId() . ' a bien été supprimée.');
            RedirectController::redirect('adminVehicleBrand');
        } catch(\Exception $e) {
            FlashMessageHelper::add('danger', 'Une erreur s\'est produite lors de la suppression.');
            RedirectController::redirect('adminVehicleBrand');
        }
    }
}