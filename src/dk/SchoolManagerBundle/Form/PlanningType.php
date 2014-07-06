<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlanningType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dateplanning', 'datetime', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                        'hour' => 'Heure', 'minute' => 'Minute'),
                    'years' => range(date('Y') + 1, date('Y') - 0),
                ))
                ->add('idcours', 'entity', array('empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Cours'
                ))
                ->add('idsalle', 'entity', array('empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Salle'
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Planning'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_planning';
    }

}
