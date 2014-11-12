<?php
include_once("php/authentication.php");
?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
      
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Feuilles de Temps</a></h1>
    </li>
  </ul>
</nav>
      <form method="post" action="index.php">
        <fieldset><legend>Connexion</legend>
          <div class="row">
            <div class="large-6 columns">
              <label>Courriel
                <input type="text" name="username" />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label>Mot de passe
                <input type="password" name="password" />
             </label>
            </div>
          </div>
        </div>
          <input type="submit" value="Connexion" class="button" />
       </fieldset>
      </form>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
