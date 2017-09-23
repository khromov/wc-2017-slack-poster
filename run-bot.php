<?php
require 'vendor/autoload.php';

define('WEBHOOK', '');
define('VISITORS_URL', '');
define('USERNAME', '');
define('CHANNEL', '');

$settings = [
		'username' => USERNAME,
		'channel' => CHANNEL,
		'link_names' => true
];

$matches = [];
preg_match('/Antal deltagare: (\d*)/', file_get_contents(VISITORS_URL), $matches);

$count = isset($matches[1]) ? (int)$matches[1] : 0;

if($count) {
	$client = new Maknz\Slack\Client(WEBHOOK, $settings);
	$client->send('Hallå där! Totalt antal registrerade deltagare är: ' . $count);
}
