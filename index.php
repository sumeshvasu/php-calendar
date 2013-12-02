<?php
$calendar_attributes = array(
    'min_select_year' => 1981,
    'max_select_year' => 2025
);
//ajax request
if (isset($_REQUEST['action']) AND $_REQUEST['action'] == 'pn_get_month_cal') {
    include_once 'classes/calendar.php';
    $calendar = new PN_Calendar($calendar_attributes);
    echo $calendar->draw(array(), $_REQUEST['year'], $_REQUEST['month']);
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="css/calendar.css" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
        <script src="js/calendar.js" ></script>
        <script type="text/javascript">
            //var ajaxurl = "<?php //echo $_SERVER['SCRIPT_URI'] ?>";
            var ajaxurl = "";
            var pn_appointments_calendar = null;
            jQuery(function() {
                pn_appointments_calendar = new PN_CALENDAR();
                pn_appointments_calendar.init();
            });
        </script>
        <title>Calendar</title>
    </head>
    <body>
        <?php
        include_once 'classes/calendar.php';
        $calendar = new PN_Calendar($calendar_attributes);
        echo $calendar->draw();
        ?>
    </body>
</html>


