<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoursType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('idtarif', 'entity', array('label' => 'Tarif', 'empty_value' => 'Choisir',
                    'class' => 'dkSchoolManagerBundle:Tarif',
                    'property' => 'typetarif'))
                ->add('typecours', 'choice', array('label' => 'Cours',
                    'choices' => array('Individuel Petit' => 'Individuel Petit',
                        'Individuel Moyen' => 'Individuel Moyen', 'Individuel Grand' => 'Individuel Grand',
                        'Individuel Adulte' => 'Individuel Adulte', 'Individuel Gratuit' => 'Individuel Gratuit',
                        'Collectif Petit' => 'Collectif Petit', 'Collectif Moyen' => 'Collectif Moyen',
                        'Collectif Grand' => 'Collectif Grand', 'Collectif Adulte' => 'Collectif Adulte',
                        'Collectif Gratuit' => 'Collectif Gratuit'),
                    'empty_value' => 'Choisir',))
                ->add('dureecours', 'time', array('label' => 'Durée',
                    'empty_value' => array('hour' => 'Heure', 'minute' => 'Minute')
                ))
                ->add('debutsession', 'date', array('label' => 'Debut Session',
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 0),
                ))
                ->add('finsession', 'date', array('label' => 'Fin session',
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 1, date('Y') - 0),
                ))


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
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Cours'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_cours';
    }

}
