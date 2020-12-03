<?php


namespace BARAA\LIB;


class Template
{
    private $_template_parts;
    private $_action_view;
    private $_data;

    public function __construct(array $parts)
    {
        $this->_template_parts = $parts;
    }

    public function setActionViewFile($actionView){
        $this->_action_view = $actionView;
    }

    public function setAppData($data){
        $this->_data = $data;
    }

    private function renderTemplateHeaderStart(){
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateHeaderEnd(){
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }

    private function renderTemplateFooter(){
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    private function renderTemplateBlocks($block='',$another=''){
        if (!array_key_exists('template', $this->_template_parts)){
            trigger_error('Sorry There Is No Template Blocks In Your Project',E_USER_WARNING);
        }else{
            extract($this->_data);

            $parts = $this->_template_parts['template'];
            $blocks = explode(',',$block);

            if (!empty($parts)){
                foreach ($parts as $partKey => $file){
                    $bool = true;
                    foreach ($blocks as $block){
                        if ($partKey != $block){
                            $bool = true;
                        }else{
                            $bool = false;
                            break;
                        }
                    }
                    if ($bool){
                        if ($partKey === ':view'){
                            require_once $this->_action_view;
                        }else{
                            require_once $file;
                        }
                    }else{
                        if ($another != ''){
                            $partat = $this->_template_parts[$another];
                            foreach ($partat as $partKey1 => $file1){
                                require_once $file1;
                            }
                        }
                    }
                }
            }
        }
    }

    private function renderHeaderResources(){
        extract($this->_data);

        $output = '';
        if (!array_key_exists('header', $this->_template_parts)){
            trigger_error('Sorry There Is No Header Resources Blocks In Your Project',E_USER_WARNING);
        }else{
            $resources = $this->_template_parts['header'];

            $css = $resources['css'];
            if (!empty($css)){
                foreach ($css as $cssKey => $file){
                    $data = '';
                    if ($cssKey === 'fontawesome'){
                        $data = 'integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous"';
                    }
                    $file = str_replace(':lang','-'.$_SESSION['lang'],$file);
                    $output .= "\n<link rel='stylesheet' href='$file' $data />";
                }
            }

            $js = $resources['js'];
            if (!empty($js)){
                foreach ($js as $jsKey => $file){
                    $async = '';
                    if($jsKey === 'google'){ $async='async'; }
                    $output .= "\n<script $async src='$file'></script>";
                }
            }

        }

        echo $output;

    }

    private function renderFooterResources(){
        extract($this->_data);

        $output = '';
        if (!array_key_exists('footer', $this->_template_parts)){
            trigger_error('Sorry There Is No Header Resources Blocks In Your Project',E_USER_WARNING);
        }else{
            $js = $this->_template_parts['footer']['js'];

            if (!empty($js)){
	            foreach ($js as $jsKey => $file){
                    if (isset($_SESSION['admin']) && explode(' ',str_replace(['\\','/'],' ',str_replace(array('D:\xampp\BaraaZoroub-website\app\config\..\views\\','/home/progwlfo/baraazoroub.com/app/config/../views/'),'',$this->_action_view)))[0] === 'dashboard' && $jsKey === 'script'){
                            $output .= "\n<script src='".JS."admin_script.js'></script>";
                    }else{
                        $output .= "\n<script src='$file'></script>";
                    }
                }
            }

        }

        echo $output;
    }

    public function renderApp($block='',$another=''){
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks($block,$another);
        $this->renderFooterResources();
        $this->renderTemplateFooter();
    }
}