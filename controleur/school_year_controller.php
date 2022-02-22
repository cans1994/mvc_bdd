<?php
require('./modele/school_year.php');

$school_year = new School_year();
switch ($op) {
    case 'delete':
        if ($id > 0) {
            $school_year->delete($id);
            $school_years = $school_year->tous();
            require_once('./vue/school_year_supprime.php');
            require_once('./vue/school_year_liste.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $school_year->select($id);
            require_once('./vue/school_year_update.php');

            break;
        }
    case 'maj':
        $school_year->select($id);
        $school_year->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //filter sanitize retire les balises html
        $school_year->update();
        header('location: index.php');
        //pr que ca delete ou update
        $school_year = $school_year->tous();
        require_once('./vue/school_year_liste.php');
        //lignes "39-40 réaffichent la liste intégrale mise à j
        break;


    default:
        $school_years = $school_year->tous();
        require_once('./vue/school_year_liste.php');
        break;
}
