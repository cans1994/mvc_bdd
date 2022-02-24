<?php

require_once('vue/head.php');
require_once('modele/Connexionbdd.php');

//echo dirname($_SERVER['PHP_SELF']) . '<br>';
//echo $_SERVER['REQUEST_URI'] . '<br>';

$basedir = dirname($_SERVER['PHP_SELF']) . '<br>';
$uri = $_SERVER['REQUEST_URI'];
$route = str_replace($basedir, '', $uri);

/*echo $route . '<br>';*/

//resetDb();

$table = ucfirst($_GET['table'] ?? '');
$id = intval($_GET['id'] ?? -1);
$op = $_GET['op'] ?? '';
//op=opération


switch ($table) {
    case 'Tag':
        require('controleur/TagController.php');
        break;
    case 'Student':
        require('controleur/StudentController.php');
        break;
    case 'Project':
        require('./controleur/project_controller.php');
        break;
    case 'School_year':
        require('controleur/school_year_controller.php');
        break;
    default:
        require('controleur/StudentController.php');
        break;
}




/*if ($table === 'tag' || $table === '') {
    require('controleur/TagController.php');
}*/

/*if ($table === 'student' || $table === '') {
    require('controleur/StudentController.php');
}

if ($table === 'project' || $table === '') {
    require('controleur/project_controller.php');
}

if ($table === 'project' || $table === '') {
    require('controleur/school_year_controller.php');
}*/

/*if ($table === 'tag' || $table === '') {
    require('modele/Tag.php');
    $tag = new Tag();
    /*  $tag->name = 'testInsert';
    $tag->description = 'testInsert';
    $tag->insert();  ces lignes consistent à voir si le test fonctionne*/
/*switch ($op) {
    case 'delete':
        if ($id > 0) {
            $tag->delete($id);
            $tags = $tag->tous();
            require_once('vue/tag_supprime.php');
            require_once('vue/tag_liste.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $tag->select($id);
            require_once('vue/tag_update.php');

            break;
        }
    case 'maj':
        $tag->select($id);
        $tag->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        //filter sanitize retire les balises html
        $tag->update();
        header('location: index.php');
        //pr que ca delete ou update
        $tags = $tag->tous();
        require_once('vue/tag_liste.php');
        //lignes "39-40 réaffichent la liste intégrale mise à j
        break;


    default:
        $tags = $tag->tous();
        require_once('vue/tag_liste.php');
        break;
}*/


require_once('vue/foot.php');
