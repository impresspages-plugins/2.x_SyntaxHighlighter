<?php
/**
 * @package ImpressPages
 * @copyright   Copyright (C) 2011 ImpressPages LTD.
 * @license GNU/GPL, see ip_license.html
 */
namespace Modules\code\highlight;

if (!defined('CMS')) exit; //restrict direct access to file

class System{

    function init(){ //executed each time the page loads. Before controller action is being executed.
        global $site;

        $site->addJavascript(BASE_URL.LIBRARY_DIR.'js/jquery/jquery.js'); //this widget requires jquery library.
        $site->addJavascript(BASE_URL.LIBRARY_DIR.'js/jquery-tools/jquery.tools.form.js'); //this widget require jQuery Tools form validation library
        $site->addJavascript(BASE_URL.PLUGIN_DIR.'code/highlight/public/syntaxhighlighter/js/shCore.js');

        // load syntax highlighting brushes

        $brushes = Array( 'shBrushCss', 'shBrushDiff', 'shBrushJScript', 'shBrushPhp', 'shBrushPlain', 'shBrushSass', 'shBrushSql', 'shBrushXml');

        foreach ($brushes as $brush){
            $site->addJavascript(BASE_URL.PLUGIN_DIR.'code/highlight/public/syntaxhighlighter/js/'.$brush.'.js');
        }

        $site->addJavascript(BASE_URL.PLUGIN_DIR.'code/highlight/public/highlight.js');

        $site->addCss(BASE_URL.PLUGIN_DIR.'code/highlight/public/syntaxhighlighter/css/shCoreDefault.css');
        $site->addCss(BASE_URL.PLUGIN_DIR.'code/highlight/public/highlight.css');
    }

}