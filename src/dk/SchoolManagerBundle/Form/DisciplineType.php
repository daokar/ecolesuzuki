<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DisciplineType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nomdiscipline')
                ->add('idcours', 'entity', array('label' => 'Cours', 'empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Cours'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Discipline'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_discipline';
    }

}
