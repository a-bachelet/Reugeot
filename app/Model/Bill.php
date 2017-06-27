<?php

namespace App\Model;

use App\Repository\UserRepository;
use BuildIt\Model\Model;

class Bill extends Model
{
    /** @var string $reference **/
    private $reference;

    /** @var User $user **/
    private $user;

    /** @var \DateTime $date **/
    private $date;

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param number $id
     */
    public function setUser($id)
    {
        $userRepo = new UserRepository();
        $this->user = $userRepo->find($id);
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = new \DateTime($date);
    }
}
