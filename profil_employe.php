<?php
    include_once('php/authentication_header.php');
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MAJ Feuilles de Temps</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
      
      <?php
        $results = get_employees();
        $this_emp = $results['employes']['1'];
        ?>
<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel1">Information Personnelle</a></dd>
  <dd><a href="#panel2">Information Salariale</a></dd>
</dl>
      
<div class="tabs-content">
  <div class="content active" id="panel1">
    <form name="profil" action="#" method="get">
        <fieldset><legend>Information de base</legend>
          <div class="row">
            <div class="large-6 columns">
              <label>Prénom
                <input type="text" value=<?php echo $this_emp["prenom"]; ?> />
              </label>
            </div>
            <div class="large-6 columns">
              <label>Nom
                <input type="text" value=<?php echo $this_emp["nom"]; ?> />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-6 columns">
              <label>Num&eacute;ro de t&eacute;l&eacute;phone
                <input type="text" value=<?php echo $this_emp["numero_tel"]; ?> />
              </label>
            </div>
            <div class="large-6 columns">
              <label>Courriel
                <input type="text" value=<?php echo $this_emp["courriel"]; ?> />
              </label>
            </div>
          </div>
        </fieldset>
        <fieldset><legend>Adresse</legend>
          <div class="row">
            <div class="large-2 columns">
              <label>Num&eacute;ro de porte
                <input type="text" value=<?php echo $this_emp["numero_porte"]; ?> />
              </label>
            </div>
            <div class="large-6 columns">
              <label>Rue
                <input type="text" value=<?php echo $this_emp["rue"]; ?> />
              </label>
            </div>
            <div class="large-2 columns">
              <label>Appartement
                <input type="text" value=<?php echo $this_emp["appartement"]; ?> />
              </label>
            </div>
            <div class="large-2 columns">
              <label>Code postal
                <input type="text" value=<?php echo $this_emp["code_postal"]; ?> />
              </label>
            </div>
          </div>
        </fieldset>
        <input type="submit" value="Soumettre changements" class="button">
      </form>
      
  </div>
  <div class="content" id="panel2">
<form name="profil" action="#" method="get">
        <fieldset><legend>Information Salariale</legend>
          <div class="row">
            <div class="large-6 columns">
              <label>Titre
                <input type="text" value=<?php echo $this_emp["titre"]; ?> readonly />
              </label>
            </div>
            <div class="large-6 columns">
              <label>Taux horaire
                <input type="text" value=<?php echo $this_emp["taux_horaire"]; ?> readonly />
              </label>
            </div>
          </div>
        </fieldset>
      </form>
  </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>