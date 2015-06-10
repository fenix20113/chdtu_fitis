<?php

namespace Chdtu\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class EditUserType
 * @package Chdtu\UserBundle\Form\Type
 */
class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', ['label' => 'chdtu.username'])
            ->add('firstName', 'text', ['label' => 'chdtu.first.name'])
            ->add('middleName', 'text', ['label' => 'chdtu.middle.name'])
            ->add('lastName', 'text', ['label' => 'chdtu.last.name'])
            ->add('email', 'email', ['label' => 'chdtu.email'])
            ->add('mobile', 'text', ['label' => 'chdtu.mobile'])
            ->add(
                'plainPassword',
                'repeated',
                array(
                    'type' => 'password',
                    'first_options' => ['label' => 'chdtu.password'],
                    'second_options' => ['label' => 'chdtu.password.confirm'],
                    'invalid_message' => 'fos_user.password.mismatch',
                )
            )
            ->add('enabled', 'checkbox', ['label' => 'chdtu.user.isActive'])
            ->add('group', 'entity', [
                'class' => 'ChdtuUserBundle:ChdtuGroup',
                'property' => 'groupName',
                'label' => 'chdtu.user.group']);
//            ->add('enabled', 'submit', ['label' => 'chdtu.user.isActive']);
    }

    public function getName()
    {
        return 'user_edit_form';
    }
}
