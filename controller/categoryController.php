<?php
class CategoryController extends AbstractController {


    public function addCategory():string{
        $message = "";
        if(isset($_POST["submit"])) {
           if(!empty($_POST["name"])) {
               $categorie = $this->getListModels()["categoryModel"]->setName($_POST["name"])->getByName();
               if(!$categorie) {
                    $this->getListModels()["categoryModel"]->setName($_POST["name"])->add();
                    $message = "la catégorie a été ajouté";
               }
               else {
                   $message = "La catégorie existe déja en BDD";
               } 
           }
       }
       return $message;
    }

    public function displayCategories():string{
        //Récupération de la liste des utilisateurs
        $data = $this->getListModels()["categoryModel"]->getAll();

        $listCategories = "";
        foreach($data as $category){
            $listCategories = $listCategories."<li>" . $category['name']  ."</li>";
        }
        return $listCategories;
    }



    public function render():void{
        $message = $this->addCategory();

        $this->renderHeader();
        echo $this->getListViews()['category']->setMessage($message)->displayView();
        echo $this->displayCategories();
        $this->renderFooter();
    }
}