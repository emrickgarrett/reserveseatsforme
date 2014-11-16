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
        <h1>Reservations Made Easy</h1>
        <p class="lead">Our powerful tool will allow you to schedule at any event with an uploaded floor plan without
        ever having to leave the comfort of your home. Plan study groups, dinners, and much more in a new and innovative
        way never seen before.</p>

        <p>
            <a class="btn btn-lg btn-success" href="restaurantSearch.php" role="button">Try it today</a>
        </p>

    </div>

    <div class="row">

        <div class="col-lg-4 box">
            <h2>Customers</h2>

            <p>Use the app to make reservations at popular locations near you, and see how crowded it is at any
            given time. Restaurants, study rooms, and much more is possible with the use of our powerful scheduling tools,
            even find handicap accessible seats at an event.</p>
        </div>

        <div class="col-lg-4 box">
            <h2>Businesses</h2>
            <p>Upload or create a floor plan of your building and use this to ensure your venue is at max capacity. Use this
            to plan seating in classrooms, libraries, restaurants, stadiums, and much, much more.</p>
            <p>
                <a class="btn btn-success" href="createRestaurant.php" role="button">Create Floor Plan</a>
            </p>
        </div>

        <div class="col-lg-4 box">
            <h2>Applications</h2>
            <p>ReserveSeatsFor.Me will be available both as a Desktop and Mobile web site, as well as a planned mobile app
            in the near future. Businesses can enjoy a version of the website to help them manage their reservations.<br/>
                <a href="#">Interested? Click Here to learn more!</a></p>
        </div>

    </div>

</div>



<?php

    require("dry/footer.php");

?>