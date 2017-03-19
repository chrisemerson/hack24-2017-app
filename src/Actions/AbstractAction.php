<?php
namespace BigGit\BigGit\Actions;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class AbstractAction
{
    /** @var ContainerInterface */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    abstract function __invoke(Request $request, Response $response, array $args);

    public function __get($name)
    {
        return $this->container->get($name);
    }

    public function get($name)
    {
        return $this->container->get($name);
    }

    protected function render(ResponseInterface $response, $template, $data = [])
    {
        return $this->get('view')->render($response, $template, $data);
    }
}
