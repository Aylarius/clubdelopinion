<?php

namespace ClubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('soustitre21')
            ->add('soustitre22')
            ->add('soustitre23')
            ->add('soustitre31')
            ->add('soustitre32')
            ->add('soustitre33')
            ->add('blocktitle1')
            ->add('blockparagraph1')
            ->add('blocktitle2')
            ->add('blockparagraph2')
            ->add('blocktitle3')
            ->add('blockparagraph3')
            ->add('blocktitle4')
            ->add('blockparagraph4')
        ;
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
