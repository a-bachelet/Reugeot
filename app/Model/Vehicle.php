<?php

namespace App\Model;

use App\Repository\VehicleBrandRepository;
use App\Repository\VehicleCategoryRepository;
use BuildIt\Model\Model;

class Vehicle extends Model
{
    /**
     * @var string $model
     */
    private $model;

    /**
     * @var VehicleCategory $category
     */
    private $vehicle_category;

    /**
     * @var VehicleBrand $brand
     */
    private $vehicle_brand;

    /**
     * @var float $price_without_taxes
     */
    private $price_without_taxes;

    /**
     * @var float $price_with_taxes
     */
    private $price_with_taxes;

    /**
     * @var bool $professional
     */
    private $professional;

    /**
     * @var string $vehicle_picture
     */
    private $vehicle_picture;

    /**
     * @var bool $active
     */
    private $active;

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return VehicleCategory
     */
    public function getVehicleCategory(): VehicleCategory
    {
        return $this->vehicle_category;
    }

    /**
     * @param number $vehicle_category
     */
    public function setVehicleCategory($vehicle_category)
    {
        $vehicleCategoryRepo = new VehicleCategoryRepository();
        /**
         * @var VehicleCategory $cat
         */
        $cat = $vehicleCategoryRepo->find($vehicle_category);
        $this->vehicle_category = $cat;
    }

    /**
     * @return VehicleBrand
     */
    public function getVehicleBrand(): VehicleBrand
    {
        return $this->vehicle_brand;
    }

    /**
     * @param number $vehicle_brand
     */
    public function setVehicleBrand($vehicle_brand)
    {
        $vehicleBrandRepo = new VehicleBrandRepository();
        /**
         * @var VehicleBrand $bra
         */
        $bra = $vehicleBrandRepo->find($vehicle_brand);
        $this->vehicle_brand = $bra;
    }

    /**
     * @return float
     */
    public function getPriceWithoutTaxes(): float
    {
        return $this->price_without_taxes;
    }

    /**
     * @param float $price_without_taxes
     */
    public function setPriceWithoutTaxes(float $price_without_taxes)
    {
        $this->price_without_taxes = $price_without_taxes;
    }

    /**
     * @return float
     */
    public function getPriceWithTaxes(): float
    {
        return $this->price_with_taxes;
    }

    /**
     * @param float $price_with_taxes
     */
    public function setPriceWithTaxes(float $price_with_taxes)
    {
        $this->price_with_taxes = $price_with_taxes;
    }

    /**
     * @return bool
     */
    public function isProfessional(): bool
    {
        return $this->professional;
    }

    /**
     * @param integer $professional
     */
    public function setProfessional($professional)
    {
        $this->professional = $professional === 0 ? false : true;
    }

    /**
     * @return string
     */
    public function getVehiclePicture(): string
    {
        return $this->vehicle_picture;
    }

    /**
     * @param string $vehicle_picture
     */
    public function setVehiclePicture(string $vehicle_picture)
    {
        $this->vehicle_picture = $vehicle_picture;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active === 0 ? false : true;
    }
}
