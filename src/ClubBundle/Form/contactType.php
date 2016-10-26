<?php

namespace ClubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class contactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('soustitre')
            ->add('paragraph', TextareaType::class, array(
                'required'      => false,
            ))
            ->add('image', 'vich_image', array(
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
            'data_class' => 'ClubBundle\Entity\contact'
        ));
    }
}
