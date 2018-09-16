<html lang = "en">

<head>
    <?php
      include_once 'includes/common.php';
      commonHeader();
    ?>
    <script>
        function getHTMLStringForBio(bioNum){
          console.log('justin peterson')
           if (bioNum == 0) { return "<h2>Justin Peterson</h2>"};
        }
        function getWrappedBio(bioNum){
              return "<div id='active-bio' class='collapse col-xs-12 col-sm-12 col-md-12 col-lg-12 bio-section'>\n"
                      + getHTMLStringForBio(bioNum)
                      + "\n</div>";
          }
    </script>
</head>
<body>
  <div class = "bannermem container-fluid">
    <h1 class = "center center-h"><strong>MEMBERS</strong></h1>
  </div>

  <div class= "content">
      <div class="container">
          <div class="row">


          </div>

      </div>
  </div>
  <?php
    commonBottom();
  ?>

</body>

</html>
