<?php

class DecoController extends AbstractController {
    public function deconnexion(): self{
        session_start();
        session_destroy();
        header('location:/');
        return $this;
    }
    public function render():void{
        $this->deconnexion();

        $this->renderHeader();
        echo $this->getListViews()['disconnect']->displayView();
        $this->renderFooter();
    }
}