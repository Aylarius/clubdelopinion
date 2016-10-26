<?php

namespace ClubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ClubType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('soustitre11')
            ->add('soustitre12')
            ->add('soustitre13')
            ->add('soustitre14')
            ->add('soustitre15')
            ->add('soustitre16')
            ->add('soustitre21')
            ->add('soustitre22')
            ->add('soustitre23')
            ->add('soustitre31')
            ->add('soustitre32')
            ->add('soustitre33')
            ->add('blocktitle1')
            ->add('blockparagraph1', TextareaType::class, array(
                'required'      => false,
            ))
            ->add('blocktitle2')
            ->add('blockparagraph2', TextareaType::class, array(
                'required'      => false,
            ))
            ->add('blocktitle3')
            ->add('blockparagraph3', TextareaType::class, array(
                'required'      => false,
            ))
            ->add('blocktitle4')
            ->add('blockparagraph4', TextareaType::class, array(
                'required'      => false,
            ))
            ->add('video', 'vich_image', array(
                'label' => 'Vidéo',
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image', 'vich_image', array(
                'label' => 'Image',
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image2', 'vich_image', array(
                'label' => 'Image',
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image3', 'vich_image', array(
                'label' => 'Image',
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image4', 'vich_image', array(
                'label' => 'Image',
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClubBundle\Entity\Club'
        ));
    }
}
