<?php
namespace BigGit\BigGit\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeAction extends AbstractAction
{
    function __invoke(Request $request, Response $response, array $args)
    {
        $this->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $this->render($response, 'index.twig', $args);
    }
}
