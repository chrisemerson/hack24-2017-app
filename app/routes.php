<?php
// Routes

use BigGit\BigGit\Actions\OwnCloudFilesChangedAction;
use BigGit\BigGit\Actions\HomeAction;

$app->post('/fileschanged', OwnCloudFilesChangedAction::class);
$app->get('/fileschanged', OwnCloudFilesChangedAction::class);
