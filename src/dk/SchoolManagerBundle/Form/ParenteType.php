<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ParenteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idpersonne' )
            ->add('perpersonne')
            ->add('typeparente', 'choice', array(
                        'choices' => array( 'Mere' => 'Mère',
                                            'Pere' => 'Père',
                                            'Frere' => 'Frère',
                                            'Soeur' => 'Soeur'),
                        'empty_value' => 'Choisir'))
            ->add('droitparente', 'checkbox', array ( 'required' => false,                
            ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Parente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_parente';
    }
}
