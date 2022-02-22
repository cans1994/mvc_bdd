<!doctype html>
<html lang="fr">
<title><?= $title ?? 'Student' ?></title>
<link rel="stylesheet" href="vue/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="icon" href="<?= $favicon ?? 'data:;base64,iVBORw0KGgo=' ?>">

<body>
  <nav>
    <h1>Ma base de données</h1>
    <div class="menu">
      <a href="index.php?table=Tag">Tag</a>
      <a href="index.php?table=Student">Student</a>
      <a href="index.php?table=Project">Projects</a>
      <a href="index.php?table=School_year">School Year</a>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
  <script>
    function addDarkmodeWidget() {
      new Darkmode().showWidget();
    }
    window.addEventListener('load', addDarkmodeWidget);
  </script>

</body>