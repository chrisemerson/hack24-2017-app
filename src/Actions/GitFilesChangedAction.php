<?php
namespace BigGit\BigGit\Actions;

use PHPGit\Exception\GitException;
use PHPGit\Git;
use Slim\Http\Request;
use Slim\Http\Response;

class GitFilesChangedAction extends AbstractAction
{
    function __invoke(Request $request, Response $response, array $args)
    {
        $git = new Git();

        $git->setRepository("/var/owncloud-repo");
        $git->checkout('master');
        $git->pull();

        copy('/var/owncloud-repo', '/var/data');
        exec('rm -fr /var/data/.git');
    }
}
