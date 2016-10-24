<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * av2
 */
class av2
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
    private $titleAv2;

    /**
     * @var string
     */
    private $paragraphAv2;


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
     * Set titleAv2
     *
     * @param string $titleAv2
     * @return av2
     */
    public function setTitleAv2($titleAv2)
    {
        $this->titleAv2 = $titleAv2;

        return $this;
    }

    /**
     * Get titleAv2
     *
     * @return string 
     */
    public function getTitleAv2()
    {
        return $this->titleAv2;
    }

    /**
     * Set paragraphAv2
     *
     * @param string $paragraphAv2
     * @return av2
     */
    public function setParagraphAv2($paragraphAv2)
    {
        $this->paragraphAv2 = $paragraphAv2;

        return $this;
    }

    /**
     * Get paragraphAv2
     *
     * @return string 
     */
    public function getParagraphAv2()
    {
        return $this->paragraphAv2;
    }
}
