
<?php
class MyAccountController extends AbstractController {
    private ViewMyAccount $viewMyAccount;

    public function render(): void{
        $this->renderHeader();
        echo $this->getListViews()['my-account']->displayView();
        $this->renderFooter();
    }


    public function getViewMyAccount(): ViewMyAccount { return $this->viewMyAccount; }
    public function setViewMyAccount(ViewMyAccount $viewMyAccount): self { $this->viewMyAccount = $viewMyAccount; return $this; }
}