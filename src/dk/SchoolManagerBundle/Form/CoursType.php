<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoursType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typecours')
            ->add('dureecours')
            ->add('debutsession', 'date', array(
                                   'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                                    'years' => range(date('Y') + 2, date('Y') - 2), 
            ))
            ->add('finsession', 'date', array(
                                'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                                'years' => range(date('Y') + 2, date('Y') - 2), 
            ))
            ->add('idtarif', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Tarif',
                'property'=>'typetarif')
                 )
//            ->add('iddiscipline', 'entity', array (
//                'class'=>'dkSchoolManagerBundle:Discipline',
//                'property'=>'nomdiscipline')
//                 )
//            ->add('idinscription', 'entity', array (
//                'class'=>'dkSchoolManagerBundle:Inscription',
//                'property'=>'id')
//                 )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Cours'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_cours';
    }
}
