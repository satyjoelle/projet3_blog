<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 24/09/2018
 * Time: 00:06
 */

require_once 'Entity.php';
Class Billet extends Entity {

    private $title;
    private $post;
    private $date_created;



    public function __construct($datas=null)
    {
           if($datas != null) {
           parent::__construct($datas);
       }
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }


}