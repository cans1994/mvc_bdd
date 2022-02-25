<?php

require('./modele/Student.php');

$student = new Student();


switch ($op) {
    case 'delete':
        if ($id > 0) {
            $student->delete($id);
            $students = $student->tous();
            require_once('./vue/student_supprime.php');
            require_once('./vue/student_liste.php');
            break;
        }
    case 'update':
        if ($id > 0) {
            $student->select($id);
            require_once('./vue/student_update.php');

            break;
        }
    case 'maj':
        $student->select($id);
        $student->school_year_id = filter_input(INPUT_POST, 'school_year_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->project_id = filter_input(INPUT_POST, 'project_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->created_at = filter_input(INPUT_POST, 'created_at', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $student->updated_at = filter_input(INPUT_POST, 'updated_at', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //filter sanitize retire les balises html
        $student->update();
        header('location: index.php');
        //pr que ca delete ou update
        $students = $student->tous();
        require_once('./vue/student_liste.php');
        //lignes "39-40 réaffichent la liste intégrale mise à j
        break;



    default:
        $students = $student->tous();
        require_once('./vue/student_liste.php');
        break;
}
