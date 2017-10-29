<?php
/**
* Funciona tanto para Albums como para Generos
*/
class modalView extends View
{

  function __construct()
  {
    parent::__construct();
  }

  function displayEditModal($element, $genres, $template){
    $this->smarty->assign('element', $element);
    //Luego corregir que si el elemento es Genre, no le asigne la variable genres a Smarty
    $this->smarty->assign('genres', $genres);
    $this->smarty->display('templates/sections/abmForms/edit'.$template.'.tpl');
  }

  function displayAddModal($genres, $element){
    //Luego corregir que si el elemento es Genre, no le asigne la variable genres a Smarty
    $this->smarty->assign('genres', $genres);
    $this->smarty->display('templates/sections/abmForms/add'.$element.'.tpl');
  }
}

?>
