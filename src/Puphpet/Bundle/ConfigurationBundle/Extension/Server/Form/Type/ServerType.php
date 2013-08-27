<?php

namespace Puphpet\Bundle\ConfigurationBundle\Extension\Server\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServerType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'packages',
            'collection',
            [
                'type'      => 'text',
                'allow_add' => true,
                'options'   => [
                    'required' => false
                ]
            ]
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'server';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Puphpet\Bundle\ConfigurationBundle\Extension\Server\ServerDto',
            )
        );
    }
}
