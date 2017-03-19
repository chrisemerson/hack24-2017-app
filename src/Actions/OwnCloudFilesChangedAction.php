<?php
namespace BigGit\BigGit\Actions;

use PHPGit\Exception\GitException;
use PHPGit\Git;
use Slim\Http\Request;
use Slim\Http\Response;

class OwnCloudFilesChangedAction extends AbstractAction
{
    function __invoke(Request $request, Response $response, array $args)
    {
        // Extract JSON
//        $owncloudPath = '/owncloud/';
//        $fullpath = 'my/project';
//
//        list($user, $path) = explode('/', $fullpath, 2);

        $git = new Git();

        // Set author
        $git->config([
            'global' => [
                'user.name' => "Chris Emerson"
            ]
        ]);

        $git->setRepository("c:\\code\\hack24-2017-documents");

        $branchName = 'chrisemerson';

        try {
            $git->checkout($branchName);
        } catch (GitException $e) {
            $git->checkout->create($branchName);
        }

        // Commit

        // Merge develop into user's branch, check that no conflicts occur
        try {
            $git->merge('master');
        } catch (GitException $e) {
            print_r($e);
            $git->merge->abort();
        }

        $git->push('origin', $branchName);
    }
}
