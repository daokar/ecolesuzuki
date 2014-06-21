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
            ->add('typepersonne')
            ->add('sexepersonne')
            ->add('datenaissance')
            ->add('mailpersonne')
            ->add('telportable')
            ->add('id', 'entity', array (
                'class'=>'dkSchoolManagerBundle:Adresse',
                'property'=>'id')
                 )
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
