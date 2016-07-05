<?php

namespace common\lib\widgets;

use yii\helpers\Html;
use common\lib\assets\IconpickerAsset;

/**
 * This is just an example.
 */
class Iconpicker extends \yii\widgets\InputWidget
{
    public $buttonText = "选择图标";
    /**
     * @var int $columns number of display colums
     */
    public $columns= 10;
    /**
     * @var int $rows number of display rows
     */
    public $rows= 5;
    /**
     * @var string  $iconset maybe 'fontawesome'  or 'glyphicon'
     */
    public $iconset= 'fontawesome'; //fontawesome glyphicon
    /**
     * @var string $placement   pop-up placement
     */
    public $placement='top';
    // placement: '{$this->placement}'
    /**
     * @var array $pickerOptions  additional html options for picker button
     */
    public $pickerOptions = ['class'=>'btn btn-default btn-sm'];

    /**
     * @var array $containerOptions  additional html options for container
     */
    public $containerOptions=[];

    /**
     * @var bool $removePrefix   - remove font-set prefix and return clear icon name (such as "cloud" istead of "fa-cloud" "cog" instead of "glyphicon-cog")
     */
    public $removePrefix = false;

    /**
     * @var
     */
    private $_id;
    /**
     * @var string
     */
    private $_default='fa-ellipsis-h';

    /**
     *
     */
    public function init(){
        if (!isset($this->options['id']) && !$this->hasModel()) {
            $this->options['id'] = 'iconpicker_'.$this->getId();
        }
        parent::init();
        $this->_id=$this->options['id'];
        if($this->hasModel() && !empty($this->model->{$this->attribute})){
            $this->_default=$this->pickerOptions['data-icon']=$this->model->{$this->attribute};
        }
        if(!$this->hasModel() && !empty($this->value)){
            $this->_default=$this->pickerOptions['data-icon']=$this->value;
        }
        if(!isset($this->pickerOptions['id'])){
            $this->pickerOptions['id']=$this->_id.'_jspicker';
        }
        if(!isset($this->pickerOptions['class'])){
            $this->pickerOptions['class']= 'btn btn-default btn-sm';
        }
        if($this->removePrefix){
            $this->_default=($this->iconset=='fontawesome')?'fa-'.$this->_default:'glyphicon-'.$this->_default;
        }
        $this->registerAssets();
    }

    /**
     * @return string bootstrap-picker button with hiddenInput field where we put selected value
     */
    public function run()
    {

        if($this->hasModel()) {
            $inp= Html::activeHiddenInput($this->model, $this->attribute, $this->options);
        }else{
            $inp= Html::hiddenInput($this->name, $this->value, $this->options);
        }
        $picker=Html::button($this->buttonText,$this->pickerOptions);

        return  Html::tag('div',$picker.$inp,$this->containerOptions);
    }

    public function convertIconset($iconset){
        $prefix = "";
        switch ($iconset) {
            case "fontawesome":
                $prefix = "fa ";
                break;
            case "glyphicon":
                $prefix = "glyphicon ";
                break;
        }
        return $prefix;
    }


    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        $id=$this->_id;
        $pickid=$this->pickerOptions['id'];
        IconpickerAsset::register($view);

        //$iconset = $this->convertIconset($this->iconset);
        
        $js[]=<<<JS
           $("#{$pickid}").iconpicker({
                iconset: '{$this->iconset}',
                icon: '{$this->_default}',
                rows: '{$this->rows}',
                cols: '{$this->columns}'
            });
JS;
        $js[]=($this->removePrefix)?<<<JS
           $("#{$pickid}").on('change', function(e) {
                var icon=e.icon.replace('fa-','').replace('glyphicon-','');
                $('#$id').val(icon);
            });
JS
            :
            <<<JS
            $("#{$pickid}").on('change', function(e) {
                $('#$id').val(e.icon);
            });
JS;

       $view->registerJs(implode("\n",$js));
    }
}
