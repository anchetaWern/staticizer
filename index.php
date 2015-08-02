<?php
include 'config.php';
include 'Git.php';

$path = getcwd();

$news_sources = array(
	'hn',
	'producthunt',
	'github',
	'medium',
	'dn',
	'readability',
	'slashdot',
	'php',
	'html5',
	'css',
	'js',
	'ruby',
	'db',
	'programmer',
	'design',
	'gamedev',
	'webdev',
	'web-operations',
	'web-performance',
	'tools',
	'python',
	'go',
	'ios',
	'android',
	'perl',
	'devops',
	'wordpress',
	'nondev'
);

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
	'webperformancenews'
);

echo "updating database...\n";

foreach($routes as $route){
	$response = file_get_contents(BASE_URL . "{$route}/update");
	if($response){
		echo "updated {$route}\n";
	}
}


echo "generating files...\n";
$contents = file_get_contents(BASE_URL . $news_sources[0]);
file_put_contents($path . "/" . STATIC_PATH . "/index.html", $contents);

foreach($news_sources as $src){

	$contents = file_get_contents(BASE_URL . "{$src}");

	$contents = str_replace(BASE_URL, '', $contents);

	file_put_contents($path . "/" . STATIC_PATH . "/{$src}.html", $contents);
	echo "created {$src}.html\n";
}


echo "pushing to git...\n";

$repo = Git::open($path . '/' . STATIC_PATH); 

$repo->add('.');
$repo->commit(time());
$repo->push('origin', 'master');

echo "successfully pushed!\n";