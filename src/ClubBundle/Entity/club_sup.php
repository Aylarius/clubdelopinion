<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * club_sup
 */
class club_sup
{
    public $image;

    public $iname;

    public function setIname($iname)
    {
        $this->iname = $iname;

        return $this;
    }

    public function getIname()
    {
        return $this->iname;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    /* CODE GENERE */
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $soutitre;

    /**
     * @var string
     */
    private $paragraph;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return club_sup
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set soutitre
     *
     * @param string $soutitre
     * @return club_sup
     */
    public function setSoutitre($soutitre)
    {
        $this->soutitre = $soutitre;

        return $this;
    }

    /**
     * Get soutitre
     *
     * @return string 
     */
    public function getSoutitre()
    {
        return $this->soutitre;
    }

    /**
     * Set paragraph
     *
     * @param string $paragraph
     * @return club_sup
     */
    public function setParagraph($paragraph)
    {
        $this->paragraph = $paragraph;

        return $this;
    }

    /**
     * Get paragraph
     *
     * @return string 
     */
    public function getParagraph()
    {
        return $this->paragraph;
    }
}
