<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscriptionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('idpersonne', null, array ('label' => 'Eleve'))
                ->add('idcours', null, array ('label' => 'Cours'))
                ->add('idpaiement', null, array ('label' => 'Paiement', 'required' => false,))
                ->add('dateinscription', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 3),
                ))
                ->add('modalitepaiement')
                ->add('dateabandon', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 3),
                    'required' => false,
                ))
                ->add('motifabandon')

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Inscription'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_inscription';
    }

}
