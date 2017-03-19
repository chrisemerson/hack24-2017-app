<?php
namespace BigGit\BigGit\Actions;

use PHPGit\Exception\GitException;
use PHPGit\Git;
use Slim\Http\Request;
use Slim\Http\Response;

class OwnCloudFilesChangedAction extends AbstractAction
{
    private static $lyrics = [
        "The future teaches you to be alone",
        "The present to be afraid and cold",
        "So if I can shoot rabbits",
        "Then I can shoot fascists",
        "Bullets for your brain today",
        "But we'll forget it all again",
        "Monuments put from pen to paper",
        "Turns me into a gutless wonder",
        "And if you tolerate this",
        "Then your children will be next",
        "And if you tolerate this",
        "Then your children will be next",
        "Will be next",
        "Will be next",
        "Will be next",
        "Gravity keeps my head down",
        "Or is it maybe shame",
        "At being so young and being so vain",
        "Holes in your head today",
        "But I'm a pacifist",
        "I've walked La Ramblas",
        "But not with real intent",
        "And if you tolerate this",
        "Then your children will be next",
        "And if you tolerate this",
        "Then your children will be next",
        "Will be next",
        "Will be next",
        "Will be next",
        "Will be next",
        "And on the street tonight an old man plays",
        "With newspaper cuttings of his glory days",
        "And if you tolerate this",
        "Then your children will be next",
        "And if you tolerate this",
        "Then your children will be next",
        "Will be next",
        "Will be next",
        "Will be next"
    ];

    function __invoke(Request $request, Response $response, array $args)
    {
        /**
         * Contains keys: username
         */
        $body = $request->getParsedBody();

        $git = new Git();

        // Set author
        $git->config([
            'global' => [
                'user.name' => $body['username']
            ]
        ]);

        exec('cp -R /var/data/* /var/owncloud-repo/');

        $git->setRepository("/var/owncloud-repo");

        try {
            $git->checkout($body['username']);
        } catch (GitException $e) {
            $git->checkout->create($body['username']);
        }

        exec('cd /var/owncloud-repo/; git add -A && git commit -m "'. self::$lyrics[array_rand(self::$lyrics)] .'"');

//        $git->commit(, [
//            'all' => true
//        ]);

        // Merge master into user's branch, check that no conflicts occur
        try {
            $git->merge('master');
        } catch (GitException $e) {
            $git->merge->abort();
            throw $e;
        }

        $git->push('origin', $body['username']);
        $git->checkout('master');

        // Merge it into master
        try {
            $git->merge($body['username']);
        } catch (GitException $e) {
            $git->merge->abort();
            throw $e;
        }

        $git->push('origin', 'master');
    }
}
