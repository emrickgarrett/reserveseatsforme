<?php
/**
 * Created by PhpStorm.
 * User: Garrett
 * Date: 11/15/2014
 * Time: 02:34
 */

    require("dry/header.php");

?>

<div class="container">
    <div class="jumbotron">
        <h1>Dining Made Easy</h1>
        <p class="lead">ReserveSeatsFor.Me allows you to view the seating capacity and available seats at your favorite local
        restaurants from a computer or smartphone without even stepping out the door. Reserve seats, make plans, and never
        wait in another line again.</p>

        <p>
            <a class="btn btn-lg btn-success" href="restaurantSearch.php" role="button">Try it today</a>
        </p>

    </div>

    <div class="row">

        <div class="col-lg-4 box">
            <h2>Customers</h2>

            <p>Use the app to make reservations at popular restaurants near you, and see how crowded a restaurant is at any
            given time.</p>
        </div>

        <div class="col-lg-4 box">
            <h2>Restaurants</h2>
            <p>Upload or create a floor plan of the restaurant and use this to schedule your restaurant and ensure your restaurant
            is always at max capacity.</p>
            <p>
                <a class="btn btn-success" href="createRestaurant.php" role="button">Create Floor Plan</a>
            </p>
        </div>

        <div class="col-lg-4 box">
            <h2>Applications</h2>
            <p>ReserveSeatsFor.Me will be available both as a Desktop and Mobile web site, as well as a planned mobile app
            in the near future. Restaurants can enjoy a version of the website to help them manage their reservations.<br/>
                <a href="#">Interested? Click Here to learn more!</a></p>
        </div>

    </div>

</div>



<?php

    require("dry/footer.php");

?>