<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 11/12/2018
 * Time: 14:35
 */
?>

<body>
<ul>
    <li>
        <a href="index.php?controller=utilisateurs&action=UsersList">Lister les utilisateurs</a>
    </li>
    <li>
        <a href="index.php?controller=utilisateurs&action=UserDelete">Supprimer un utilisateur puis les lister</a>
    </li>
    <li>
        <a href="index.php?controller=utilisateurs&action=UserCreate">Ajouter un utilisateur puis les lister</a>
    </li>
</ul>

<br><br>

<ul>
    <li>
        <a href="index.php?controller=products&action=ProductsList">Lister les produits</a>
    </li>
    <li>
        <a href="index.php?controller=products&action=ProductsDelete">Supprimer un produit</a>
    </li>
    <li>
        <a href="index.php?controller=products&action=ProductsCreate">Ajouter un produit puis les lister</a>
    </li>
</ul>

<?php



// On récupere le parametre utilisateur appelé controller
$controller = $_REQUEST['controller'];
$action = $_REQUEST['action'];



switch($controller)
{
    case"utilisateurs":

        require "model/Utilisateurs.php";
        require "controller/UtilisateursController.php";

        $ctrl = new UtilisateursController();

        switch($action)
        {
            case"UsersList":
                $ctrl->UsersList();
                break;

            case"UserDelete":
                $ctrl->UserDelete();
                break;

            case"UserCreate":
                $ctrl->UserCreate();
                break;

            default:
                //Par défaut , je souhaite lister mes utilisteurs
                $ctrl->UsersList();
                break;
        }

        break;

    case "products":

        require "model/Products.php";
        require "controller/ProductsController.php";

        $ctrl = new ProductsController();

        switch($action)
        {
            case"ProductsList":
                $ctrl->ProductsList();
                break;

            case"ProductsDelete":
                $ctrl->ProductsDelete();
                break;

            case"ProductsCreate":
                $ctrl->ProductsCreate();
                break;

            default:
                //Par défaut , je souhaite lister mes utilisteurs
                $ctrl->ProductsList();
                break;
        }

        break;
}
?>

<script>
    function removeUser(id) {
        var xhttp = new XMLHttpRequest();

        document.getElementById('user-' + id).remove();

        xhttp.open("POST", `index.php?controller=utilisateurs&action=UserDelete&id=${id}`, true);
        xhttp.send();
    }

    function removeProduct(id) {
        var xhttp = new XMLHttpRequest();

        document.getElementById('product-' + id).remove();

        xhttp.open("POST", `index.php?controller=products&action=ProductsDelete&id=${id}`, true);
        xhttp.send();

    }
</script>
</body>












