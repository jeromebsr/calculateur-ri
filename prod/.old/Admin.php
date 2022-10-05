<?php
/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 07/02/2019
 * Time: 15:10
 */

class Admin
{
    private $id;
    private $email;
    private $pseudo;
    private $password;
    private $level_admin;
    private $etat;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            /* Vérification de l'existance de la méthode */
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLevelAdmin()
    {
        return $this->level_admin;
    }

    /**
     * @param mixed $level_admin
     */
    public function setLevelAdmin($level_admin)
    {
        $this->level_admin = $level_admin;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
}