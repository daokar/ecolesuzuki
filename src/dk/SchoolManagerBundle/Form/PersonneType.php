<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonneType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nompersonne', 'text', array('label' => 'Nom'
                ))
                ->add('prenompersonne', 'text', array('label' => 'Prenom'
                ))
                ->add('typepersonne', 'choice', array('label' => 'Qualité',
                    'choices' => array('Eleve' => 'Eleve',
                        'Enseignant' => 'Enseignant',
                        'Parent' => 'Parent',
                        'Prospect' => 'Prospect'),
                    'empty_value' => 'Choisir',
                    'required' => false,
                ))
                ->add('sexepersonne', 'choice', array('label' => 'Sexe',
                    'choices' => array('F' => 'Féminin',
                        'M' => 'Masculin',),
                    'empty_value' => 'Choisir',
                    'required' => false,
                ))
                ->add('datenaissance', 'date', array('label' => 'Date',
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 0, date('Y') - 100),
                    'required' => false,
                ))
                ->add('mailpersonne', 'email', array('label' => 'E-mail',
                    'required' => false,
                ))
                ->add('telportable', 'text', array('label' => 'Telephone Mobile'
                ))
                ->add('idadresse', 'entity', array(
                    'class' => 'dkSchoolManagerBundle:Adresse',
                    'label' => 'Adresse', 'empty_value' => 'Choisir',
                    'required' => false,
                ))
                ->add('commentairepersonne', 'textarea', array('label' => 'Commentaires'
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Personne'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dk_schoolmanagerbundle_personne';
    }

}
