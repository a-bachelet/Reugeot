<?php

namespace App\Model;

use App\Repository\RoleRepository;
use BuildIt\Model\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    /**
     * Prénom de l'utilisateur.
     * @var string $first_name
     */
    private $first_name;

    /**
     * Nom de famille de l'utilisateur.
     * @var string $last_name
     */
    private $last_name;

    /**
     * Email de l'utilisateur.
     * @var string $email
     */
    private $email;

    /**
     * Mot de Passe de l'utilisateur.
     * @var string $password
     */
    private $password;

    /**
     * Token d'activation de l'utilisateur.
     * @var string $activation_token
     */
    private $activation_token;

    /**
     * Role de l'utilisateur.
     * @var Role $role;
     */
    private $role;

    /**
     * Numéro de téléphone fixe de l'utilisateur.
     * @var integer $home_phone
     */
    private $home_phone;

    /**
     * Numéro de téléphone portable de l'utilisateur.
     * @var integer $cell_phone
     */
    private $cell_phone;

    /**
     * Adresse de l'utilisateur.
     * @var string $address
     */
    private $address;

    /**
     * Code postal de l'utilisateur.
     * @var integer $zip_code
     */
    private $zip_code;

    /**
     * Ville de l'utilisateur.
     * @var string $city
     */
    private $city;

    /**
     * L'utilisateur est professionel ou non.
     * @var bool $professional
     */
    private $professional;

    /**
     * Nome de l'entreprise de l'utilisateur si $professional = true.
     * @var string $company_name
     */
    private $company_name;

    /**
     * Numéro de téléphone de l'entreprise de l'utilisateur si $professional = true.
     * @var integer $company_phone
     */
    private $company_phone;

    /**
     * Email de l'entreprise de l'utilisateur si $professional = true.
     * @var string $company_email
     */
    private $company_email;

    /**
     * URL du site web de l'entreprise de l'utilisateur si $professional = true.
     * @var string $company_website
     */
    private $company_website;

    /**
     * Chemin vers l'image de profil de l'utilisateur.
     * @var string $profile_pic
     */
    private $profile_pic;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getActivationToken()
    {
        return $this->activation_token;
    }

    /**
     * @param string $activation_token
     */
    public function setActivationToken($activation_token)
    {
        $this->activation_token = $activation_token;
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param integer $role
     */
    public function setRole($role)
    {
        $repo = new RoleRepository();
        $this->role = $repo->find($role);
    }

    /**
     * @return int
     */
    public function getHomePhone()
    {
        return $this->home_phone;
    }

    /**
     * @param int $home_phone
     */
    public function setHomePhone($home_phone)
    {
        $this->home_phone = $home_phone;
    }

    /**
     * @return int
     */
    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    /**
     * @param int $cell_phone
     */
    public function setCellPhone($cell_phone)
    {
        $this->cell_phone = $cell_phone;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param int $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return bool
     */
    public function isProfessional()
    {
        return $this->professional;
    }

    /**
     * @param string $professional
     */
    public function setProfessional($professional)
    {
        $this->professional = $professional === '1' ? true : false;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param string $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * @return int
     */
    public function getCompanyPhone()
    {
        return $this->company_phone;
    }

    /**
     * @param int $company_phone
     */
    public function setCompanyPhone($company_phone)
    {
        $this->company_phone = $company_phone;
    }

    /**
     * @return string
     */
    public function getCompanyEmail()
    {
        return $this->company_email;
    }

    /**
     * @param string $company_email
     */
    public function setCompanyEmail($company_email)
    {
        $this->company_email = $company_email;
    }

    /**
     * @return string
     */
    public function getCompanyWebsite()
    {
        return $this->company_website;
    }

    /**
     * @param string $company_website
     */
    public function setCompanyWebsite($company_website)
    {
        $this->company_website = $company_website;
    }

    /**
     * @return string
     */
    public function getProfilePic()
    {
        return $this->profile_pic;
    }

    /**
     * @param string $profile_pic
     */
    public function setProfilePic($profile_pic)
    {
        $this->profile_pic = $profile_pic;
    }
}
