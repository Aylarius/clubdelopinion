<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 */
class Club
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

    private $image3;
    private $iname3;
    public function setImage3($image3)
    {
        $this->image3 = $image3;
        return $this;
    }
    public function getImage3 ()
    {
        return $this->image3;
    }


    public function setIname3($iname3)
    {
        $this->iname3 = $iname3;
        return $this;
    }
    public function getIname3()
    {
        return $this->iname3;
    }

    private $image4;
    private $iname4;

    public function setImage4($image4)
    {
        $this->image4 = $image4;
        return $this;
    }
    public function getImage4 ()
    {
        return $this->image4;
    }

    public function setIname4($iname4)
    {
        $this->iname4 = $iname4;
        return $this;
    }
    public function getIname4()
    {
        return $this->iname4;
    }


    private $video;
    private $vname;

    /**
     * Set video
     *
     * @param string $video
     * @return Club
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set vname
     *
     * @param string $vname
     * @return Club
     */
    public function setVname($vname)
    {
        $this->vname = $vname;

        return $this;
    }

    /**
     * Get vname
     *
     * @return string
     */
    public function getVname()
    {
        return $this->vname;
    }

    //CODE GENERE//
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */

    private $soustitre11;

    /**
     * @var string
     */
    private $soustitre12;

    /**
     * @var string
     */
    private $soustitre13;

    /**
     * @var string
     */
    private $soustitre14;

    /**
     * @var string
     */
    private $soustitre15;

    /**
     * @var string
     */
    private $soustitre16 = null;

    /**
     * @var string
     */
    private $soustitre21;

    /**
     * @var string
     */
    private $soustitre22;

    /**
     * @var string
     */
    private $soustitre23 = null;

    /**
     * @var string
     */
    private $soustitre31;

    /**
     * @var string
     */
    private $soustitre32;

    /**
     * @var string
     */
    private $soustitre33 = null;

    /**
     * @var string
     */
    private $blocktitle1;

    /**
     * @var string
     */
    private $blockparagraph1;

    /**
     * @var string
     */
    private $blocktitle2;

    /**
     * @var string
     */
    private $blockparagraph2;

    /**
     * @var string
     */
    private $blocktitle3;

    /**
     * @var string
     */
    private $blockparagraph3;

    /**
     * @var string
     */
    private $blocktitle4 = null;

    /**
     * @var string
     */
    private $blockparagraph4 = null;


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
     * Set soustitre14
     *
     * @param string $soustitre14
     * @return Club
     */


    public function setSoustitre14($soustitre14)
    {
        $this->soustitre14 = $soustitre14;

        return $this;
    }

    /**
     * Get soustitre14
     *
     * @return string 
     */
    public function getSoustitre14()
    {
        return $this->soustitre14;
    }

    /**
     * Set soustitre15
     *
     * @param string $soustitre15
     * @return Club
     */
    public function setSoustitre15($soustitre15)
    {
        $this->soustitre15 = $soustitre15;

        return $this;
    }

    /**
     * Get soustitre15
     *
     * @return string 
     */
    public function getSoustitre15()
    {
        return $this->soustitre15;
    }

    /**
     * Set soustitre21
     *
     * @param string $soustitre21
     * @return Club
     */
    public function setSoustitre21($soustitre21)
    {
        $this->soustitre21 = $soustitre21;

        return $this;
    }

    /**
     * Get soustitre21
     *
     * @return string 
     */
    public function getSoustitre21()
    {
        return $this->soustitre21;
    }

    /**
     * Set soustitre22
     *
     * @param string $soustitre22
     * @return Club
     */
    public function setSoustitre22($soustitre22)
    {
        $this->soustitre22 = $soustitre22;

        return $this;
    }

    /**
     * Get soustitre22
     *
     * @return string 
     */
    public function getSoustitre22()
    {
        return $this->soustitre22;
    }

    /**
     * Set soustitre23
     *
     * @param string $soustitre23
     * @return Club
     */
    public function setSoustitre23($soustitre23)
    {
        $this->soustitre23 = $soustitre23;

        return $this;
    }

    /**
     * Get soustitre23
     *
     * @return string 
     */
    public function getSoustitre23()
    {
        return $this->soustitre23;
    }

    /**
     * Set soustitre31
     *
     * @param string $soustitre31
     * @return Club
     */
    public function setSoustitre31($soustitre31)
    {
        $this->soustitre31 = $soustitre31;

        return $this;
    }

    /**
     * Get soustitre31
     *
     * @return string 
     */
    public function getSoustitre31()
    {
        return $this->soustitre31;
    }

    /**
     * Set soustitre32
     *
     * @param string $soustitre32
     * @return Club
     */
    public function setSoustitre32($soustitre32)
    {
        $this->soustitre32 = $soustitre32;

        return $this;
    }

    /**
     * Get soustitre32
     *
     * @return string 
     */
    public function getSoustitre32()
    {
        return $this->soustitre32;
    }

    /**
     * Set soustitre33
     *
     * @param string $soustitre33
     * @return Club
     */
    public function setSoustitre33($soustitre33)
    {
        $this->soustitre33 = $soustitre33;

        return $this;
    }

    /**
     * Get soustitre33
     *
     * @return string 
     */
    public function getSoustitre33()
    {
        return $this->soustitre33;
    }

    /**
     * Set blocktitle1
     *
     * @param string $blocktitle1
     * @return Club
     */
    public function setBlocktitle1($blocktitle1)
    {
        $this->blocktitle1 = $blocktitle1;

        return $this;
    }

    /**
     * Get blocktitle1
     *
     * @return string 
     */
    public function getBlocktitle1()
    {
        return $this->blocktitle1;
    }

    /**
     * Set blockparagraph1
     *
     * @param string $blockparagraph1
     * @return Club
     */
    public function setBlockparagraph1($blockparagraph1)
    {
        $this->blockparagraph1 = $blockparagraph1;

        return $this;
    }

    /**
     * Get blockparagraph1
     *
     * @return string 
     */
    public function getBlockparagraph1()
    {
        return $this->blockparagraph1;
    }

    /**
     * Set blocktitle2
     *
     * @param string $blocktitle2
     * @return Club
     */
    public function setBlocktitle2($blocktitle2)
    {
        $this->blocktitle2 = $blocktitle2;

        return $this;
    }

    /**
     * Get blocktitle2
     *
     * @return string 
     */
    public function getBlocktitle2()
    {
        return $this->blocktitle2;
    }

    /**
     * Set blockparagraph2
     *
     * @param string $blockparagraph2
     * @return Club
     */
    public function setBlockparagraph2($blockparagraph2)
    {
        $this->blockparagraph2 = $blockparagraph2;

        return $this;
    }

    /**
     * Get blockparagraph2
     *
     * @return string 
     */
    public function getBlockparagraph2()
    {
        return $this->blockparagraph2;
    }

    /**
     * Set blocktitle3
     *
     * @param string $blocktitle3
     * @return Club
     */
    public function setBlocktitle3($blocktitle3)
    {
        $this->blocktitle3 = $blocktitle3;

        return $this;
    }

    /**
     * Get blocktitle3
     *
     * @return string 
     */
    public function getBlocktitle3()
    {
        return $this->blocktitle3;
    }

    /**
     * Set blockparagraph3
     *
     * @param string $blockparagraph3
     * @return Club
     */
    public function setBlockparagraph3($blockparagraph3)
    {
        $this->blockparagraph3 = $blockparagraph3;

        return $this;
    }

    /**
     * Get blockparagraph3
     *
     * @return string 
     */
    public function getBlockparagraph3()
    {
        return $this->blockparagraph3;
    }

    /**
     * Set blocktitle4
     *
     * @param string $blocktitle4
     * @return Club
     */
    public function setBlocktitle4($blocktitle4)
    {
        $this->blocktitle4 = $blocktitle4;

        return $this;
    }

    /**
     * Get blocktitle4
     *
     * @return string 
     */
    public function getBlocktitle4()
    {
        return $this->blocktitle4;
    }

    /**
     * Set blockparagraph4
     *
     * @param string $blockparagraph4
     * @return Club
     */
    public function setBlockparagraph4($blockparagraph4)
    {
        $this->blockparagraph4 = $blockparagraph4;

        return $this;
    }

    /**
     * Get blockparagraph4
     *
     * @return string 
     */
    public function getBlockparagraph4()
    {
        return $this->blockparagraph4;
    }
    

    /**
     * Set soustitre11
     *
     * @param string $soustitre11
     * @return Club
     */
    public function setSoustitre11($soustitre11)
    {
        $this->soustitre11 = $soustitre11;

        return $this;
    }

    /**
     * Get soustitre11
     *
     * @return string 
     */
    public function getSoustitre11()
    {
        return $this->soustitre11;
    }

    /**
     * Set soustitre12
     *
     * @param string $soustitre12
     * @return Club
     */
    public function setSoustitre12($soustitre12)
    {
        $this->soustitre12 = $soustitre12;

        return $this;
    }

    /**
     * Get soustitre12
     *
     * @return string 
     */
    public function getSoustitre12()
    {
        return $this->soustitre12;
    }

    /**
     * Set soustitre13
     *
     * @param string $soustitre13
     * @return Club
     */
    public function setSoustitre13($soustitre13)
    {
        $this->soustitre13 = $soustitre13;

        return $this;
    }

    /**
     * Get soustitre13
     *
     * @return string 
     */
    public function getSoustitre13()
    {
        return $this->soustitre13;
    }

    /**
     * Set soustitre16
     *
     * @param string $soustitre16
     * @return Club
     */
    public function setSoustitre16($soustitre16)
    {
        $this->soustitre16 = $soustitre16;

        return $this;
    }

    /**
     * Get soustitre16
     *
     * @return string 
     */
    public function getSoustitre16()
    {
        return $this->soustitre16;
    }
}
