<?php

namespace Chdtu\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class EditGroupType
 * @package Chdtu\UserBundle\Form\Type
 */
class EditGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'chdtu.group.name']);
    }

    public function getName()
    {
        return 'group_edit_form';
    }
}
