<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ara
 */
class Ara
{

    private $image;
    private $iname;

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
    public function getImage ()
    {
        return $this->image;
    }
    public function setIname($iname)
    {
        $this->iname = $iname;
        return $this;
    }
    public function getIname()
    {
        return $this->iname;
    }
    /** CODE GENERE **/

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
    private $soustitre;

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
     * @return Ara
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
     * Set soustitre
     *
     * @param string $soustitre
     * @return Ara
     */
    public function setSoustitre($soustitre)
    {
        $this->soustitre = $soustitre;

        return $this;
    }

    /**
     * Get soustitre
     *
     * @return string 
     */
    public function getSoustitre()
    {
        return $this->soustitre;
    }

    /**
     * Set paragraph
     *
     * @param string $paragraph
     * @return Ara
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
