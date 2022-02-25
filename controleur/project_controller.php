<?php
require('./modele/project.php');

$project = new Project();

function afficherLesProjets(string $terme = '')
{
    global $project;
    //echo '<br>dans a afficherLesProjets   ' . $terme;
    if ($terme === '') {
        $projects = $project->tous();
    } else {
        //echo '<br>appel sélectionner ' . $terme;
        $projects = $project->selectionner($terme);
    }
    require_once('./vue/project_liste.php');
}


function formulaireRechercheProjet()
{
    global $project;
    if (isset($_POST["s"]) and $_POST["s"] == "Rechercher") {
        $_POST["terme"] = htmlspecialchars($_POST["terme"]); //pour sécuriser le formulaire contre les failles html
        $terme = $_POST["terme"];
        $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
        $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
        echo $terme;
        //echo '<br>appel afficherLesProjets   ' . $terme;
        afficherLesProjets($terme);
    } else {
        require_once('./vue/project_search.php');
    }
}

switch ($op) {
    case 'delete':
        if ($id > 0) {
            $project->delete($id);
            require_once('./vue/project_supprime.php');
            afficherLesProjets();
            break;
        }
    case 'update':
        if ($id > 0) {
            $project->select($id);
            require_once('./vue/project_update.php');
            break;
        }
    case 'maj':
        $project->select($id);
        $project->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $project->description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $project->client_name = filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //filter sanitize retire les balises html
        $project->update();
        //header('location: index.php');
        //pr que ca delete ou update
        afficherLesProjets();
        //lignes "39-40 réaffichent la liste intégrale mise à j
        break;

    case 'insert':
        if (empty($_POST))
            require_once('./vue/project_insert.php');
        else {
            echo 'Valider le formulaire';
            $project->name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $project->description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $project->client_name = trim(filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $project->start_date = trim(filter_input(INPUT_POST, 'start_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $project->checkpoint_date = trim(filter_input(INPUT_POST, 'checkpoint_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $project->delivery_date = trim(filter_input(INPUT_POST, 'delivery_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $project->insert();
        }
        afficherLesProjets();
        break;

    default:
        formulaireRechercheProjet();
        break;
}
