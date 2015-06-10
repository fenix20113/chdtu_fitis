<?php

namespace Chdtu\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChdtuGroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groupName')
            ->add(
                'curator',
                'entity',
                [
                    'class' => 'ChdtuUserBundle:User',
                    'property' => 'fullName'
                ]
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Chdtu\UserBundle\Entity\ChdtuGroup'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chdtu_userbundle_chdtugroup';
    }
}
