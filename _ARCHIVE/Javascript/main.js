function myFunction(elem) {
  var x = document.getElementById("js-description");
  var description = elem.getAttribute('data-description');
  x.innerHTML = description;

  var button = document.getElementsByClassName('js-button');

  for (var i = 0; i < button.length; i++) {
    button[i].classList.remove('active-button');
  }

  elem.classList.add('active-button');
}


function toggleUtil(util) {
  $(".utilities").hide();
  $("#" + util).show();
}


function getUtil(data) {
    $.each( data, function( key, val ) {
        items.push( "<li id='" + key + "'>" + val + "</li>" );
    });
 
      $( "<ul/>", {
        "class": "my-new-list",
        html: items.join( "" )
      }).appendTo( "body" );
}


$( document ).ready(function() {
    
    $(".toggleSwitch").click(function() {
        
        console.log($(this).find(".toggleBG"));
        
        if ($(this).find(".toggleBG").hasClass("activeSwitchBG")) {
            $(this).find(".toggleBG").removeClass("activeSwitchBG");
            $(this).find("span:last").css("opacity","0.35");
            $(this).find("span").first().css("opacity","1");
        } else {
            $(this).find(".toggleBG").addClass("activeSwitchBG");
            $(this).find("span:last").css("opacity","1");
            $(this).find("span").first().css("opacity","0.35");
        }
        
    });
    
    
    $(".utilToggle > div").click(function() {
            $(".utilToggle > div").removeClass("activeToggle");
            $(this).addClass("activeToggle");
    });
    
});

function toggleUtilDetail(util, map) {
    if($('#detailContainer').is(':visible')){
        $("#detailContainer").hide();
        //$(".lineupWindow").html("");
    } else {
        
        console.log(util);        
        //Util-Name
        $(".metaInfos > h2").text(util.name);
        //ThrowType
        $(".metaInfos .p_throw").text(util.throwType);
        //Team
        if (util.team == "T") {
            $(".metaInfos .p_team").text("Terrorist");
        } else {
            $(".metaInfos .p_team").text("Counter-Terrorist");
        }
        //Images
        var imageFolder = "../images/" + map + "/" + util.nadeType + "/";
        
        $(".lineupImage").attr("src",imageFolder + util.image_lineup_128 + ".jpg");
        $(".img_spot1").attr("src",imageFolder + util.image_spot1 + ".jpg");
        $(".img_spot2").attr("src",imageFolder + util.image_spot2 + ".jpg");
        $(".img_deploy").attr("src",imageFolder + util.image_deploy + ".jpg");
        
        $('#detailContainer img').load(function(){
            $("#detailContainer").show();
        });
        
    }
}