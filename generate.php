<?php
include 'config.php';

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
	'webdesign',
	'uxdesign',
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
	'nondev',
	'longreads-tech',
	'pockethits'
);


echo "generating files...\n";
$contents = file_get_contents(BASE_URL . $news_sources[0]);
file_put_contents($path . "/" . STATIC_PATH . "/index.html", $contents);

foreach($news_sources as $src){

	$contents = file_get_contents(BASE_URL . "{$src}");

	$contents = str_replace(BASE_URL, '', $contents);

	file_put_contents($path . "/" . STATIC_PATH . "/{$src}.html", $contents);
	echo "created {$src}.html\n";
}
echo "done generating files\n";


echo "generating json\n";

$categories_json = file_get_contents(BASE_URL . "/json/update");
$categories = json_decode($categories_json, true);


$sources_json = file_get_contents(BASE_URL . "/files/sources.json");
file_put_contents($path . "/" . STATIC_PATH . "/" . JSON_PATH . "/sources.json", $sources_json);

foreach($categories as $category){

	$json = file_get_contents(BASE_URL . "/files/{$category}.json");
	file_put_contents($path . "/" . STATIC_PATH . "/" . JSON_PATH . "/{$category}.json", $json);
}

echo "done generating json\n";
