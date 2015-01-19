<?php

/**
 * <b>Frm</b>
 * Essa classe foi criada para agilzar a criação de formulários HTML com cógigo PHP.
 * @author André Fauze Marcelino marcelinoandre@gmail.com>
 * Desenvolvido em:  nov/2014
 * 
 * Tags que podem ser criadas:
 *  Form,
 * input type Hiden,
 * input type Password,
 * input type Label,
 * input type Text,
 * input type EmailLabel,
 * input type Email,
 * input type TextArea,
 * input type Button,
 * input type Submit,
 * inputRadio,
 * inputCheckbox,
 * input type File
 * Select,
 * fieldset
 */
class Frm {

    /**
     * 
     * @param string $nome Nome do fomrulário 
     * @param string $method metodo post ou get 
     * @param string $action action do formulario
     * @param array $arrAtributosAdicionais classe ou atributo adicionais ex: array('class'=>'bgCinza')
     */
    static public function form($nome = 'form', $method = 'post', $action = '', $arrAtributosAdicionais = null) {
        $form = "<form name='{$nome}' method='{$method}' action='{$action}'{$arrAtributosAdicionais}>\n\t";
        echo $form;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     */
    static public function inputHidden($name, $value) {
        $input = "<input type='hidden' name='{$name}' value='{$value}'>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $arrAtributos
     */
    static public function inputPassword($name, $arrAtributos) {
        $attr = self::setAtibutos($arrAtributos);
        $input = "<input type='password' name='{$name}' id='{$name}'  {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $arrAtributos
     */
    static public function inputPasswordLabel($name, $arrAtributos) {
        $attr = self::setAtibutos($arrAtributos);
        $input = "<label for='{$name}'>" . ucfirst($name) . "</label>\n\t";
        $input .= "<input type='password' name='{$name}' id='{$name}'  {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $label
     */
    static public function inputLabel($label) {
        $inputLabel = "<label for='{$label}'>" . ucfirst($label) . "</label>\n\t";
        echo $inputLabel;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputTextLabel($name, $value = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;

        echo $inputLabel = "<label for='{$name}'>" . ucfirst($name) . "</label>\n\t";
        $input = "<input type='text' name='{$name}' id='{$name}' value='{$value}' {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputEmailLabel($name, $value = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;

        echo $inputLabel = "<label for='{$name}'>" . ucfirst($name) . "</label>\n\t";
        $input = "<input type='email' name='{$name}' id='{$name}' value='{$value}' {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputText($name, $value = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;
        $input = "<input type='text' name='{$name}' id='{$name}' value='{$value}' {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputEmail($name, $value = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;
        $input = "<input type='email' name='{$name}' id='{$name}' value='{$value}' {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param string $name nome do campo
     * @param array $arrBotoes  | array com chave e valores  do botãao
     * @param string $checked   | chave do botão que ficará habilitado
     * @param type $classeCss | nome da classe para estilização
     */
    static public function inputRadio($name, array $arrBotoes, $checked = false,$classeCss = null) {
        $numBtn = count($arrBotoes) - 1;
        $radio = ucwords($name) . ': ';
        $classCss = ( isset($classeCss) ) ? " class='{$classeCss}' " : null;
        for ($i = 0; $i <= $numBtn; $i++):
            $in = $i + 1; //indice
            $radio .= "<label {$classCss}>\n\t";
            if( $arrBotoes[$i] == $checked ) : $setaChk = 'checked="checked"'; else:  $setaChk = FALSE;  endif;
            $radio .="<input type='radio' name='{$name}' id='{$name}radio{$in}' $setaChk value='{$arrBotoes[$i]}'>  " . ucwords($arrBotoes[$i]) . "\n\t";
            $radio .="</label>\n\t";
        endfor;
        echo $radio;
    }

    /**
     * 
     * @param type $name
     * @param array $arrBotoes
     * @param type $classeCss
     */
    static public function inputCheckbox($name, array $arrBotoes,  $checked =  array(), $classeCss = null) {
        $numBtn = count($arrBotoes) - 1;
        $checkbox = ucwords($name) . ': ';
        $classCss = ( isset($classeCss) ) ? " class='{$classeCss}'" : null;
        for ($i = 0; $i <= $numBtn; $i++):
            $in = $i + 1; //indice
            if( in_array($arrBotoes[$i], $checked)  ) : $setaChk = 'checked="checked"'; else:  $setaChk = FALSE;  endif;
            $checkbox .= "<label {$classCss}>\n\t";
            $checkbox .="<input type='checkbox' name='{$name}' id='{$name}checkbox{$in}' $setaChk value='{$arrBotoes[$i]}'>  " . ucwords($arrBotoes[$i]) . "\n\t";
            $checkbox .="</label>\n\t";
        endfor;
        echo $checkbox;
    }

    /**
     * 
     * @param type $name
     * @param type $arrAtributos
     */
    static public function inputFile($name, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $input = "<input type='file' name='{$name}' id='{$name}'  {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $arrAtributos
     */
    static public function inputFileLabel($name, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $input = "<label for='{$name}'>" . ucwords($name) . "</label>\n\t";
        $input .= "<input type='file' name='{$name}' id='{$name}'  {$attr}>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param array $arrItens
     * @param type $vlDefault
     * @param type $itemDefault
     * @param type $arrAtributos
     */
    static public function inputSelect($name, array $arrItens, $selected = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $input = "<select name='{$name}' id='{$name}' {$attr}>\n\t";
        foreach ($arrItens as $k => $v):
            if($k == $selected): $default = 'selected=selected' ; else: $default = NULL; endif;
            $input .= "<option $default value='{$k}'>{$v}</option>";
        endforeach;
        $input .= "</select>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param array $arrItens
     * @param type $vlDefault
     * @param type $itemDefault
     * @param type $arrAtributos
     */
    static public function inputSelectLabel($name, array $arrItens, $selected = NULL, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $post = filter_input(INPUT_POST, strtolower($name));
        if($post):
            $selected = $post;
        endif;
        $input = "<label for='{$name}'>" . ucwords($name) . "</label>\n\t";
        $input .= "<select name='{$name}' id='{$name}' {$attr}>\n\t";
        foreach ($arrItens as $k => $v):
            if($k == $selected): $default = 'selected=selected' ; else: $default = NULL; endif;
           
            $input .= "<option {$default} value='{$k}'>{$v}</option>";
        endforeach;
        $input .= "</select>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputTextArea($name, $value = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $post = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
        $valor = isset($post) ? $post : $value;
        $input = "<textarea name='{$name}' id='{$name}' {$attr}>" . $valor . "</textarea>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $name
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputTextAreaLabel($name, $value = null, $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $post = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
        $valor = isset($post) ? $post : $value;
        $input = "<label for='{$name}'>" . ucwords($name) . "</label>\n\t";
        $input .= "<textarea name='{$name}' id='{$name}' {$attr}>" . $valor . "</textarea>\n\t";
        echo $input;
    }

    /**
     * 
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputButton($value = 'Enviar', $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        " <button type='submit' class='btn btn-default btn-lg'>Enviar Mensagem <span class='glyphicon glyphicon-envelope'></span> </button>";
        $input = "<button type='submit' {$attr}>" . $value . "</button>";
        echo $input;
    }

    /**
     * 
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputSubmit($value = 'Enviar', $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $input = " <input type='submit' value='{$value}' {$attr} >";
        echo $input;
    }

    /**
     * 
     * @param type $value
     * @param type $arrAtributos
     */
    static public function inputReset($value = 'Enviar', $arrAtributos = null) {
        $attr = self::setAtibutos($arrAtributos);
        $input = " <input type='reset' value='{$value}' {$attr} >";
        echo $input;
    }

    /**
     * 
     * @param type $legend
     */
    static public function fieldset($legend = null) {
        $fieldset = "<fieldset><legend>{$legend}</legend>";
        echo $fieldset;
    }

    /**
     * 
     */
    static public function fieldsetEnd() {
        echo $fieldsetEnd = '</fieldset>';
    }

    /**
     * 
     * @param type $arrAtributos
     * @return string
     */
    static public function setAtibutos($arrAtributos) {
        $attr = null;
        if (is_array($arrAtributos) && isset($arrAtributos)):
            foreach ($arrAtributos as $k => $v):
                $attr .= $k . "='{$v}' ";
            endforeach;
        endif;
        return $attr;
    }

    /**
     * 
     */
    static public function formEnd() {
        echo '</form>';
    }

}
