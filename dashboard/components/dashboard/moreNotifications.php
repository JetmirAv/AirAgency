<?php
require_once("../../../databaseConfig.php");
require_once("../../../models/booked.php");


if (isset($_POST['offset'])) {
    $output = "";
    $offset = (int)trim($_REQUEST['offset']);
    $lastBooked = Booked::notifications($conn, 10, $offset);
    if ($lastBooked->rowCount() > 0) {

        foreach ($lastBooked as $info) :
            $output .=  "<tr>" .
                "<td style='width: 100%'>" .
                $info['fullname'] .
                " booked a flight from " . $info['from'] .
                " to " . $info['to'] .
                " with plane " . $info['plane'] .
                "</td>" .
                "</tr>";

        endforeach;
        echo $output;
    }
    echo $output;
}
