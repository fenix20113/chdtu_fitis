<?php

namespace Chdtu\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text', ['label' => 'chdtu.first.name'])
            ->add('middleName', 'text', ['label' => 'chdtu.middle.name'])
            ->add('lastName', 'text', ['label' => 'chdtu.last.name'])
            ->add('mobile', 'text', ['label' => 'chdtu.mobile']);
//            ->add('email', 'email', ['label' => 'chdtu.email'])
//            ->add('password', 'password', ['label' => 'chdtu.password'])
//            ->add('confirmPassword', 'password', ['label' => 'chdtu.password.confirm'])
//            ->add('save', 'submit', ['label' => 'chdtu.user.save']);
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'wizardry_user_registration';
    }
}
