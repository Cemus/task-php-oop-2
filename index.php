<?php
session_start();

include './env.php';
include './utils/utils.php';
include './interface/interfaceView.php';
include './interface/interfaceBDD.php';

include './abstract/abstractController.php';
include './abstract/abstractModel.php';

include './model/accountModel.php';
include './model/categoryModel.php';


include './view/viewHeader.php';
include './view/viewAccount.php';
include './view/viewFooter.php';
include './view/viewMyAccount.php';
include './view/viewDeco.php';
include './view/viewError.php';
include './view/viewCategory.php';


include './utils/mySQLBDD.php';
include './controller/accountController.php';

$url = parse_url($_SERVER['REQUEST_URI']);
$path = isset($url['path']) ? $url['path'] : '/';

$listModels = [
    'accountModel' => new AccountModel(new MySQLBDD()),
    'categoryModel' => new CategoryModel(new MySQLBDD()),
];
$listViews = [
    'header' => new ViewHeader(), 
    'footer' => new ViewFooter(), 
    'accueil' => new ViewAccount(), 
    'my-account' => new ViewMyAccount(),
    'disconnect' => new ViewDeco(),
    'category' => new ViewCategory(),

];

switch ($path) {
    case '/' :
        $home = new AccountController($listModels, $listViews); 
        $home->render();
        break;
    
    case '/moncompte' :
        include "./controller/myAccountController.php";
        $myAccount = new MyAccountController($listModels, $listViews); 
        $myAccount->render();
        break;
    
    case '/deconnexion' :
        include "./controller/decoController.php";
        $deconnexion = new DecoController($listModels, $listViews); 
        $deconnexion->render();
        break;

        case '/category' :
        include "./controller/categoryController.php";
        $category = new CategoryController($listModels, $listViews); 
        $category->render();
        break;
    
    default :
        echo "???";
        break;
}
