<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaiementType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('datepaiement', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 3),
                ))
                ->add('montantpaiement')
                ->add('modepaiement')
                ->add('refpaiement')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Paiement'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_paiement';
    }

}
