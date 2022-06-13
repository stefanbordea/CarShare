<?php
require '../App/Views/common/head.php';
require '../App/Views/common/navigation.php';
?>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
</head>


<div class="aboutUs" >
    <div class="row" id="aboutUsRow">
        <div class="col-md-12">
            <h1>ABOUT US </h1>
        </div>
    </div>
    <div class="row" id="aboutUsRow">
        <div class="col-md-12">
            <p>
                Carshare.com is a website built as a project for a university module.
            </p>
        </div>
    </div>
    <div class="row" id="aboutUsRow">
        <div class="col-md-12">
            <p>
                Our offices are located on Alexandras Ave. 205, in Ampelokipoi, Attiki.
            </p>
        </div>
    </div>
    <div id="map"></div>
    <div class="row" id="aboutUsRow">
        <div class="col-md-12"  id="ifu">
            <p>
                If you have any questions or if you would like to come visit our offices, please send an email at one of the following e-mails:
            </p>
        </div>
    </div>

    <div class="row" id="aboutUsRow">
        <div class="col-md-12" >
            <ul id="emailList">
                <li id="email">
                    myoun@athtech.gr
                </li>
                <li>
                    dpetrotos@athtech.gr
                </li>
                <li>
                    sbordea@athtech.gr
                </li>
                <li>
                    ndimitriou@athtech.gr
                </li>
            </ul>




        </div>
    </div>





</div>



<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="/js/map.js"></script>

<script>

</script>