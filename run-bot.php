<?php
require 'vendor/autoload.php';

define('WEBHOOK', '');
define('VISITORS_URL', '');
define('USERNAME', '');
define('CHANNEL', '');

// Instantiate with defaults, so all messages created
// will be sent from 'Cyril' and to the #accounting channel
// by default. Any names like @regan or #channel will also be linked.
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
	$client->send('Hallå där! Totalt antal registrerade besökare är: ' . $count);
}