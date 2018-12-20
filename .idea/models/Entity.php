<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 27/09/2018
 * Time: 18:14
 */

abstract class Entity
{

    protected $id;

   public function __construct($datas=null)
    {
        if($datas !== null) {
            $this->hydrate($datas);
        }
    }

    /** @param array $donnees
    * @return void
    */
   public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id=$id;
    }
}