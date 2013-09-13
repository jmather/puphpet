<?php

namespace Puphpet\Bundle\ApacheBundle\Form\Type;

use Puphpet\Bundle\ApacheBundle\Dto\ApacheDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApacheType extends AbstractType
{

    /**
     * @var array
     */
    private $modules;

    public function __construct(array $modules)
    {
        $this->modules = $modules;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'modules',
            'choice',
            [
                'choices'  => $this->modules,
                'multiple' => true,
                'required' => true,
            ]
        );

        $builder->add(
            'vhosts',
            'collection',
            [
                'type'         => new VhostType(),
                'allow_add'    => true,
                'allow_delete' => false,
                'options'      => [
                    'required' => true
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
        return 'apache';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class'      => 'Puphpet\Bundle\ApacheBundle\Dto\ApacheDto',
                'csrf_protection' => false,
            )
        );
    }
}
