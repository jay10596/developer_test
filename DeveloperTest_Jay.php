<?php
//Setting the default timezone
date_default_timezone_set('Australia/Brisbane');

//Accessing the api of the respective appid with metric unit for current weather of Brisbane City
$current_weather_url = 'http://api.openweathermap.org/data/2.5/weather?q=Brisbane&units=metric&appid=30b7a37aa6db97a15e0a6d5e6b899dea';
//Fetching the content of current weather from the url and storing the JSon in a variable
$current_weather_data = file_get_contents($current_weather_url);
//Decoding the Json and storing it into another variable
$current_weather = json_decode($current_weather_data, true);

//Accessing the api of the respective appid with metric unit for weather forecast of Brisbane City
$threeDay_weather_url = 'http://api.openweathermap.org/data/2.5/forecast?q=Brisbane&units=metric&appid=30b7a37aa6db97a15e0a6d5e6b899dea';
//Fetching the content of current weather from the url and storing the JSon in a variable
$threeDay_weather_data = file_get_contents($threeDay_weather_url);
//Decoding the Json and storing it into another variable
$threeDay_weather = json_decode($threeDay_weather_data, true);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
<!-- Dividing the app into 2 sections-->

<!-- This Left Hand Section is for current weather data-->
<section class="LHS">
    <h1>Current Weather Data</h1>

    <!-- Each of the h4 tags contains icon, label and the actual data-->
    <h4><i class="far fa-sticky-note"></i> General weather description: <span><?php echo($current_weather['weather'][0]['description'])?></span></h4>
    <h4><i class="fas fa-temperature-low"></i> Temperature: <span><?php echo($current_weather['main']['temp'])?></span></h4>
    <h4><i class="fas fa-cloud"></i> Feels like: <span><?php echo($current_weather['main']['feels_like'])?></span></h4>
    <h4><i class="fas fa-arrow-down"></i> Temp min: <span><?php echo($current_weather['main']['temp_min'])?></span></h4>
    <h4><i class="fas fa-arrow-up"></i> Temp max: <span><?php echo($current_weather['main']['temp_max'])?></span></h4>
    <h4><i class="fas fa-sun"></i> Sunrise: <span><?php echo date('g:i a',$current_weather['sys']['sunrise'])."\n"?></span></h4>
    <h4><i class="far fa-sun"></i> Sunset: <span><?php echo date('g:i a',$current_weather['sys']['sunset'])."\n"?></span></h4>
    <h4><i class="fas fa-tint"></i> Humidity: <span><?php echo($current_weather['main']['humidity'])?></span></h4>
</section>

<!-- This Left Hand Section is for weather forecast of 3 starts starting from tomorrow-->
<section class="RHS">
    <h1>3 Day weather Forecast</h1>

    <!-- This table contains the temperature and weather description of tomorrow at 9am and 3pm-->
    <table>
        <!-- This row contains the date of tomorrow-->
        <tr>
            <h3><?php echo(mb_substr($threeDay_weather['list'][8]['dt_txt'], 0, 10))?></h3>
        </tr>

        <tr>
            <th>9 am</th>
            <th>3 pm</th>
        </tr>

        <!-- This row contains the temperature at 8 am and 3 pm-->
        <tr>
            <td><span id="span2">Temp:</span> <?php echo($threeDay_weather['list'][8]['main']['temp'])?></td>
            <td><span id="span2">Temp:</span> <?php echo($threeDay_weather['list'][10]['main']['temp'])?></td>
        </tr>

        <!-- This row contains the general weather description at 8 am and 3 pm-->
        <tr>
            <td><span id="span2">Description:</span> <?php echo($threeDay_weather['list'][8]['weather'][0]['description'])?><br></td>
            <td><span id="span2">Description:</span> <?php echo($threeDay_weather['list'][10]['weather'][0]['description'])?><br></td>
        </tr>
    </table>

    <!-- This table contains the temperature and weather description of day after tomorrow at 9am and 3pm-->
    <table>
        <!-- This row contains the date of day after tomorrow-->
        <tr>
            <h3><?php echo(mb_substr($threeDay_weather['list'][16]['dt_txt'], 0, 10))?></h3>
        </tr>

        <tr>
            <th>9 am</th>
            <th>3 pm</th>
        </tr>

        <!-- This row contains the temperature at 8 am and 3 pm-->
        <tr>
            <td><span id="span2">Temp:</span> <?php echo($threeDay_weather['list'][16]['main']['temp'])?></td>
            <td><span id="span2">Temp:</span> <?php echo($threeDay_weather['list'][18]['main']['temp'])?></td>
        </tr>

        <!-- This row contains the general weather description at 8 am and 3 pm-->
        <tr>
            <td><span id="span2">Description:</span> <?php echo($threeDay_weather['list'][16]['weather'][0]['description'])?><br></td>
            <td><span id="span2">Description:</span> <?php echo($threeDay_weather['list'][18]['weather'][0]['description'])?><br></td>
        </tr>
    </table>

    <!-- This table contains the temperature and weather description of overmorrow at 9am and 3pm-->
    <table>
        <!-- This row contains the date of overmorrow-->
        <tr>
            <h3><?php echo(mb_substr($threeDay_weather['list'][24]['dt_txt'], 0, 10))?></h3>
        </tr>

        <tr>
            <th>9 am</th>
            <th>3 pm</th>
        </tr>

        <!-- This row contains the temperature at 8 am and 3 pm-->
        <tr>
            <td><span id="span2">Temp:</span> <?php echo($threeDay_weather['list'][24]['main']['temp'])?></td>
            <td><span id="span2">Temp:</span> <?php echo($threeDay_weather['list'][26]['main']['temp'])?></td>
        </tr>

        <!-- This row contains the general weather description at 8 am and 3 pm-->
        <tr>
            <td><span id="span2">Description:</span> <?php echo($threeDay_weather['list'][24]['weather'][0]['description'])?><br></td>
            <td><span id="span2">Description:</span> <?php echo($threeDay_weather['list'][26]['weather'][0]['description'])?><br></td>
        </tr>
    </table>
</section>
</body>
</html>

<!-- CSS styling section-->
<style>
    /* This section contains the position and margin of both the sections */
    section {
        height: 100%;
        width: 50%;
        top: 0;
        position: fixed;
        overflow-y: scroll;
    }

    /* This section contains the design of current weather */
    .LHS {
        left: 0;
        background-color: darkslategrey;
        text-align: justify;
        color: lightgray;
        padding-left: 15%;
    }

    /* This section contains the design of weather forecast of 3 days */
    .RHS {
        right: 0;
        background-color: lightgray;
        text-align: center;
        color: darkslategrey;
    }

    /* Designing for all the h1 tags */
    h1 {
        padding: 10%;
    }

    /* Designing for all the h4 and h3 tags */
    h4, h3 {
        font-family: Courier;
    }

    /* Designing for all the spans */
    span {
        color: lightgray;
        font-family: "Arial";
        font-weight: lighter;
    }

    /* Designing for all 3 tables of RHS */
    table{
        width: 75%;
        border-collapse:collapse;
        margin-left: auto;
        margin-right: auto;
    }

    /* Designing for table columns */
    td{
        width: 50%;
        text-align: left;
        border: 1px solid black;
        font-weight: bold;
    }

    /* Designing for spans with id span2 */
    #span2 {
        font-family: Courier;
        font-weight: lighter;
        color: darkslategrey;
        margin-right: 10px;
    }

    /* Designing for font-awesome icons */
    i {
        color: darkkhaki;
    }
</style>