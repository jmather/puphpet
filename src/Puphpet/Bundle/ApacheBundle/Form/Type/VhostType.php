<?php

namespace Puphpet\Bundle\ApacheBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VhostType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('server_name', 'text');
        $builder->add(
            'server_aliases',
            'collection',
            [
                'type'      => 'text',
                'allow_add' => true,
                'options'   => [
                    'required' => false
                ]
            ]

        );
        $builder->add('document_root', 'text');
        $builder->add('port', 'text');
        $builder->add(
            'env_vars',
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
        return 'vhost';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Puphpet\Bundle\ApacheBundle\Dto\VhostDto',
                'csrf_protection' => false,
            )
        );
    }
}
