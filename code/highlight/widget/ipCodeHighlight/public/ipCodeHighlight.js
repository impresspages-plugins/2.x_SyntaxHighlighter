/**
 *
 * ipCustomMenu widget javascript controller.
 *
 * @package ImpressPages
 * @copyright Copyright (C) 2013 ImpressPages LTD.
 * @license GNU/GPL, see ip_license.html
 */

function IpWidget_ipCodeHighlight(widgetObject) {

    this.widgetObject = widgetObject;

    this.manageInit = manageInit;
    this.prepareData = prepareData;

    /*
     * Executed each time, when your widget goes into management state.
     */
    function manageInit() {
        //get widget data currently stored in the database

        var widget = this.widgetObject;

        var instanceData = this.widgetObject.data('ipWidget').data;

        if (instanceData.code){
            $(widget).find('.ipCode').val(instanceData.code);
        }


        if (instanceData.mode){
            $(widget).find('.ipMode').val(instanceData.mode);

        }

        if (instanceData.showLines=="1"){
            $(widget).find('.showLines').prop('checked', true);
        }

        if (instanceData.hlLine){
            $(widget).find('.hlLine').val(instanceData.hlLine);
        }

        this.widgetObject.find('button').click(function() {
            var lineNum = getLineNumber($(widget).find('.ipCode'));
            $(widget).find('.hlLine').val(lineNum);
        });

    }

    /*
     * This function is executed when user press "confirm" or "save".
     * This function should return data object that needs to be stored into the dabase.
     *
     */
    function prepareData() {

        var data = Object(),
            $hlLine =  $(this.widgetObject.find('.hlLine')).val();

        data.code = this.widgetObject.find('.ipCode').val();
        data.mode = this.widgetObject.find('.ipMode').val();



        if(typeof $hlLine != 'undefined'){
            data.hlLine = $hlLine;
        }else{
            data.hlLine = 0;
        }

        if (this.widgetObject.find('.showLines').prop('checked')){
            data.showLines = 1;
        }else{
            data.showLines = 0;
        }


        $(this.widgetObject).trigger('preparedWidgetData.ipWidget', [ data ]);
    }

    function getLineNumber(textarea) {

        var t = textarea[0];
        return t.value.substr(0, t.selectionStart).split("\n").length;

    }

};
