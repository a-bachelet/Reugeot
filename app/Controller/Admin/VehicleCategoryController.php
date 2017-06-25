<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\RedirectController;
use App\Database\AppDatabase;
use App\Form\VehicleCategoryForm;
use App\Helper\FlashMessageHelper;
use App\Helper\FormErrorHelper;
use App\Model\VehicleCategory;
use App\Repository\VehicleCategoryRepository;

class VehicleCategoryController extends AppController
{
    public function index()
    {
        $vehicleCategoryRepo = new VehicleCategoryRepository();
        $vehicleCategoryCount = $vehicleCategoryRepo->count();
        $vehicleCategoryByPage = 5;
        $pageCount = ceil($vehicleCategoryCount/$vehicleCategoryByPage);
        $viewedPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if ($viewedPage < 1 || $viewedPage > $pageCount) {
            $viewedPage = 1;
        }
        $offset = ($viewedPage - 1) * $vehicleCategoryByPage;
        $limit = $vehicleCategoryByPage;
        /** @var VehicleCategory[] $vehicleCategories **/
        $vehicleCategories = $vehicleCategoryRepo->findBetween($offset, $limit, 'DESC');

        $this->render('admin', 'admin.vehicle-category.index', [
            'page_name' => 'adminVehicleCategoryIndex',
            'page_title' => 'Administration - Catégories',
            'vehicleCategories' => $vehicleCategories,
            'viewedPage' => intval($viewedPage),
            'pageCount' => intval($pageCount)
        ]);
    }

    public function addGet()
    {
        $this->render('admin', 'admin.vehicle-category.add', [
            'page_name' => 'adminVehicleCategoryAdd',
            'page_title' => 'Administration - Catégories'
        ]);
    }

    public function addPost()
    {
        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new VehicleCategoryForm();
        $form->handleValues($_POST);

        if ($form->isValid()) {

            $query = 'INSERT INTO vehicle_categories (name) VALUES (:name)';
            $db = AppDatabase::getInstance();

            try {
                $db->query($query, false, ['name' => $_POST['name']]);
                FlashMessageHelper::add('success', 'La catégorie de véhicules a été ajoutée avec succès.');
                RedirectController::redirect('adminVehicleCategory');
            } catch (\PDOException $e) {
                FlashMessageHelper::add('danger', 'Une erreur est survenue lors de l\'ajout de la catégorie de véhicules.');
                RedirectController::redirect('adminVehicleCategoryAdd');
            }

        } else {
            FormErrorHelper::add('vehicleCategoryForm', $form->getErrors());
            RedirectController::redirect('adminVehicleCategoryAdd');
        }
    }

    public function editGet($id)
    {
        $vehicleCategoryRepo = new VehicleCategoryRepository();
        /** @var VehicleCategory $vehicleCategory **/
        $vehicleCategory = $vehicleCategoryRepo->find($id);

        if (is_null($vehicleCategory->getId())) {
            FlashMessageHelper::add('danger', 'Cette catégorie de véhicules n\'existe pas.');
            RedirectController::redirect('adminVehicleCategory');
        }

        $this->render('admin', 'admin.vehicle-category.edit', [
            'page_name' => 'adminVehicleCategoryEdit',
            'page_title' => 'Administration - Catégories',
            'vehicleCategory' => $vehicleCategory
        ]);
    }

    public function editPost($id)
    {
        $vehicleCategoryRepo = new VehicleCategoryRepository();
        /** @var VehicleCategory $vehicleCategory **/
        $vehicleCategory = $vehicleCategoryRepo->find($id);

        if (is_null($vehicleCategory->getId())) {
            FlashMessageHelper::add('danger', 'Cette catégorie de véhicules n\'existe pas.');
            RedirectController::redirect('adminVehicleCategory');
        }

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new VehicleCategoryForm();
        $form->handleValues($_POST);

        if ($form->isValid()) {

            $query = 'UPDATE vehicle_categories SET name = :name WHERE id = :id';
            $db = AppDatabase::getInstance();

            try {
                $db->query($query, false, [
                    'name' => $_POST['name'],
                    'id' => $id
                ]);
                FlashMessageHelper::add('success', 'La catégorie de véhicules a été éditée avec succès.');
                RedirectController::redirect('adminVehicleCategory');
            } catch (\PDOException $e) {
                FlashMessageHelper::add('danger', 'Une erreur est survenue lors de l\'édition" de la catégorie de véhicules.');
                RedirectController::redirect('adminVehicleCategoryEdit', ['id' => $id]);
            }

        } else {
            FormErrorHelper::add('vehicleCategoryForm', $form->getErrors());
            RedirectController::redirect('adminVehicleCategoryEdit', ['id' => $id]);
        }
    }

    public function delete($id)
    {
        $vehicleCategoryRepo = new VehicleCategoryRepository();
        /** @var VehicleCategory $vehicleCategory **/
        $vehicleCategory = $vehicleCategoryRepo->find($id);
        if (is_null($vehicleCategory->getId())) {
            FlashMessageHelper::add('danger', 'Cette catégorie de véhicules n\'esxiste pas.');
            RedirectController::redirect('adminVehicleCategory');
        }
        $query = 'DELETE FROM vehicle_categories WHERE id = :id';
        $db = AppDatabase::getInstance();
        try {
            $db->query($query, false, ['id' => $vehicleCategory->getId()]);
            FlashMessageHelper::add('success', 'La catégorie de véhicules ' . $vehicleCategory->getId() . ' a bien été supprimée.');
            RedirectController::redirect('adminVehicleCategory');
        } catch(\Exception $e) {
            FlashMessageHelper::add('danger', 'Une erreur s\'est produite lors de la suppression.');
            RedirectController::redirect('adminVehicleCategory');
        }
    }
}