<?php

namespace ClubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class EvenementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
                ->add('paragraph', TextareaType::class, array(
                    'required'      => false,
                ))
            ->add('image', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image2', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image3', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image4', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image5', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image6', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image7', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image8', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image9', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image10', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image11', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image12', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image13', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image14', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image15', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image16', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image17', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image18', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image19', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image20', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image21', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image22', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image23', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image24', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image25', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image26', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image27', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image28', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image29', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('image30', 'vich_image', array(
                'label' => false,
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClubBundle\Entity\Evenements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clubbundle_evenements';
    }


}
