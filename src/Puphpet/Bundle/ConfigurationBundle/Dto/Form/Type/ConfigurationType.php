<?php

namespace Puphpet\Bundle\ConfigurationBundle\Dto\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * The main type.
 * Every form definition/validation starts here.
 */
class ConfigurationType extends AbstractType
{
    private $subscribers;

    public function __construct(array $subscribers = array())
    {
        $this->subscribers = $subscribers;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // this type does not know any fields on its own
        // instead all fields are added by subscribers
        // with this possibility we can do everything we want
        // without any constraints
        foreach ($this->subscribers as $subscriber) {
            $builder->addEventSubscriber($subscriber);
        }
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'configuration';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class'      => 'Puphpet\Bundle\ConfigurationBundle\Dto\ConfigurationDto',
                'csrf_protection' => false,
                'extra_fields_message' => 'This form should not contain extra fields ({{ extra_fields }}).',
            )
        );
    }
}
