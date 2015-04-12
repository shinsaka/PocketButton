<?php
/* write below codes to LocalSettings.php
require_once( "$IP/extensions/PocketButton/PocketButton.php" );
$wgPocketButton['Style'] = "none";  // none|horizontal|vertical
*/
if (!defined('MEDIAWIKI')) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$dir = dirname(__FILE__) . '/';
$wgAutoloadClasses['PocketButton'] = $dir . 'PocketButton.body.php';
$wgExtensionMessagesFiles['PocketButton'] =  $dir . 'PocketButton.i18n.php';

$wgHooks['OutputPageBeforeHTML'][] = array(new PocketButton(), 'renderPocketButton');

$wgExtensionCredits['parserhook'][] = array(
        'path' => __FILE__,
        'name' => 'PocketButton',
        'author' => '[http://github.com/shinsaka Manabu Shinsaka]',
        'url' => 'https://www.mediawiki.org/wiki/Extension:PocketButton',
        'descriptionmsg' => 'pocketbutton-desc',
        'version'  => '1.0.1',
        'license-name' => 'GPLv2+',
);
