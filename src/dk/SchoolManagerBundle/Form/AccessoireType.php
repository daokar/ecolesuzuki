<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccessoireType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nomaccessoire', null, array('label' => 'Accessoire'))
                ->add('idpersonne', 'entity', array('label' => 'Eleve', 'empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Personne')
                )
                ->add('idtarif', 'entity', array('label' => 'Tarif', 'empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Tarif')
                )
                ->add('idpaiement', 'entity', array('label' => 'Paiement', 'empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Paiement')
                )
                ->add('debutlocation', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 1),
                ))
                ->add('finlocation', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 1),
                ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Accessoire'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_accessoire';
    }

}
