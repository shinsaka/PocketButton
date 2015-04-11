<?php
/* write below codes to LocalSettings.php
require_once( "$IP/extensions/PocketButton/PocketButton.php" );
$wgPocketButtonStyle = "none";  // none|horizontal|vertical
*/
if (!defined('MEDIAWIKI')) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgHooks['OutputPageBeforeHTML'][] = array(new PocketButton(), 'renderPocketButton');

$wgExtensionCredits['parserhook'][] = array(
        'name'           => 'PocketButton',
        'author'         => 'Manabu Shinsaka',
        'url'            => 'http://mediawiki.org/wiki/Extension:PocketButton',
        'descriptionmsg' => 'PocketButton',
);

class PocketButton
{
    public function renderPocketButton(OutputPage &$out, &$text)
    {
        global $wgPocketButtonStyle;
        if (!in_array($wgPocketButtonStyle, array('horizontal', 'vertical'))) {
            $wgPocketButtonStyle = 'none';
        }

        // see http://getpocket.com/publisher/button
        $text .= <<<EOT
<a data-pocket-label="pocket" data-pocket-count="${wgPocketButtonStyle}" class="pocket-btn" data-lang="en"></a>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
EOT;
        return true;
    }
}
