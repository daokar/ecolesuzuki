<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccessoireType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomaccessoire')
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Personne',
                'property'=>'id')
                 )
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Tarif',
                'property'=>'id')
                 )
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Paiement',
                'property'=>'id')
                 )
            ->add('debutlocation')
            ->add('finlocation')
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Accessoire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_accessoire';
    }
}
