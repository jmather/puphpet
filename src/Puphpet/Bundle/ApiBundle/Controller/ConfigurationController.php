<?php

namespace Puphpet\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorBuilder;

class ConfigurationController extends Controller
{
    /**
     * Validates incoming puphpet.json configuration
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function validateAction(Request $request, $edition)
    {
        // just prototyping, very hacky ...
        // we should use FOSRestBundle to simplify this approach
        if ('POST' == $request->getMethod()) {
            $body = json_decode($request->getContent(), true);

            if (!is_array($body)) {
                return new JsonResponse(['result' => false, 'error' => ['error-code' => '001']], 400);
            }

            if (!array_key_exists('configuration', $body)) {
                return new JsonResponse(['result' => false, 'error' => ['error-code' => '002']], 400);
            }

            $requestedConfiguration = $body['configuration'];


        } else {
            // tmp hack for being able to call the action with GET
            // @TODO remove this possibilty after the validate method is limited to POST requests
            $requestedConfiguration = json_decode($request->query->get('configuration'), true);
        }

        if (!is_array($requestedConfiguration)) {
            return new JsonResponse(['result' => false, 'error' => ['error-code' => '003']], 400);
        }

        $configuration = $this->get('configuration.builder.'.$edition)->build();

        $form = $this->createForm($this->get('configuration.type.'.$edition), $configuration);
        $form->submit($requestedConfiguration);

        if ($form->isValid()) {
            $this->get('logger')->debug('INCOMING: ' . var_export($configuration, true));

            return new JsonResponse(['result' => true]);
        }

        $this->get('logger')->error('User configuration invalid: ' . $form->getErrorsAsString());

        return new JsonResponse(['result' => false, 'error' => ['error-code' => '004']], 400);
    }
}
