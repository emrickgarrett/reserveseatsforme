<?php
/**
 * Created by PhpStorm.
 * User: Garrett
 * Date: 11/15/2014
 * Time: 03:23
 */

    require("dry/header.php");

?>


<div class="container">

    <div class="row">

        <div class="col-lg-2 tools" id="tools">
            <p class="tools-heading">Tools:</p>
            <hr>
            <p class="tools-text">Drag an icon to the right to place it in your business.</p>

            <div class="toolbox-loc" id="toolbox-loc"></div>

            <div class="tooltip-creator" id="tooltip-creator" style="visibility:hidden;"></div>

        </div>

        <div class="col-lg-10 canvas" id="canvas">
            <div class="canvas-loc" id="canvas-loc"></div>
        </div>
        <div class="confirmReservation" id="confirmReservation" style="visibility: hidden;"></div>


    </div>

</div>

<script type="text/javascript">

    //Work with Tools section of javascript
    var toolSelected = null;

    var width = $("#tools").width(),
        height = $(window).height();

    var canvasWidth = $("#canvas").width(),
        canvasHeight = $(window).height();

    var mouseX = 0;
    var mouseY = 0;
    var tooltipOn = false;

    var snapPixelsX = 0;
    var snapPixelsY = 0;

    var chairs = [];
    var tables = [];
    var walls = [];
    var plants = [];

    var svg = d3.select("#toolbox-loc").append("svg")
        .attr("width", width)
        .attr("height", height);

    var canvas = d3.select("#canvas-loc").append("svg")
        .attr("width", canvasWidth)
        .attr("height", canvasHeight);

    svg.append("circle")
        .attr("r", 30)
        .attr("cx", width/2)
        .attr("cy", 40)
        .attr("class", "chair")
        .style("fill", "brown")
        .style("stroke", "black")
        .style("stroke-width", 3)
        .on("click", function(){

            showTooltipSelectChair(width/2-30, 40);
            tooltipOn = true;

        });

    svg.append("rect")
        .attr("width", 80)
        .attr("height", 80)
        .attr("y", 90)
        .attr("x", width/2-40)
        .attr("class", "table")
        .style("fill", "white")
        .style("stroke", "black")
        .style("stroke-width", 3)
        .on("click", function(){
            toolSelected = "table";
        });

    svg.append("rect")
        .attr("width", 80)
        .attr("height", 30)
        .attr("y", 190)
        .attr("x", width/2-40)
        .attr("class", "wall")
        .style("fill", "gray")
        .style("stroke", "black")
        .style("stroke-width", 3)
        .on("click", function(){
            showTooltipSelectWall(width/2-30, 190);
            tooltipOn = true;
        });

    svg.append("circle")
        .attr("r", 30)
        .attr("cx", width/2)
        .attr("cy", 270)
        .style("fill", "saddlebrown")
        .style("stroke", "black")
        .style("stroke-width", 3)
        .on("click", function(){
            toolSelected = "plant";
        });

    svg.append("circle")
        .attr("r", 25)
        .attr("cx", width/2)
        .attr("cy", 270)
        .style("fill", "green")
        .style("stroke", "black")
        .style("stroke-width", 2)
        .on("click", function(){
            toolSelected = "plant";
        });

    svg.append("rect")
        .attr("width", 80)
        .attr("height", 40)
        .attr("x", width/2-40)
        .attr("y", 310)
        .attr("fill", "white")
        .attr("stroke", "black")
        .attr("stroke-width", 2)
        .on("click", function(){
            toolSelected = "delete-first";
        });
    svg.append("text")
        .attr("x", width/2-38)
        .attr("y", 310+23)
        .attr("fill", "black")
        .text("Delete Tool")
        .on("click", function(){
            toolSelected = "delete-first";
        });

    svg.append("rect")
        .attr("width", 80)
        .attr("height", 40)
        .attr("x", width/2-40)
        .attr("y", 360)
        .attr("fill", "white")
        .attr("stroke", "black")
        .attr("stroke-width", 2)
        .on("click", function(){
            showTooltipSnap(width/2-40, 360)
        });
    svg.append("text")
        .attr("x", width/2-34)
        .attr("y", 360+23)
        .attr("fill", "black")
        .text("Snap Tool")
        .on("click", function(){
            showTooltipSnap(width/2-40, 360)
        });

    svg.append("rect")
        .attr("width", 80)
        .attr("height", 40)
        .attr("x", width/2-40)
        .attr("y", 410)
        .attr("fill", "white")
        .attr("stroke", "black")
        .attr("stroke-width", 2)
        .on("click", function(){

            saveData();

        });
    svg.append("text")
        .attr("x", width/2-18)
        .attr("y", 410+25)
        .attr("fill", "black")
        .text("Save")
        .on("click", function(){

            saveData();

        });




    //Canvas Stuff goes here
    var cElement = null;
    var rElement = null;
    var eWidth = 0;
    var eHeight = 0;

    var xOffset = $("#canvas").offset().left;
    var yOffset = $("#canvas").offset().top + $('body').scrollTop();

    var onEntry = function(){

        if(toolSelected != null) {
            switch (toolSelected) {
                case "chair":
                case "handi-chair":
                    cElement = canvas.append("circle")
                        .attr("r", 30)
                        .attr("cx", function(){return mouseX-xOffset;})
                        .attr("cy", function(){return mouseY-yOffset;})
                        .attr("class", "temp")
                        .style("fill", function(){
                            if(toolSelected == "chair"){
                                return "brown";
                            }else{
                                return "blue";
                            }

                        })
                        .style("stroke", "black")
                        .style("stroke-width", 3)
                        .on("click", function(){
                            placeTool(mouseX, mouseY, toolSelected);
                        });
                    eWidth = 30;
                    eHeight = eWidth;
                    break;
                case "table":
                    rElement = canvas.append("rect")
                        .attr("width", 80)
                        .attr("height", 80)
                        .attr("y", function(){return mouseY - yOffset;})
                        .attr("x", function(){ return mouseX - xOffset;})
                        .attr("class", "temp")
                        .style("fill", "white")
                        .style("stroke", "black")
                        .style("stroke-width", 3)
                        .on("click", function(){
                            placeTool(mouseX, mouseY, "table")
                        });
                    eWidth = 80;
                    eHeight = eWidth;
                    break;
                case "plant":

                    cElement = canvas.append("circle")
                        .attr("r", 30)
                        .attr("cx", function(){return mouseX - xOffset;})
                        .attr("cy", function(){return mouseY - yOffset;})
                        .style("fill", "saddlebrown")
                        .style("stroke", "black")
                        .style("stroke-width", 3)
                        .on("click", function(){
                            placeTool(mouseX, mouseY, "plant");
                        });

                    rElement = canvas.append("circle")
                        .attr("r", 25)
                        .attr("cx", function(){return mouseX - xOffset;})
                        .attr("cy", function(){return mouseY - yOffset;})
                        .style("fill", "green")
                        .style("stroke", "black")
                        .style("stroke-width", 2)
                        .on("click", function(){
                            placeTool(mouseX, mouseY, "plant");
                        });

                    eWidth = 30;
                    eHeight = eWidth;

                    break;
                case "wall":
                case "rotate-wall":
                    rElement = canvas.append("rect")
                        .attr("width", function(){
                            if(toolSelected=="wall"){
                                return 80;
                            }else{
                                return 30;
                            }
                        })
                        .attr("height", function(){
                            if(toolSelected == "wall"){
                                return 30;
                            }else{
                                return 80;
                            }
                        })
                        .attr("y", function(){return mouseY - yOffset;})
                        .attr("x", function(){return mouseX - xOffset;})
                        .attr("class", "wall")
                        .style("fill", "gray")
                        .style("stroke", "black")
                        .style("stroke-width", 3)
                        .on("click", function(){
                            placeTool(mouseX, mouseY, toolSelected);
                        });
                    if(toolSelected == "wall"){
                        eWidth = 80;
                        eHeight = 30;
                    }else{
                        eWidth = 30;
                        eHeight = 80;
                    }

                    break;
                case "delete-first":
                    alert("Click on Objects to Delete Them");
                    toolSelected = "delete";
                    break;
                case "delete":
                    break;

                default:
                    console.log("Error rendering object to canvas");
            }
        }
    };

    var onExit = function(){
        mouseX = 0;
        mouseY = 0;
        if(cElement != null){
            cElement.remove();
            cElement = null;

        }
        if(rElement != null){
            rElement.remove();
            rElement = null;
        }
        eWidth = 0;
        eHeight = 0;
    };

    var canvasClicked = function(){
       // placeTool();
    };

    var mouseMoved = function(){
      if(cElement != null){
          cElement.attr("cx", mouseX-xOffset);
          cElement.attr("cy", mouseY-yOffset);
          if(rElement != null){
              rElement.attr("cx", mouseX-xOffset);
              rElement.attr("cy", mouseY-yOffset);
          }
      }else {
          if (rElement != null) {
              rElement.attr("x", mouseX - xOffset - eWidth / 2);
              rElement.attr("y", mouseY - yOffset - eHeight / 2);
          }
      }
    };

    $("#canvas").hover(onEntry, onExit);
    $("#canvas").click(canvasClicked);
    $("#canvas").mousemove(mouseMoved);


    //Tool placing onto canvas
    function placeTool(x, y, type){
        switch(type) {
            case "chair":
            case "handi-chair":
                canvas.append("circle")
                    .attr("r", 30)
                    .attr("cx", function () {
                        return mouseX - xOffset;
                    })
                    .attr("cy", function () {
                        return mouseY - yOffset;
                    })
                    .attr("class", "perm")
                    .style("fill", function(){
                        if(type=="chair"){
                            return "brown";
                        }else{
                            return "blue";
                        }
                    })
                    .style("stroke", "black")
                    .style("stroke-width", 3)
                    .on("click", function (d, i) {
                        if(toolSelected == "delete"){
                            d3.select(this).remove();
                        }
                    });

                break;
            case "table":
                 canvas.append("rect")
                    .attr("width", 80)
                    .attr("height", 80)
                    .attr("y", function(){return mouseY - yOffset -eWidth/2;})
                    .attr("x", function(){ return mouseX - xOffset - eWidth/2;})
                    .attr("class", "perm")
                    .style("fill", "white")
                    .style("stroke", "black")
                    .style("stroke-width", 3)
                    .on("click", function(){
                         if(toolSelected == "delete"){
                             d3.select(this).remove();
                         }
                    });
                break;
            case "wall":
            case "rotate-wall":
                canvas.append("rect")
                    .attr("width", function(){
                        if(type=="wall"){
                            return 80;
                        }else{
                            return 30;
                        }
                    })
                    .attr("height", function(){
                        if(type=="wall"){
                            return 30;
                        }else{
                            return 80;
                        }
                    })
                    .attr("y", function(){return mouseY - yOffset - eHeight/2;})
                    .attr("x", function(){return mouseX - xOffset - eWidth/2;})
                    .attr("class", "wall")
                    .style("fill", "gray")
                    .style("stroke", "black")
                    .style("stroke-width", 3)
                    .on("click", function(){
                        if(toolSelected == "delete"){
                            d3.select(this).remove();
                        }

                    });
                break;
            case "plant":
                canvas.append("circle")
                    .attr("r", 30)
                    .attr("cx", function(){return mouseX - xOffset;})
                    .attr("cy", function(){return mouseY - yOffset;})
                    .style("fill", "saddlebrown")
                    .style("stroke", "black")
                    .style("stroke-width", 3)
                    .on("click", function(){
                        if(toolSelected == "delete"){
                            d3.select(this).remove();
                        }
                    });

                canvas.append("circle")
                    .attr("r", 25)
                    .attr("cx", function(){return mouseX - xOffset;})
                    .attr("cy", function(){return mouseY - yOffset;})
                    .style("fill", "green")
                    .style("stroke", "black")
                    .style("stroke-width", 2)
                    .on("click", function(){
                        if(toolSelected == "delete"){
                            d3.select(this).remove();
                        }
                    });
                break;
            default:
                break;
        }

    }

    document.addEventListener('mousemove', function(e) {
        mouseX = e.clientX || e.pageX;
        mouseY = e.clientY || e.pageY;

        mouseY += $('body').scrollTop();

        if (snapPixelsX > 0 && snapPixelsY > 0) {
            mouseX = Math.floor((mouseX / snapPixelsX)) * snapPixelsX;
             mouseY = Math.floor((mouseY / snapPixelsY)) * snapPixelsY;
        }
    }, false);


    function showTooltipSelectChair(x, y){
        //Display Tooltip on screen here!
        $("#tooltip-creator").css({visibility: "visible", opacity: "100", top : y + "px", left: (x-26) + "px"});
        $("#tooltip-creator").html("<h5>Handicap Accessible?</h5><button class='btn btn-primary' onclick='handiButton()'>Yes</button><button class='btn' onclick='normalButtonChair()'>No</button>");
        tooltipOn = true;
    }

    function showTooltipSelectWall(x, y){
        $("#tooltip-creator").css({visibility: "visible", opacity: "100", top : y + "px", left: (x-26) + "px"});
        $("#tooltip-creator").html("<h5>Rotate?</h5><button class='btn btn-primary' onclick='rotateWall()'>Yes</button><button class='btn' onclick='normalButtonWall()'>No</button>");
        tooltipOn = true;
    }

    function showTooltipSnap(x, y){
        $("#tooltip-creator").css({visibility: "visible", opacity: "100", top : y + "px", left: (x-26) + "px"});
        $("#tooltip-creator").html("Snap X: <input type='text' id='snapX'  style='color:black;width:5em'><br/>"
        + "Snap Y: <input type='text' id='snapY' width='1em' style='color:black;width:5em'><br/><button class='btn btn-primary' onclick='snapButton()'>Save</button><button class='btn' onclick='hideToolTip()'>Cancel</button>");
        tooltipOn = true;
    }

    function normalButtonChair(){
        toolSelected = "chair";
        hideToolTip();
    }

    function normalButtonWall(){
        toolSelected = "wall";
        hideToolTip();
    }

    function handiButton(){
        toolSelected = "handi-chair";
        hideToolTip();
    }

    function rotateWall(){
        toolSelected = "rotate-wall";
        hideToolTip();
    }

    function snapButton(){

        if(!isNaN($('#snapX').val()) && (function(x) { return (x | 0) === x; })(parseFloat($('#snapX').val()))){
            snapPixelsX = $('#snapX').val();
        }
        if(!isNaN($('#snapY').val()) && (function(x) { return (x | 0) === x; })(parseFloat($('#snapY').val()))){
            snapPixelsY = $('#snapY').val();
        }

        hideToolTip();

    }


    function hideToolTip(){
        $("#tooltip-creator").css({visibility: "hidden", opacity: "0"});
    }



//Function saves the data and then sends it to php, chance next restaurant will pop up.
    function saveData(){
        $("#confirmReservation").css({visibility: "visible", opacity: "100"});
        $("#confirmReservation").html("<h2> Please Enter the Following Data.</h2>" +
            "<div class='input-container row' style='margin-left:auto;margin-right:auto;text-align:left;'>"+
        "<span class='input-title col-lg-6'>Business Name:</span> <input id='RestName' class='input col-lg-6' type='text' placeholder='Name' width='100%'><br/><br/>" +
        "<span class='input-title col-lg-6'>Business Address:</span> <input id='RestAddress' class='input col-lg-6' type='text' placeholder='Address' width='100%'><br/><br/>" +
        "<span class='input-title col-lg-6'>Contact Name:</span> <input id='ContactName' class='input col-lg-6' type='text' placeholder='John Doe' width='100%'><br/><br/>" +
        "<span class='input-title col-lg-6'>Contact Email:</span> <input id='ContactEmail' class='input col-lg-6' type='text' placeholder='example@google.com' width='100%'><br/><br/>"+
        "<span class='input-title col-lg-6'>Contact Address:</span> <input id='ContactAddress' class='input col-lg-6' type='text' placeholder='Address' width='100%'><br/><br/></div>"+
        "<button class='btn btn-lg btn-success' onClick='saveButton()'>Create</button>");

    }

    function saveButton() {
        //Saving would happen here
        //check that all fields have valuess
        var isValid = checkFields();
        //store data in db
        //store data in session

        //Thank user and redirect to home.
        if (isValid) {
            $("#confirmReservation").html("<h2> Thanks for Adding Your Business!</h2>" +
            "<p class='lead'>Feel free to stay and edit it some more, or return to the home page!</p>" +
            "<br/><br/><br/><br/><br/><br/><button class='btn btn-lg btn-primary' onClick='sendEmail()' style='bottom:0;'>Okay!</button>");
        }
    }

    function sendEmail(){
        //send email via ajax
        //Won't work on my local machine, as it is not an SMTP server. Would work on an actual server, however.
        $.ajax({ url: 'emailUser.php',
            data: {email: $('#ContactEmail').val(), RestName: $('#RestName').val(), ContactName: $('#ContactName').val()},
            type: 'post',
            success: function(output){

            }});

        hideMessage();
    }

    function hideMessage(){
        $("#confirmReservation").css({visibility: "hidden", opacity: "0"});
    }

    function checkFields(){
        var restName = $('#RestName').val();
        var restAdd = $('#RestAddress').val();
        var contactName = $('#ContactName').val();
        var contactEmail = $('#ContactEmail').val();
        var contactAddress = $('#ContactAddress').val();

        if(restName == "" || restAdd == "" || contactName == "" || contactEmail == "" || contactAddress == ""){
            alert("Please enter information in all the fields");
            return false;
        }else{
            if(contactName.indexOf(" ") == -1){
                alert("Please enter a first and last name");
                return false;
            }
            if(contactEmail.indexOf("@") == -1 || contactEmail.indexOf(".") == -1){
                alert("Please enter a valid email");
                return false;
            }
            return true;
        }
    }


</script>

<br/>
<br/>
<br/>
<br/>
<br/>
<?php
    require("dry/footer.php");

?>