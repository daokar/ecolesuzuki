<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PresenceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idpersonne', 'entity', array ('empty_value' => 'Choisir',
                                            'class' => 'dkSchoolManagerBundle:Personne'))
            ->add('idplanning', 'entity', array ('property' => 'id', 'empty_value' => 'Choisir',
                                            'class' => 'dkSchoolManagerBundle:Planning'))
            ->add('dateannulation', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 0),
                ))
            ->add('motifannulation')
            ->add('datereport', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 0),
                ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Presence'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_presence';
    }
}
