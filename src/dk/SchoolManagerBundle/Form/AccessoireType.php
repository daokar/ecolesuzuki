<?php

namespace dk\SchoolManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccessoireType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomaccessoire')
            ->add('idpersonne', null, array ('label' => 'Eleve')
                 )
            ->add('idtarif', null, array ('label' => 'Tarif')
                 )
            ->add('idpaiement', null, array ('label' => 'Paiement')
                 )
            ->add('debutlocation', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 2, date('Y') - 2),
                ))
            ->add('finlocation', 'date', array(
                    'empty_value' => array('day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'),
                    'years' => range(date('Y') + 2, date('Y') - 2),
                ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'dk\SchoolManagerBundle\Entity\Accessoire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dk_schoolmanagerbundle_accessoire';
    }
}
