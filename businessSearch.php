<?php
/**
 * Created by PhpStorm.
 * User: Garrett
 * Date: 11/15/2014
 * Time: 13:20
 */

    require("dry/header.php");

?>

    <div class="container" style="min-height:36em;">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="jumbotron">
                    <h2>Search For Your Favorite Locations...</h2>

                    <p class="lead">If we have a floor plan, we'll take you to it!</p>

                    <div class="input-group">
                        <input type="text" class="form-control" id="search" autofocus="true">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="navigate();">Search!</button>
                      </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">

   function navigate() {

       window.location.href = "reserve.php?search=" + $('#search').val();
   }
</script>

<?php

    require("dry/footer.php");

?>