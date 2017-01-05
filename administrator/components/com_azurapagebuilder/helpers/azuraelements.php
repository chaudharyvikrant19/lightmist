<?php

defined('_JEXEC') or die;

/**
* AzuraElements
*/


class AzuraElements
{
    private static $elementCats = array();
    private static $elementTotal = array();
    private static $elementParent = array();

    private static $colEleTotal = array();
    private static $colEleParent = array();

    public static function getElements($loadchild = false){
        if($loadchild){
            return self::$elementTotal;
        }else{
            return self::$elementParent;
        }
    }

    public static function getColElements($loadchild = false){
        if($loadchild){
            return self::$colEleTotal;
        }else{
            return self::$colEleParent;
        }
    }

    public static function getElementCats() {
        return array_keys(self::$elementCats);
    }

    public static function loadElements($loadchild = false){

        $elements = array();
        $coleles = array();

        $elementsForm = JForm::getInstance('com_azurapagebuilder.elements', 'elements');

        // Import the azura plugin group.
        JPluginHelper::importPlugin('azura');

        // Get the dispatcher.
        $dispatcher = JEventDispatcher::getInstance();

        // Trigger the form preparation event.
        $results = $dispatcher->trigger('onAzuraPrepareElementsForm', array($elementsForm));

        // Check for errors encountered while preparing the form.
        if (count($results) && in_array(false, $results, true))
        {
            // Get the last error.
            $error = $dispatcher->getError();

            if (!($error instanceof Exception))
            {
                throw new Exception($error);
            }
        }


        foreach ($elementsForm->getGroup('azura_elements') as $field){

            //echo'<pre>';var_dump($eleName);die;

            $eleTypeName = $field->getAttribute('typename', 'AzuraElement');

            if(!isset($elements[$eleTypeName])||!isset($coleles[$eleTypeName])){
                $newEle                 = new stdClass;
                $newEle->name           = $field->getAttribute('name', 'Element');
                $newEle->description    = $field->getAttribute('description', '');
                $cat                    = $field->getAttribute('category', 'default');
                //$cat                    = explode(",", $cat);
                if($cat != 'forcolumn'){
                    if(!isset(self::$elementCats[$cat])){
                        self::$elementCats[$cat] = $cat;
                    }
                }
                $newEle->category       = $cat;
                $newEle->typename       = $eleTypeName;
                $eleTypeIcon            = strtolower(substr($eleTypeName, 5)).'-icon.png';
                $eleIcon                = $field->getAttribute('icon');
                $mediaIconPath          = JPATH_SITE.'/media/com_azurapagebuilder/elements-icon/';
                $mediaIconLink          = JURI::root(true).'/media/com_azurapagebuilder/elements-icon/';
                if($eleIcon && file_exists($mediaIconPath.$eleIcon)){
                    $newEle->icon = $mediaIconLink.$eleIcon;
                }elseif(file_exists($mediaIconPath.$eleTypeIcon)){
                    $newEle->icon = $mediaIconLink.$eleTypeIcon;
                }else{
                    $newEle->icon = $mediaIconLink.'cth-icon.png';
                }
                //$newEle->icon           = $field->getAttribute('icon', 'cth-icon.png');
                $newEle->iconclass      = $field->getAttribute('iconclass', 'fa fa-joomla');
                $hasownchild            = strtolower($field->getAttribute('hasownchild','NO'));
                $newEle->hasownchild    = $hasownchild;
                $newEle->isownchild     = 'no';
                // is page section
                $newEle->ispagesection  = strtolower($field->getAttribute('ispagesection','NO'));
                // don't add layout to section
                $newEle->hasonechild  = strtolower($field->getAttribute('hasonechild','NO'));

                if( $hasownchild === 'yes'){
                    $newEle->childname                  = $field->getAttribute('childname', 'Element Child Item');
                    $newEle->childtypename              = $field->getAttribute('childtypename', 'AzuraElementItem');
                }

                if($cat == 'forcolumn'){
                    $coleles[$eleTypeName] = $newEle;
                }else{
                    $elements[$eleTypeName] = $newEle;
                }

                
                if($loadchild){
                    if( $hasownchild === 'yes'){

                        $childEleTypeName = $field->getAttribute('childtypename', 'AzuraElementItem');

                        if(!isset($elements[$childEleTypeName])||!isset($coleles[$childEleTypeName])){
                            $newEle                 = new stdClass;
                            $newEle->hasownchild    = 'no';
                            $newEle->isownchild    = 'yes';
                            $newEle->name           = $field->getAttribute('childname', 'Element Child Item');
                            $newEle->typename       = $childEleTypeName;
                            $newEle->ischildof      = $eleTypeName;

                            if($cat == 'forcolumn'){
                                $coleles[$childEleTypeName] = $newEle;
                            }else{
                                $elements[$childEleTypeName] = $newEle;
                            }
                            //$elements[$childEleTypeName] = $newEle;
                        }
                    }
                }
            }


        }

        if($loadchild){
            self::$elementTotal = $elements;
            self::$colEleTotal = $coleles;
        }else{
            self::$elementParent = $elements;
            self::$colEleParent = $coleles;
        }

        //return $elements;

    }
	
}

//AzuraElements::loadElements();