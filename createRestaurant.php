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
            <p class="tools-text">Drag an icon to the right to place it in your restaurant.</p>

            <div class="toolbox-loc" id="toolbox-loc"></div>

        </div>

        <div class="col-lg-10 canvas" id="canvas">
            <div class="canvas-loc" id="canvas-loc"></div>
        </div>


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
            toolSelected = "chair";

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
            toolSelected = "wall";
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


    //Canvas Stuff goes here
    var cElement = null;
    var rElement = null;
    var eWidth = 0;

    var xOffset = $("#canvas").offset().left;
    var yOffset = $("#canvas").offset().top + $('body').scrollTop();

    var onEntry = function(){

        if(toolSelected != null) {
            switch (toolSelected) {
                case "chair":
                    cElement = canvas.append("circle")
                        .attr("r", 30)
                        .attr("cx", function(){return mouseX-xOffset;})
                        .attr("cy", function(){return mouseY-yOffset;})
                        .attr("class", "temp")
                        .style("fill", "brown")
                        .style("stroke", "black")
                        .style("stroke-width", 3)
                        .on("click", function(){
                            placeTool(mouseX, mouseY, "chair");
                        });
                    eWidth = 30;
                    break;
                case "table":

                    eWidth = 60;
                    break;
                case "plant":

                    break;
                case "wall":

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
    };

    var canvasClicked = function(){
       // placeTool();
    };

    var mouseMoved = function(){
      if(cElement != null){
          cElement.attr("cx", mouseX-xOffset);
          cElement.attr("cy", mouseY-yOffset);
      }
      if(rElement != null){
          rElement.attr("x", mouseX-xOffset - eWidth/2);
          rElement.attr("y", mouseY-yOffset - eWidth/2);
      }
    };

    $("#canvas").hover(onEntry, onExit);
    $("#canvas").click(canvasClicked);
    $("#canvas").mousemove(mouseMoved);


    //Tool placing onto canvas
    function placeTool(x, y, type){
        switch(type) {
            case "chair":
            canvas.append("circle")
                    .attr("r", 30)
                    .attr("cx", function () {
                        return mouseX - xOffset;
                    })
                    .attr("cy", function () {
                        return mouseY - yOffset;
                    })
                    .attr("class", "perm")
                    .style("fill", "brown")
                    .style("stroke", "black")
                    .style("stroke-width", 3)
                    .on("click", function () {

                    });
                break;
            case "table":
                break;
            case "wall":
                break;
            case "plant":
                break;
            default:
                break;
        }

    }

    document.addEventListener('mousemove', function(e){
        mouseX = e.clientX || e.pageX;
        mouseY = e.clientY || e.pageY;

        mouseY += $('body').scrollTop();
    }, false);

</script>

<?php
    require("dry/footer.php");

?>