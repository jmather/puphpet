<?php

namespace Puphpet\Bundle\ApacheBundle\Form\EventListener;

use Puphpet\Bundle\ApacheBundle\Form\Type\ApacheType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ApacheTypeSubscriber implements EventSubscriberInterface
{

    /**
     * @var ApacheType
     */
    private $apacheType;

    /**
     * @param ApacheType $apacheType
     */
    public function __construct(ApacheType $apacheType)
    {
        $this->apacheType = $apacheType;
    }

    public static function getSubscribedEvents()
    {
        return array(
            //FormEvents::PRE_SUBMIT => 'preSubmit',
            FormEvents::PRE_SET_DATA => 'preSetData',
        );
    }

    /**
     * @param event FormEvent
     */
    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();

        $form->add('apache', $this->apacheType, ['required' => false]);
    }
}
