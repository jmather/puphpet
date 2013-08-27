<?php

namespace Puphpet\Bundle\ConfigurationBundle\Extension\Puphpet\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PuphpetType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'version',
            'text',
            [
                'required' => false
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
        return 'puphpet';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Puphpet\Bundle\ConfigurationBundle\Extension\Puphpet\PuphpetDto',
            )
        );
    }
}
