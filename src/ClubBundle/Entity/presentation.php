<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * presentation
 */
class presentation
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

    private $image2;
    private $iname2;

    public function setImage2($image2)
    {
        $this->image2 = $image2;
        return $this;
    }
    public function getImage2 ()
    {
        return $this->image2;
    }
    public function setIname2($iname2)
    {
        $this->iname2 = $iname2;
        return $this;
    }
    public function getIname2()
    {
        return $this->iname2;
    }

    //CODE GENERE//

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
    private $soustitre1;

    /**
     * @var string
     */
    private $paragraph1;

    /**
     * @var string
     */
    private $soustitre2;

    /**
     * @var string
     */
    private $paragraph2;


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
     * @return presentation
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
     * Set soustitre1
     *
     * @param string $soustitre1
     * @return presentation
     */
    public function setSoustitre1($soustitre1)
    {
        $this->soustitre1 = $soustitre1;

        return $this;
    }

    /**
     * Get soustitre1
     *
     * @return string 
     */
    public function getSoustitre1()
    {
        return $this->soustitre1;
    }

    /**
     * Set paragraph1
     *
     * @param string $paragraph1
     * @return presentation
     */
    public function setParagraph1($paragraph1)
    {
        $this->paragraph1 = $paragraph1;

        return $this;
    }

    /**
     * Get paragraph1
     *
     * @return string 
     */
    public function getParagraph1()
    {
        return $this->paragraph1;
    }

    /**
     * Set soustitre2
     *
     * @param string $soustitre2
     * @return presentation
     */
    public function setSoustitre2($soustitre2)
    {
        $this->soustitre2 = $soustitre2;

        return $this;
    }

    /**
     * Get soustitre2
     *
     * @return string 
     */
    public function getSoustitre2()
    {
        return $this->soustitre2;
    }

    /**
     * Set paragraph2
     *
     * @param string $paragraph2
     * @return presentation
     */
    public function setParagraph2($paragraph2)
    {
        $this->paragraph2 = $paragraph2;

        return $this;
    }

    /**
     * Get paragraph2
     *
     * @return string 
     */
    public function getParagraph2()
    {
        return $this->paragraph2;
    }
}
