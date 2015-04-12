<?php
if (!defined('MEDIAWIKI')) { die(1); }

class PocketButton
{
    public function renderPocketButton(OutputPage &$out, &$text)
    {
        global $wgPocketButton;
        if (is_array($wgPocketButton) && array_key_exists('Style', $wgPocketButton) && in_array($wgPocketButton['Style'], array('horizontal', 'vertical'))) {
            $style = $wgPocketButton['Style'];
        } else {
            $style = 'none';
        }

        // see http://getpocket.com/publisher/button
        $text .= <<<EOT
<a data-pocket-label="pocket" data-pocket-count="${style}" class="pocket-btn" data-lang="en"></a>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
EOT;
        return true;
    }
}
