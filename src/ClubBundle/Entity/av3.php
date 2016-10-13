<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * av3
 */
class av3
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titleAv3;

    /**
     * @var string
     */
    private $paragraphAv3;


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
     * Set titleAv3
     *
     * @param string $titleAv3
     * @return av3
     */
    public function setTitleAv3($titleAv3)
    {
        $this->titleAv3 = $titleAv3;

        return $this;
    }

    /**
     * Get titleAv3
     *
     * @return string 
     */
    public function getTitleAv3()
    {
        return $this->titleAv3;
    }

    /**
     * Set paragraphAv3
     *
     * @param string $paragraphAv3
     * @return av3
     */
    public function setParagraphAv3($paragraphAv3)
    {
        $this->paragraphAv3 = $paragraphAv3;

        return $this;
    }

    /**
     * Get paragraphAv3
     *
     * @return string 
     */
    public function getParagraphAv3()
    {
        return $this->paragraphAv3;
    }
}
