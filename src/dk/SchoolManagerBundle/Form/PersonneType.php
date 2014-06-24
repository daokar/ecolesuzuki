<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonneType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nompersonne')
            ->add('prenompersonne')
            ->add('typepersonne', 'choice', array(
                        'choices' => array( 'Eleve'   => 'Eleve',
                                            'Enseignant' => 'Enseignant',
                                            'Parent' => 'Parent',
                                            'Prospect' => 'Prospect'),
                        'empty_value' => 'Choisir',
                        'required' => false,
                ))
            ->add('sexepersonne','choice', array(
                        'choices'  => array('F'   => 'Féminin',
                                            'M' => 'Masculin',),
                        'empty_value'=>'Choisir',
                        'required' => false,
                ))
            ->add('datenaissance', 'date', array(
                'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                'years' => range(date('Y') + 0, date('Y') - 100),
                'required' => false, 
            ))
            ->add('mailpersonne')
            ->add('telportable')
            ->add('idadresse', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Adresse',
                'label'=>'Adresse', 'empty_value'=>'Choisir',
                'required' => false,)                 )
            ->add('commentairepersonne')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Personne'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_personne';
    }
}
