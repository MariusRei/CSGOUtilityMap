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

      var mapLayoutWidth = $(".map_layout").outerHeight();
      $(".map_layout").css("width",mapLayoutWidth);

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
        var mapLayoutWidth = $(".map_layout").outerHeight();
        $(".map_layout").css("width",mapLayoutWidth);
        
    });


        
        

    </script>

      
    <div id="fullscreen">
        
    <div id="left">
        <a id="backButton" href="http://csgoutilitymap.byethost5.com/">
            <img width="46px" src="../images/icons/SVG/ic_back.svg">
            <h3>de_inferno</h3>
        </a>
        
        <div class="utilToggle">
            <div id="toggleSmoke" onclick="toggleUtil('smoke')" class="activeToggle">
                <img src="../images/icons/smoke.png">
                <p>Smokes</p>
            </div>
            <div id="toggleFlash" onclick="toggleUtil('flash')" >
                <img src="../images/icons/flash.png">
                <p>Flash</p>
            </div>
            <div id="toggleMolo" onclick="toggleUtil('molo')">
                <img src="../images/icons/molo.png">
                <p>Molo</p>            
            </div>
            <div id="toggleNade" onclick="toggleUtil('nade')">
                <img src="../images/icons/nade.png">
                <p>HE</p>            
            </div>
        </div>
        
        <!--
        <div id="options">
            <div id="toggleTickrate">
                <p>Tickrate</p>
                <div class="toggleSwitch">
                    <div  style="height: 37px; width: 100%; position: relative;">
                        <div class="toggleBG"></div>
                        <span style="opacity: 1.0">64</span>
                        <span>128</span> 
                    </div>

                </div>
            </div>
            <div id="toggleTickrate">
                <p>Team</p>
                <div class="toggleSwitch">
                    <div  style="height: 37px; width: 100%; position: relative;">
                        <div class="toggleBG"></div>
                        <span style="opacity: 1.0">T</span>
                        <span>CT</span> 
                    </div>

                </div>
            </div>
        </div>
        -->
    
    </div>
        
    <div id="right">
        <div class="map_layout">
        <img class="map_img" src="../images/radars/de_inferno.png"/>
            
            
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
      
        $sql = "SELECT id, name, nadeType, team, site, deploySpotX, deploySpotY, throwSpotX, throwSpotY, throwType, image_lineup_128, image_lineup_64, image_spot1, image_spot2, image_deploy  FROM inferno";
        $result = $mysqli->query($sql);

            
            
        

        if ($result->num_rows > 0) {
          // output data of each row
        ?>
        <div class="utilities" style="display:flex;" id="smoke">    
        <?php     
          while($row = $result->fetch_assoc()) {
            $utilDetails = array(
                    "name" => $row["name"],
                    "team" => $row["team"],
                    "nadeType" => $row["nadeType"],
                    "throwType" => $row["throwType"],
                    "image_lineup_64" => $row["image_lineup_64"],
                    "image_lineup_128" => $row["image_lineup_128"],
                    "image_spot1" => $row["image_spot1"],
                    "image_spot2" => $row["image_spot2"],
                    "image_deploy" => $row["image_deploy"]
                );
            if ($row['nadeType']=="smoke") {
            

            
            ?>    
            <a class="<?php echo $row["nadeType"]?>" onclick='toggleUtilDetail( <?php echo json_encode($utilDetails);?> , "inferno") ' >
                <img class="util_icon loc_deploy" src="../images/icons/SVG/ic_<?php echo $row["nadeType"]?>_<?php echo $row["team"]?>.svg" style="left:<?php echo $row["deploySpotX"]?>%;top:<?php echo $row["deploySpotY"]?>%"/>
                <img class="util_icon loc_throw" src="../images/icons/<?php echo $row["team"]?>.png" style="left:<?php echo $row["throwSpotX"]?>%;top:<?php echo $row["throwSpotY"]?>%"/>
            </a>
            <?php
            }
          }
            ?>
        </div>  
        <div class="utilities" id="flash">    
        <?php
        $result->data_seek(0);
          while($row = $result->fetch_assoc()) {
            $utilDetails = array(
                    "name" => $row["name"],
                    "team" => $row["team"],
                    "nadeType" => $row["nadeType"],
                    "throwType" => $row["throwType"],
                    "image_lineup_64" => $row["image_lineup_64"],
                    "image_lineup_128" => $row["image_lineup_128"],
                    "image_spot1" => $row["image_spot1"],
                    "image_spot2" => $row["image_spot2"],
                    "image_deploy" => $row["image_deploy"]
                );
            if ($row['nadeType']=="flash") {
            ?>  
            <a></a>
            <a class="<?php echo $row["nadeType"]?>" onclick='toggleUtilDetail( <?php echo json_encode($utilDetails);?> ) ' >
                <img class="util_icon loc_deploy" src="../images/icons/SVG/ic_<?php echo $row["nadeType"]?>_<?php echo $row["team"]?>.svg" style="left:<?php echo $row["deploySpotX"]?>%;top:<?php echo $row["deploySpotY"]?>%"/>
                <img class="util_icon loc_throw" src="../images/icons/<?php echo $row["team"]?>.png" style="left:<?php echo $row["throwSpotX"]?>%;top:<?php echo $row["throwSpotY"]?>%"/>
            </a>
            <?php
            }
          }
            ?>
        </div>
        <div class="utilities" id="molo">    
        <?php
        $result->data_seek(0);    
          while($row = $result->fetch_assoc()) {
            $utilDetails = array(
                    "name" => $row["name"],
                    "team" => $row["team"],
                    "nadeType" => $row["nadeType"],
                    "throwType" => $row["throwType"],
                    "image_lineup_64" => $row["image_lineup_64"],
                    "image_lineup_128" => $row["image_lineup_128"],
                    "image_spot1" => $row["image_spot1"],
                    "image_spot2" => $row["image_spot2"],
                    "image_deploy" => $row["image_deploy"]
                );
            if ($row['nadeType']=="molo") {
            ?>    
            <a class="<?php echo $row["nadeType"]?>" onclick='toggleUtilDetail( <?php echo json_encode($utilDetails);?> ) ' >
                <img class="util_icon loc_deploy" src="../images/icons/SVG/ic_<?php echo $row["nadeType"]?>_<?php echo $row["team"]?>.svg" style="left:<?php echo $row["deploySpotX"]?>%;top:<?php echo $row["deploySpotY"]?>%"/>
                <img class="util_icon loc_throw" src="../images/icons/<?php echo $row["team"]?>.png" style="left:<?php echo $row["throwSpotX"]?>%;top:<?php echo $row["throwSpotY"]?>%"/>
            </a>
            <?php
            }
          }
            ?>
        </div>
        <div class="utilities" id="nade">    
        <?php
        $result->data_seek(0);    
          while($row = $result->fetch_assoc()) {
            $utilDetails = array(
                    "name" => $row["name"],
                    "team" => $row["team"],
                    "nadeType" => $row["nadeType"],
                    "throwType" => $row["throwType"],
                    "image_lineup_64" => $row["image_lineup_64"],
                    "image_lineup_128" => $row["image_lineup_128"],
                    "image_spot1" => $row["image_spot1"],
                    "image_spot2" => $row["image_spot2"],
                    "image_deploy" => $row["image_deploy"]
                );
            if ($row['nadeType']=="nade") {
            ?>    
            <a class="<?php echo $row["nadeType"]?>" onclick='toggleUtilDetail( <?php echo json_encode($utilDetails);?> ) ' >
                <img class="util_icon loc_deploy" src="../images/icons/SVG/ic_<?php echo $row["nadeType"]?>_<?php echo $row["team"]?>.svg" style="left:<?php echo $row["deploySpotX"]?>%;top:<?php echo $row["deploySpotY"]?>%"/>
                <img class="util_icon loc_throw" src="../images/icons/<?php echo $row["team"]?>.png" style="left:<?php echo $row["throwSpotX"]?>%;top:<?php echo $row["throwSpotY"]?>%"/>
            </a>
            <?php
            }
          }
            ?>
        </div>    
            
        <?php   
        } else {
          echo "0 results";
        }
        $mysqli->close();
      
    ?>
            
      </div>
    </div>
        
    </div>  
      
    <div id="detailContainer">
        <div class="backgroundOverlay"></div>
        <div>
            
            <!-- <div class="detailThrowInfos">
                <div class="metaInfos">
                    <h2>CT Smoke A</h2>
                    <div style="display: flex">
                        <div style="margin-top:30px;width: 50%;">
                            <p class="smallTitle">Throw</p>
                            <p class="p_throw" style="font-size: 18px;">JumpThrow</p>
                        </div>
                        <div style="margin-top:30px;width: 50%;">
                            <p class="smallTitle">Team</p>
                            <p class="p_team" style="font-size: 18px;">CT</p>
                        </div>
                    </div>
                </div>
                
            </div> -->
            
            <div class="lineupWindowContainer">
                <div class="lineupWindow">
                    <img class="lineupImage" src="../images/inferno/smoke/moto_smoke_lineup.jpg">
                </div>
            </div>
            
            <div style="display: flex; justify-content: center;">
                <div class="metaImages">
                    <img class="img_spot1" src="../images/inferno/smoke/moto_smoke_deploy.jpg">
                    <img class="img_spot2" src="../images/inferno/smoke/moto_smoke_spot1.jpg">
                    <img class="img_deploy" src="../images/inferno/smoke/moto_smoke_spot2.jpg">
                </div>
            </div>
            
            <a class="exitBtn" onclick="toggleUtilDetail()">
                <img width="46px" src="../images/icons/SVG/ic_back.svg">
            </a>
        </div>
    </div>  
      
  </body>
</html>
