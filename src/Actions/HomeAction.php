<?php
namespace BigGit\BigGit\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeAction extends AbstractAction
{
    function __invoke(Request $request, Response $response, array $args)
    {
        return $this->render($response, 'index.twig', $args);
    }
}
