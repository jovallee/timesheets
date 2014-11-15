<?php
    include_once('php/authentication_header.php');
    include_once('php/get_data.php');
    include_once('php/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MAJ Feuilles de Temps</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/foundation-datepicker.css" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="row">
      <div class="small-5 columns end">
        <div class="panel">
            <input type="text" class="span2" value=
            <?php 
            $selected_date = date('Y-m-d');

            $wk_start_date = get_wk_start_from_date($selected_date);

            echo '"' . $selected_date . '"'; 
            ?> 
            id="dp1">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="small-12 columns end">
        <dl class="tabs" data-tab>
          <dd class="active"><a href="#panel1">D</br>-</a></dd>
          <dd><a href="#panel2">L</br>8</a></dd>
          <dd><a href="#panel3">M</br>8</a></dd>
          <dd><a href="#panel4">M</br>8</a></dd>
          <dd><a href="#panel5">J</br>8</a></dd>
          <dd><a href="#panel6">V</br>8</a></dd>
          <dd><a href="#panel7">S</br>-</a></dd>
          <dd><a href="#panel8">T</br>40</a></dd>
        </dl>

        <!--- DIMANCHE -->
        <div class="tabs-content">
          <div class="content active" id="panel1">
            <form>
              <div class='row'>
                <div class='small-6 columns'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>

          <!--- LUNDI -->
          <div class="content" id="panel2">
            <form>
              <div class='row'>
                <div class='small-6 columns end'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>

          <!--- MARDI -->
          <div class="content" id="panel3">
            <form>
              <div class='row'>
                <div class='small-6 columns end'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>

          <!--- MERCREDI -->
          <div class="content" id="panel4">
            <form>
              <div class='row'>
                <div class='small-6 columns end'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>

          <!--- JEUDI -->
          <div class="content" id="panel5">
            <form>
              <div class='row'>
                <div class='small-6 columns end'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>

          <!--- VENDREDI -->
          <div class="content" id="panel6">
            <form>
              <div class='row'>
                <div class='small-6 columns end'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>

          <!--- SAMEDI -->
          <div class="content" id="panel7">
            <form>
              <div class='row'>
                <div class='small-6 columns end'>
                  <label>Projet
                    <select name='projects'>
                    <option disabled selected> --- </option>
                      <?php
                        $project_string = '';
                        $projects = get_projects();
                        foreach ($projects as $key => $this_project) 
                        {
                          $project_string .= '<option value="' . $key . '">' . $key . ' - ' . $this_project . '</option>';
                        }
                        echo $project_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>
                  <label>Heure d&eacute;but
                    <select name='heure_debut'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
               </div>
              <div class='row'>            
                <div class='small-4 columns end'>             
                  <label>Heure Fin
                    <select name='heure_fin'>
                    <option disabled selected> --- </option>
                      <?php
                        $times = get_times();
                        $time_string = '';
                        foreach ($times as $time) 
                        {
                          $time_string .= '<option value="' . $time . '">' . $time . '</option>';
                        }
                        echo $time_string;
                      ?>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Temps de pause
                    <select name='temps_pause'>
                      <option disabled selected> --- </option>
                      <option value='00:15'>Pas de pause</option>
                      <option value='00:15'>00:15</option>
                      <option value='00:30'>00:30</option>
                      <option value='00:45'>00:45</option>
                      <option value='01:00'>01:00</option>
                      <option value='01:15'>01:15</option>
                      <option value='01:30'>01:30</option>
                      <option value='01:45'>01:45</option>
                      <option value='02:00'>02:00</option>
                      <option value='02:15'>02:15</option>
                      <option value='02:30'>02:30</option>
                      <option value='02:45'>02:45</option>
                      <option value='03:00'>03:00</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Total
                    <input type='text'/>
                  </label>
                </div>
              </div>
              <div class='row'>            
                <div class='small-4 columns end'>  
                  <label>Notes
                    <input type='text' />
                  </label>
                </div>
              </div>
              <a href="#" class="button split">Soumettre<span data-dropdown="drop"></span></a><br>
              <ul id="drop" class="f-dropdown" data-dropdown-content>
                <li><a href="#">Soumettre et ajouter un projet</a></li>
              </ul>
            </form>
          </div>
          <div class="content" id="panel8">
            <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
          </div>
        </div>
      </div>
    </div>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation-datepicker.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script>
      $(document).ready(function() {
        $('#dp1').fdatepicker({format: 'yyyy-mm-dd'});
      });
    </script>
  </body>
</html>