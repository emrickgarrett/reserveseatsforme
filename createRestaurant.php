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

        </div>


    </div>

</div>

<script type="text/javascript">

    //Work with Tools section of javascript
    var toolSelected = null;

    var width = $("#tools").width(),
        height = $(window).height();

    var svg = d3.select("#toolbox-loc").append("svg")
        .attr("width", width)
        .attr("height", height);

    svg.append("circle")
        .attr("r", 30)
        .attr("cx", width/2)
        .attr("cy", 40)
        .attr("class", "chair")
        .style("fill", "brown")
        .style("stroke", "black")
        .style("stroke-width", 3);

    svg.append("rect")
        .attr("width", 80)
        .attr("height", 80)
        .attr("y", 100)
        .attr("x", width/2-40)
        .attr("class", "table")
        .style("fill", "white")
        .style("stroke", "black")
        .style("stroke-width", 3);

</script>

<?php
    require("dry/footer.php");

?>