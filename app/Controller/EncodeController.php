<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class EncodeController implements ControllerInterface
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
        $codeEncode = null;
        if ($code) {
            $codeEncode = base64_encode($code);
        }
        return TwigCore::getEnvironment()->render('encode/encode.html.twig',
            [
                'titre'   => 'Page Encodage',
                'requete' => $request,
                'data' => $codeEncode,
            ]
        );
    }
}
