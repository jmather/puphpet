<?php

namespace Puphpet\Bundle\ConfigurationBundle\Extension\Server\Form\EventListener;

use Puphpet\Bundle\ConfigurationBundle\Extension\Server\Form\Type\ServerType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ServerTypeSubscriber implements EventSubscriberInterface
{

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

        $form->add('server', new ServerType(), ['required' => true]);
    }
}
