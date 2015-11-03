<?php
namespace core;

class View{

	public function render($_file_,$layouts,$_params_=[]){

        $context=$this->renderPhpFile($_file_, $_params_);
        
        include('./../view/layouts/'.$layouts.'.php');
	}

	    public function renderPhpFile($_file_, $_params_=[])
    {
        ob_start();
        ob_implicit_flush(false);
        extract($_params_, EXTR_OVERWRITE);

        require($_file_);

        return ob_get_clean();
    }
}