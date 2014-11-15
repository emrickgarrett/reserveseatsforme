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

                <div class="tooltip" id="tooltip" style="visibility:hidden;"></div>

            </div>

            <div class="col-lg-10 canvas" id="canvas">
                <div class="canvas-loc" id="canvas-loc"></div>
            </div>

        </div>

    </div>


<script type="text/javascript">

    //Tooltip stuff
    var breakLimit = 300;
    var toolX = 0;
    var toolY = 0;
    var tooltipOn = false;


    //JSON to use as an example of a restaurant...

    var data = {
          chairs : [
              {
                  "table_id" : 1,
                  "x" : 40,
                  "y" : 40,
                  "status" : "open"
              },
              {
                  "table_id" : 1,
                  "x" : 110,
                  "y" : 40,
                  "status" : "open"
              },
              {
                  "table_id" : 1,
                  "x" : 180,
                  "y" : 40,
                  "status" : "handicap"
              },
              {
                  "table_id" : 1,
                  "x" : 40,
                  "y" : 210,
                  "status" : "open"
              },
              {
                  "table_id" : 1,
                  "x" : 110,
                  "y" : 210,
                  "status" : "open"
              },
              {
                  "table_id" : 1,
                  "x" : 180,
                  "y" : 210,
                  "status" : "handicap"
              }, //Table Group 1


              {
                  "table_id" : 2,
                  "x" : 360,
                  "y" : 40,
                  "status" : "taken"
              },
              {
                  "table_id" : 2,
                  "x" : 430,
                  "y" : 40,
                  "status" : "taken"
              },
              {
                  "table_id" : 2,
                  "x" : 500,
                  "y" : 40,
                  "status" : "taken"
              },
              {
                  "table_id" : 2,
                  "x" : 360,
                  "y" : 210,
                  "status" : "taken"
              },
              {
                  "table_id" : 2,
                  "x" : 430,
                  "y" : 210,
                  "status" : "taken"
              },
              {
                  "table_id" : 2,
                  "x" : 500,
                  "y" : 210,
                  "status" : "taken"
              }, //Table Group 2


              {
                  "table_id" : 3,
                  "x" : 680,
                  "y" : 40,
                  "status" : "taken"
              },
              {
                  "table_id" : 3,
                  "x" : 750,
                  "y" : 40,
                  "status" : "taken"
              },
              {
                  "table_id" : 3,
                  "x" : 820,
                  "y" : 40,
                  "status" : "taken"
              },
              {
                  "table_id" : 3,
                  "x" : 680,
                  "y" : 210,
                  "status" : "taken"
              },
              {
                  "table_id" : 3,
                  "x" : 750,
                  "y" : 210,
                  "status" : "taken"
              },
              {
                  "table_id" : 3,
                  "x" : 820,
                  "y" : 210,
                  "status" : "taken"
              }, //Table Group 3


              {
                  "table_id" : 4,
                  "x" : 660,
                  "y" : 330,
                  "status" : "handicap"
              },
              {
                  "table_id" : 4,
                  "x" : 660,
                  "y" : 400,
                  "status" : "open"
              },
              {
                  "table_id" : 4,
                  "x" : 660,
                  "y" : 470,
                  "status" : "handicap"
              },
              {
                  "table_id" : 4,
                  "x" : 840,
                  "y" : 330,
                  "status" : "handicap"
              },
              {
                  "table_id" : 4,
                  "x" : 840,
                  "y" : 400,
                  "status" : "open"
              },
              {
                  "table_id" : 4,
                  "x" : 840,
                  "y" : 470,
                  "status" : "handicap"
              }

          ],

          tables : [
              {
                  "id" : 1,
                  "x" : 20,
                  "y" : 85,
                  status : "open"
              },
              {
                  "id" : 1,
                  "x" : 120,
                  "y" : 85,
                  status : "open"
              }, //Table Group 1


              {
                  "id" : 2,
                  "x" : 340,
                  "y" : 85,
                  status : "taken"
              },
              {
                  "id" : 2,
                  "x" : 440,
                  "y" : 85,
                  status : "taken"
              }, //Table Group 2

              {
                  "id" : 3,
                  "x" : 660,
                  "y" : 85,
                  status : "taken"
              },
              {
                  "id" : 3,
                  "x" : 760,
                  "y" : 85,
                  status : "taken"
              },//Table Group 3

              {
                  "id" : 4,
                  "x" : 710,
                  "y" : 310,
                  status : "open"
              },
              {
                  "id" : 4,
                  "x" : 710,
                  "y" : 410,
                  status : "open"
              }

          ],

          walls : [
              {
                  "x": 0,
                  "y": 260
              },
              {
                  "x": 0,
                  "y": 440
              },
              {
                  "x": 80,
                  "y": 260
              },
              {
                  "x": 80,
                  "y": 440
              }
          ],

          plants : [
              {
                  "x": 40,
                  "y": 330
              },

              {
                  "x" : 900,
                  "y" : 562
              },

              {
                  "x" : 40,
                  "y" : 562
              }
          ]

    };


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
            displayTooltip(width/2-40, 40-50, text);

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
            displayTooltip(width/2-40, 90-20, text);
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
            displayTooltip(width/2-40, 190-20, text);
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
            displayTooltip(width/2-40,270-50, text);
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
            displayTooltip(width/2-40, 270-50, text);
        });


    canvas.selectAll(".chair")
        .data(data.chairs)
        .enter().append("circle")
        .attr("r", 30)
        .attr("cx", function(d){return d.x;})
        .attr("cy", function(d){return d.y;})
        .attr("class", "chair")
        .style("fill", function(d){

            var check = d.status;

            for(var i = 0; i < data.tables.length;i++){
                if(data.tables[i].id == d.table_id){
                    if(getColor(data.tables[i].status) == "green"){
                        return getColor(d.status);
                    }else{
                        return getColor(data.tables[i].status);
                    }

                }
            }

            switch(check){
                case "handicap":
                    return "blue";
                case "taken":
                    return "brown";
                default:
                    return "green";
            }

        })
        .style("stroke", "black")
        .style("stroke-width", 3);


    canvas.selectAll(".table")
        .data(data.tables)
        .enter().append("rect")
        .attr("width", 80)
        .attr("height", 80)
        .attr("y", function(d){ return d.y;})
        .attr("x", function(d){return d.x;})
        .attr("class", "table")
        .style("fill", "white")
        .style("stroke", "black")
        .style("stroke-width", 3);

    canvas.selectAll(".wall")
        .data(data.walls)
        .enter().append("rect")
        .attr("width", 80)
        .attr("height", 30)
        .attr("y", function(d){return d.y;})
        .attr("x", function(d){return d.x;})
        .attr("class", "wall")
        .style("fill", "gray")
        .style("stroke", "black")
        .style("stroke-width", 3);

    canvas.selectAll(".plant")
        .data(data.plants)
        .enter().append("circle")
        .attr("r", 30)
        .attr("cx", function(d){return d.x;})
        .attr("cy", function(d){return d.y;})
        .attr("class", "plant")
        .style("fill", "saddlebrown")
        .style("stroke", "black")
        .style("stroke-width", 3)

    canvas.selectAll(".plantInner")
        .data(data.plants)
        .enter().append("circle")
        .attr("r", 25)
        .attr("cx", function(d){return d.x;})
        .attr("cy", function(d){return d.y;})
        .attr("class", "plantInner")
        .style("fill", "green")
        .style("stroke", "black")
        .style("stroke-width", 2);


    //Canvas Functions
    function getColor(check){
        switch(check){
            case "handicap":
                return "blue";
            case "taken":
                return "brown";
            default:
                return "green";
        }
    }


    //Tool tip functions
    function displayTooltip(x, y, text){
        //Display Tooltip on screen here!
        $("#tooltip").css({visibility: "visible", opacity: "100", top : y + "px", left: (x-13) + "px"});
        $("#tooltip").html("<p class='tooltip-text'>" + text + "</p>");
        toolX = x-13;
        toolY = y;
        tooltipOn = true;
    }

    $('body').mousemove(function(e){
       if(tooltipOn){

           //Do a test based on the radius for the break....
           if(Math.sqrt(Math.pow((e.clientX || e.pageX)-toolX, 2) + Math.pow((e.clientY || e.pageX)-toolY, 2)) > breakLimit){
               $("#tooltip").css({visibility: "hidden", opacity: "0"});
               toolX = 0;
               toolY = 0;
               tooltipOn = false;
           }
       }
    });

    $('#tooltip').click(function(){
        if(tooltipOn){
            $("#tooltip").css({visibility: "hidden", opacity: "0"});
            toolX = 0;
            toolY = 0;
            tooltipOn = false;
        }
    });


</script>


<?php

require("dry/footer.php");

?>