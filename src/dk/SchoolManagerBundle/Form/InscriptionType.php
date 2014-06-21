<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscriptionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Personne',
                'property'=>'id')
                 )
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Cours',
                'property'=>'id')
                 )
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Paiement',
                'property'=>'id')
                  )
            ->add('dateinscription')
            ->add('modalitepaiement')
            ->add('dateabandon')
            ->add('motifabandon')
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Inscription'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_inscription';
    }
}
