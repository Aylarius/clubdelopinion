<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * av1
 */
class av1
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
    private $titleAv1;

    /**
     * @var string
     */
    private $paragraphAv1;


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
     * Set titleAv1
     *
     * @param string $titleAv1
     * @return av1
     */
    public function setTitleAv1($titleAv1)
    {
        $this->titleAv1 = $titleAv1;

        return $this;
    }

    /**
     * Get titleAv1
     *
     * @return string 
     */
    public function getTitleAv1()
    {
        return $this->titleAv1;
    }

    /**
     * Set paragraphAv1
     *
     * @param string $paragraphAv1
     * @return av1
     */
    public function setParagraphAv1($paragraphAv1)
    {
        $this->paragraphAv1 = $paragraphAv1;

        return $this;
    }

    /**
     * Get paragraphAv1
     *
     * @return string 
     */
    public function getParagraphAv1()
    {
        return $this->paragraphAv1;
    }
}
