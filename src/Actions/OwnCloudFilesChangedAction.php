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
        $project = 'my/project';
        $user = 'LewisW';

        // Copy files from owncloud

        // Set author

        $git = new \PHPGit\Git();
        $git->setRepository($owncloudPath . $project);
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
