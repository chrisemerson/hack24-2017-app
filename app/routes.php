<?php
// Routes

use BigGit\BigGit\Actions\OwnCloudFilesChangedAction;
use BigGit\BigGit\Actions\HomeAction;
use BigGit\BigGit\Actions\ResolveConflictsAction;

$app->get('/', HomeAction::class);

$app->post('/fileschanged', OwnCloudFilesChangedAction::class);
$app->get('/fileschanged', OwnCloudFilesChangedAction::class);

$app->get('/resolve/{hash1:[a-f0-9]{32}}/{hash2:[a-f0-9]{32}}', ResolveConflictsAction::class);
