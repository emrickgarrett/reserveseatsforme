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
                <p class="tools-heading">Legend:</p>
                <hr>
                <div class="toolbox-loc" id="toolbox-loc"></div>

                <div class="tooltip" id="tooltip" style="visibility:hidden;background:grey;height:8em;width:10em;"></div>

            </div>

            <div class="col-lg-10 canvas" id="canvas">
                <div class="canvas-loc" id="canvas-loc"></div>
            </div>

        </div>

    </div>


<script type="text/javascript">

    //Tooltip stuff
    var breakLimit = "5em";
    var toolX = 0;
    var toolY = 0;
    var tooltipOn = false;



    //Dealing with the Legend window and canvas...
    var width = $("#tools").width(),
        height = $(window).height();

    var canvasWidth = $("#canvas").width(),
        canvasHeight = $(window).height();

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
            var text = "Chairs. Green means available, Red means occupied, Blue means Handicap Accessible.";
            displayTooltip(width/2-40, 40-46, text);

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
            var text = "Tables that are located within the restaurant.";
            displayTooltip(width/2-40, 90-16, text);
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
            var text = "Walls that are within the restaurant, for decoration only.";
            displayTooltip(width/2-40, 190-16, text);
        });

    svg.append("circle")
        .attr("r", 30)
        .attr("cx", width/2)
        .attr("cy", 270)
        .style("fill", "saddlebrown")
        .style("stroke", "black")
        .style("stroke-width", 3)
        .on("click", function(){
            var text = "Foliage (plants) that are within the restaurant, for decoration only.";
            displayTooltip(width/2-40,270-46, text);
        });

    svg.append("circle")
        .attr("r", 25)
        .attr("cx", width/2)
        .attr("cy", 270)
        .style("fill", "green")
        .style("stroke", "black")
        .style("stroke-width", 2)
        .on("click", function(){
            var text = "Foliage (plants) that are within the restaurant, for decoration only.";
            displayTooltip(width/2-40, 270-46, text);
        });

    function displayTooltip(x, y, text){
        //Display Tooltip on screen here!
        $("#tooltip").css({visibility: "visible", opacity: "100", top : y + "px", left: x + "px"});
        $("#tooltip").html("<p class='tooltip-text'>" + text + "</p>");
        tooltipOn = true;
    }


</script>


<?php

require("dry/footer.php");

?>