<?php
include 'config.php';

$routes = array(
	'hn',
	'echojs',
	'nextdraft',
	'versioning',
	'html5weekly',
	'jsweekly',
	'rubyweekly',
	'dbweekly',
	'postgresweekly',
	'statuscode',
	'nodeweekly',
	'phpweekly',
	'rdweekly',
	'nosqlweekly',
	'pythonweekly',
	'webtoolsweekly',
	'wdrl',
	'wdweekly',
	'mobilewebweekly',
	'heydesigner',
	'cssweekly',
	'gamedevjs',
	'emberweekly',
	'wpmailme',
	'beyonddesktop',
	'pycoders',
	'perlweekly',
	'devopsweekly',
	'golangweekly',
	'iosdevweekly',
	'sidebario',
	'androidweekly',
	'medium',
	'readability',
	'slashdot',
	'producthunt',
	'designernews',
	'github',
	'webops',
	'webperformancenews',
	'longreads-tech',
	'javascriptlive',
	'cancelbubble',
	'reddit-programming',
	'reddit-webdesign',
	'reddit-webdev',
	'pocket',
	'uxdesignweekly',
	'uxweekly'
);


echo "updating database...\n";

foreach($routes as $route){
	$response = file_get_contents(BASE_URL . "{$route}/update");
	if($response){
		echo "updated {$route}\n";
	}
}
echo "done updating database\n";