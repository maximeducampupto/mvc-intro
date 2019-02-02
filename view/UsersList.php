<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 01/02/2019
 * Time: 09:47
 */
?>

<h1>Liste des Utilisateurs</h1>
<ul>
<?php foreach($UsersList as $user){ ?>
    <li id="user-<?= $user->id ?>">
        <?php echo $user->name; ?>
        <button onclick="removeUser(<?= $user->id ?>)">x</button>
    </li>
<?php } ?>
</ul>