<?php
namespace Plugin\CodeHighlight\Widget\CodeHighlight;


class Controller extends \Ip\WidgetController
{

    const DEFAULT_MODE = '0';

    public function generateHtml($revisionId, $widgetId, $instanceId, $data, $skin)
    {

        if (!isset($data['code'])){
            $data['code'] = '';
        }

        if (!isset($data['mode'])){
            $data['mode'] = self::DEFAULT_MODE;
        }

        if (!isset($data['hlLine'])){
            $data['hlLine'] = '1';
        }


        if (!isset($data['showLines'])){
            $data['showLines'] = 'false';
        }else{
            if ($data['showLines']){
                $data['showLines'] = 'true';
            }else{
                $data['showLines'] = 'false';
            }
        }

        $data['syntax'] = $this->getSyntax($data['mode']);

        return parent::generateHtml($revisionId, $widgetId, $instanceId, $data, $skin);
    }

    public function previewHtml($instanceId, $data, $layout) {

        global $site;

        if (!isset($data['code'])){
            $data['code'] = '';
        }

        if (!isset($data['mode'])){
            $data['mode'] = self::DEFAULT_MODE;
        }

        if (!isset($data['hlLine'])){
            $data['hlLine'] = '1';
        }


        if (!isset($data['showLines'])){
            $data['showLines'] = 'false';
        }else{
            if ($data['showLines']){
                $data['showLines'] = 'true';
            }else{
                $data['showLines'] = 'false';
            }
        }

        $data['syntax'] = $this->getSyntax($data['mode']);


        return parent::previewHtml($instanceId, $data, $layout);
    }


    public function managementHtml($instanceId, $data, $layout) {

        if (!isset($data['code'])){
            $data['code'] = '';
        }

        if (!isset($data['mode'])){
            $data['mode'] = self::DEFAULT_MODE;
        }

        if (!isset($data['hlLine'])){
            $data['hlLine'] = '1';
        }

        $data['syntaxes'] = $this->getSyntaxes();

        $data['syntax'] = $this->getSyntax($data['mode']);

        return parent::managementHtml($instanceId, $data, $layout);

    }

    /**
     * Sets title in management area
     * @return string
     */

    public function getTitle()
    {
        return __('Code highlight', 'ipAdmin', false);
    }

    protected function getSyntaxes() {

        $syntaxes = Array(
            0 => "html",
            1 => "css",
            2 => "js",
            3 => "php",
            4 => "sql");

        return $syntaxes;
    }

    protected function getSyntax($id){

        $syntaxes = $this->getSyntaxes();

        if (isset($syntaxes[$id])){
            $syntax = $syntaxes[$id];
        }else{
            $syntax = '';
        }

        return $syntax;

    }

}