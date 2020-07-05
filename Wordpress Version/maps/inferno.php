<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../CSS/responsive.css" media="screen"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../CSS/lightbox.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../Javascript/main.js"></script>
    <script src="../Javascript/lightbox.js"></script>


    <title>Inferno</title>
  </head>
  <body>

    <script>

    $(document).ready(function() {

      lightbox.option({
            'resizeDuration': 50,
            'wrapAround': true,
            'fadeDuration': 150,
            'maxWidth': 1400,
            'maxHeight': 800
          });
        
      $(".utils-toggle > .nav-link").click(function() {
        $(".utils-toggle > .nav-link").removeClass('active');
        $(this).addClass('active');
      });

      var mapLayoutWidth = $(".map_layout").outerWidth();
      $(".map_layout").css("height",mapLayoutWidth);

      $(".loc_deploy").mouseover(function() {
        $(".loc_deploy").hide();
        $(this).next().show();
        $(this).show();
      });

      $(".loc_deploy").mouseout(function() {
        $(".loc_deploy").show();
        $(this).next().toggle();
      });
        
      

    });

    $( window ).resize(function() {
        var mapLayoutWidth = $(".map_layout").outerWidth();
      $(".map_layout").css("height",mapLayoutWidth);
        
    });



    </script>
      
 
    <div class="container background">

      <h1>
        <a href="http://csgoutilitymap.byethost5.com/"><i class="fa fa-arrow-left"></i></a>
        <span>Inferno</span>
      </h1>

      <nav class="nav utils-toggle">
        <a class="nav-link active" onclick="toggleUtil('smoke')">Smokes</a>
        <a class="nav-link" onclick="toggleUtil('flash')">Flashes</a>
        <a class="nav-link" onclick="toggleUtil('molo')">Molos</a>
        <a class="nav-link" onclick="toggleUtil('nade')">Nades</a>
      </nav>

      <div class="map_layout">
        <img class="map_img" src="../images/inferno/inferno_map.jpg"/>


                 <?php
      
      $host = "sql307.byethost.com";
      $username = "b5_26120572";
      $password = "marREI123";
      $database = "b5_26120572_database";
      
      $mysqli = new mysqli($host, $username, $password, $database);
      
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        //echo $mysqli->host_info . "\n" . "<br>";
      
        $sql = "SELECT id, nadeType, team, site, deploySpotX, deploySpotY, throwSpotX, throwSpotY, throwType, image FROM inferno";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            
          <!-- OLD: 
            <div class="utilities" style="display:flex;"  id="<?php echo $row["nadeType"]?>">
                  
                <a class="<?php echo $row["nadeType"]?>" href="../images/inferno/<?php echo $row["nadeType"]?>/<?php echo $row["image"]?>.jpg" data-lightbox="<?php echo $row["nadeType"]?>">
                    <img class="util_icon loc_deploy" src="../images/icons/<?php echo $row["nadeType"]?>.png" style="left:<?php echo $row["deploySpotX"]?>%;top:<?php echo $row["deploySpotY"]?>%"/>
                    <img class="util_icon loc_throw" src="../images/icons/<?php echo $row["team"]?>.png" style="left:<?php echo $row["throwSpotX"]?>%;top:<?php echo $row["throwSpotY"]?>%"/>
                </a>
                  
            </div>
            -->
          
          <!-- NEW: -->
            <div class="utilities" style="display:flex;"  id="<?php echo $row["nadeType"]?>">
                  
                <a class="<?php echo $row["nadeType"]?>" href="../images/inferno/<?php echo $row["nadeType"]?>/<?php echo $row["image"]?>.jpg" data-lightbox="<?php echo $row["nadeType"]?>">
                    <img class="util_icon loc_deploy" src="../images/icons/<?php echo $row["nadeType"]?>.png" style="left:<?php echo $row["deploySpotX"]?>%;top:<?php echo $row["deploySpotY"]?>%"/>
                    <img class="util_icon loc_throw" src="../images/icons/<?php echo $row["team"]?>.png" style="left:<?php echo $row["throwSpotX"]?>%;top:<?php echo $row["throwSpotY"]?>%"/>
                </a>
                  
            </div>
          
    <?php
              
            
          }
        } else {
          echo "0 results";
        }
        $mysqli->close();
      
    ?>
      
      



      </div>

    </div>

      
      
  </body>
</html>
