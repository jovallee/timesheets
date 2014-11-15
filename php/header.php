<?php

# Set the timezone to system timezone, but default to EDT
$timezone = 'EST';
if (is_link('/etc/localtime')) {
    // Mac OS X (and older Linuxes)    
    // /etc/localtime is a symlink to the 
    // timezone in /usr/share/zoneinfo.
    $filename = readlink('/etc/localtime');
    if (strpos($filename, '/usr/share/zoneinfo/') === 0) {
        $timezone = substr($filename, 20);
    }
} elseif (file_exists('/etc/timezone')) {
    // Ubuntu / Debian.
    $data = file_get_contents('/etc/timezone');
    if ($data) {
        $timezone = $data;
    }
} elseif (file_exists('/etc/sysconfig/clock')) {
    // RHEL / CentOS
    $data = parse_ini_file('/etc/sysconfig/clock');
    if (!empty($data['ZONE'])) {
        $timezone = $data['ZONE'];
    }
}
 
date_default_timezone_set($timezone);
?>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="profil_employe.php">Feuilles de Temps</a></h1>
    </li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"><a href="timesheet.php">Mes Feuilles de Temps</a></li>
      <li class="active"><a href="profil_employe.php">Mon Profil Personnel</a></li>
      <li class="has-dropdown">
        <a href="#">Param&egrave;tres</a>
        <ul class="dropdown">
          <li><a href="#">Langue</a></li>
          <li class="active"><a href="php/logout.php">Terminer la Session</a></li>
        </ul>
      </li>
    </ul>
  </section>
</nav>