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
                <p class="tools-text"><span>Red Chairs </span> represent chairs that are already taken.</p>
                <p class="tools-text"><span>Green Chairs</span> represent chairs that are available.</p>
                <p class="tools-text"><span>Blue Chairs</span> indicate chairs that are available and Handicap accessible.</p>
                <p class="tools-text"><span>White Tables</span> represent tables.</span></p>
                <p class="tools-text"><span>Brown Circles</span> with <span> Green Circles</span> represent foliage.</p>

                <div class="toolbox-loc" id="toolbox-loc"></div>

            </div>

            <div class="col-lg-10 canvas" id="canvas">
                <div class="canvas-loc" id="canvas-loc"></div>
            </div>

        </div>

    </div>


<script type="text/javascript">
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
            displayTooltip(width/2, 40);

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
            displayTooltip(width/2-40, 90);
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
            displayTooltip(width/2-40, 190);
        });

    svg.append("circle")
        .attr("r", 30)
        .attr("cx", width/2)
        .attr("cy", 270)
        .style("fill", "saddlebrown")
        .style("stroke", "black")
        .style("stroke-width", 3)
        .on("click", function(){
            displayTooltip(width/2,270);
        });

    svg.append("circle")
        .attr("r", 25)
        .attr("cx", width/2)
        .attr("cy", 270)
        .style("fill", "green")
        .style("stroke", "black")
        .style("stroke-width", 2)
        .on("click", function(){
            displayTooltip(width/2, 270);
        });

    function displayTooltip(x, y, text){
        //Display Tooltip on screen here!
        //TODO
    }


</script>


<?php

require("dry/footer.php");

?>