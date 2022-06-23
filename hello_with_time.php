<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>Hello</title>
        <link rel="stylesheet" href="common.css"/>
    </head>
    <body>
        <h1>
            <?php 
            date_default_timezone_set("America/New_York");
            $currentTime = date("h:i:s A");
            $currentDate = date("M j, y");
            echo "Hello world! The current time is $currentTime and the date is $currentDate."; 
            
            ?>
        </h1>
    </body>

   </html>

