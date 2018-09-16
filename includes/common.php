<?php
  function commonHeader() {
    print("
      <meta charset='utf-8'>
      <title>Engineers Without Borders</title>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
      <link href='https://fonts.googleapis.com/css?family=Proxima+Nova' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet' type='text/css'>
      <link rel='stylesheet' type='text/css' href='styles/style.css'>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
      <script src='scripts/main.js'></script>");
  }
  function commonTop() {
    print("
      <div class='topnav blue'>
          <div class='nav-head'>
              <button type='button' class='nav-toggle center-h'>
                      <span class='icon'></span>
                      <span class='icon'></span>
                      <span class='icon'></span>
              </button>
              <img class='img-fluid-h' src='images/ewb_logo.png' alt='logo'>
              <a href='index.php'>Engineers Without Borders<br>
                  <em class='red'>Cornell University</em>
              </a>
          </div>

          <ul class='nav-right'>
              <li><a id='home' href='index.php'>ABOUT US</a></li>
              <li><a id='members' href='members.php'>MEMBERS</a></li>
              <li><a id='subteams' href='subteams.php'>SUBTEAMS</a></li>
              <li><a id='sponsors' href='sponsors.php'>SPONSORS</a></li>
              <li><a id='contact' href='contact.php'>CONTACT</a></li>
          </ul>
      </div>");
  }
  function commonBottom() {
    print("
    	<div class='botnav white'>
            <div class='nav-head'>
                <p class='center-h'>©2012-2017 Engineers Without Borders Cornell</p>
            </div>
            <ul class='nav-right'>
                <li class='center-h'><a href='https://www.youtube.com/channel/UC3gHgRQ1OLOwzolN8N2YPNQ' target = '_blank'>Youtube</a></li>
                <li class='center-h'><a href='https://twitter.com/ewbcornell?lang=en' target = '_blank'>Twitter</a></li>
                <li class='left center-h'><a href='https://www.linkedin.com/groups/5075095' target = '_blank'>LinkedIn</a></li>
                <li class='center-h'><a href='https://www.instagram.com/ewbcornell/' target = '_blank'>Instagram</a></li>
                <li class='center-h'><a href='https://www.facebook.com/EWBCornell/?fref=ts' target = '_blank'>Facebook</a></li>
            </div>
        </div>");
  }
?>
