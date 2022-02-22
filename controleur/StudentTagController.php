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
            require_once('./vue/student_liste.php');
            break;
        }
    case 'maj':
        $student->select($id);
        $student->name = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
