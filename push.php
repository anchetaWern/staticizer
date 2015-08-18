<?php
include 'config.php';
include 'Git.php';

$path = getcwd();

echo "pushing to git...\n";

$repo = Git::open($path . '/' . STATIC_PATH); 

$repo->add('.');
$repo->commit(time());
$repo->push('origin', 'master');

echo "successfully pushed!\n";