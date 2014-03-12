<?php
/**
 * @package ImpressPages
 * @copyright   Copyright (C) 2011 ImpressPages LTD.
 * @license GNU/GPL, see ip_license.html
 */
namespace Plugin\CodeHighlight;

class Event{

    public static function ipBeforeController(){ //executed each time the page loads. Before controller action is being executed.

        ipAddJs('assets/syntaxhighlighter/js/shCore.js');

        // load syntax highlighting brushes

        $brushes = Array( 'shBrushCss', 'shBrushDiff', 'shBrushJScript', 'shBrushPhp', 'shBrushPlain', 'shBrushSass', 'shBrushSql', 'shBrushXml');

        foreach ($brushes as $brush){
            ipAddJs('assets/syntaxhighlighter/js/'.$brush.'.js');
        }

        ipAddJs('assets/highlight.js');

        ipAddCss('assets/syntaxhighlighter/css/shCoreDefault.css');

        ipAddCss('assets/highlight.css');
    }

}