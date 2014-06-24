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
            ->add('idpersonne', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Personne',
                'label'=>'Eleve', 'empty_value'=>'Choisir')
                 )
            ->add('idcours', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Cours',
                'label'=>'Cours', 'empty_value'=>'Choisir',
                'required' => false,
                'property'=>'typecours')
                 )
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Paiement',
                'label'=>'Paiement', 'empty_value'=>'Choisir',
                'required' => false,
                'property'=>'refpaiement')
                  )
            ->add('dateinscription', 'date', array(
                'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                'years' => range(date('Y') + 0, date('Y') - 100), 
            ))
            ->add('modalitepaiement')
            ->add('dateabandon', 'date', array(
                'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                'years' => range(date('Y') + 0, date('Y') - 100),
                'required'=> false,
            ))
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
