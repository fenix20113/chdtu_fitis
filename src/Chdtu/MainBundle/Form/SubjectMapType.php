<?php

namespace Chdtu\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubjectMapType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark')
            ->add('subject', 'entity', [
                'class' => 'ChdtuMainBundle:Subject',
                'property' => 'name'
            ])
            ->add('student', 'entity', [
                'class' => 'ChdtuUserBundle:User',
                'property' => 'fullName'
            ])
            ->add('teacher', 'entity', [
                'class' => 'ChdtuUserBundle:User',
                'property' => 'fullName'
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chdtu\MainBundle\Entity\SubjectMap'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chdtu_mainbundle_subjectmap';
    }
}
