<?php

namespace Puphpet\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ConfigurationController extends Controller
{
    /**
     * Validates incoming puphpet.json configuration
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function validateAction(Request $request)
    {
        // just a dummy ...
        $body = json_decode($request->getContent(), true);

        if (!is_array($body)) {
            return new JsonResponse(['result' => false]);
        }

        if (!array_key_exists('configuration', $body)) {
            return new JsonResponse(['result' => false]);
        }

        $configuration = $body['configuration'];

        $this->get('logger')->debug('INCOMING: ' . var_export($configuration, true));

        return new JsonResponse(['result' => is_array($configuration)]);
    }
}
