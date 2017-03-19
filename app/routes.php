<?php
// Routes

use BigGit\BigGit\Actions\HomeAction;

$app->get('/[{name}]', HomeAction::class);
