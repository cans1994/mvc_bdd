<?php

require('./modele/Tag.php');

$tag = new Tag();

switch ($op) {
    case 'delete':
        if ($id > 0) {
            $tag->delete($id);
            $tags = $tag->tous();
            require_once('./vue/tag_supprime.php');
            require_once('./vue/tag_liste.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $tag->select($id);
            require_once('./vue/tag_update.php');

            break;
        }
    case 'maj':
        $tag->select($id);
        $tag->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //filter sanitize retire les balises html
        $tag->update();
        header('location: index.php');
        //pr que ca delete ou update
        $tags = $tag->tous();
        require_once('./vue/tag_liste.php');
        //lignes "39-40 réaffichent la liste intégrale mise à j
        break;



    default:
        $tags = $tag->tous();
        require_once('./vue/tag_liste.php');
        break;
}
