<?php
// Routes

use BigGit\BigGit\Actions\OwnCloudFilesChangedAction;
use BigGit\BigGit\Actions\HomeAction;

$app->get('/[{name}]', HomeAction::class);
$app->post('/fileschanged', OwnCloudFilesChangedAction::class);
