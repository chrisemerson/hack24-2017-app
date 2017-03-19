<?php
namespace BigGit\BigGit\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

class OwnCloudFilesChangedAction extends AbstractAction
{
    function __invoke(Request $request, Response $response, array $args)
    {
        // Extract JSON
        $owncloudPath = '/owncloud/';
        $fullpath = 'my/project';

        list($user, $path) = explode('/', $fullpath, 2);

        $git = new \PHPGit\Git();

        // Set author
        $git->config([
            'user.name' => $user
        ]);
        $git->setRepository($owncloudPath . $user);
        $git->checkout->create($user);

        // Merge develop into user's branch, check that no conflicts occur
        try {
            $git->merge('master');
        } catch (\PHPGit\Exception\GitException $e) {
            $git->merge->abort();
        }

        $git->push();
    }
}
