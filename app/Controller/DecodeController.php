<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DecodeController implements ControllerInterface
{
    /**
     * @param Request $request Requête HTTP
     * @return string|null
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function execute(Request $request): string|null
    {
        $code = $request->get('data');
        $codeDecode = null;
        if ($code) {
            $codeDecode = base64_decode($code);
        }
        return TwigCore::getEnvironment()->render('decode/decode.html.twig',
            [
                'titre'   => 'Page Décodage',
                'requete' => $request,
                'data' => $codeDecode,

            ]
        );
    }
}
