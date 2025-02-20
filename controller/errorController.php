<?php

class ErrorController extends AbstractController {
    private ViewError $viewError;

    public function render():void{
        $this->renderHeader();
        echo $this->getListViews()['error']->displayView();
        $this->renderFooter();
    }

    public function getViewError(): ViewError { return $this->viewError; }
    public function setViewError(ViewError $viewError): self { $this->viewError = $viewError; return $this; }
}