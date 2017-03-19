<?php
namespace BigGit\BigGit\Actions;

use Slim\Http\Request;
use Slim\Http\Response;

class OwnCloudFilesChangedAction extends AbstractAction
{
    function __invoke(Request $request, Response $response, array $args)
    {
        // Extract JSON

        // Commit files to git, using separate branches per user

        // Merge develop into user's branch, check that no conflicts occur

        // If no conflicts, merge user's branch into develop

        // Merge develop into branches of all other users to 'share' content perhaps?
    }
}
