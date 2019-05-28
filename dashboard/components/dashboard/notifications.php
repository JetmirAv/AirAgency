<?php

require_once("../databaseConfig.php");

$lastBookedQuery = "SELECT b.id, CONCAT(u.firstname, ' ', u.lastname) as fullname, c1.name as 'from', c2.name as 'to'," .
    "a.name as 'plane' FROM booked b " .
    "inner join users u on u.id=b.userId " .
    "inner join flight f on b.flightId=f.id " .
    "inner join city c1 on f.fromCity = c1.id " .
    "inner join city c2 on f.toCity = c2.id " .
    "inner join airplane a on f.planeId = a.id " .
    "order by b.createdAt DESC limit 10;";
$lastBooked = $conn->query($lastBookedQuery);

?>



<table class="table" style="border-collapse: collapse;">
    <tbody id="notifications">
        <?php
        while ($info = $lastBooked->fetch(PDO::FETCH_ASSOC)) :
            echo "<tr>";
            echo "<td style='width: 100%'>";
            echo  $info['fullname'] . " booked a flight from " . $info['from'] . " to " . $info['to'] . " with plane " . $info['plane'];
            echo "</td>";
            echo "</tr>";
        endwhile;
        ?>

    </tbody>
    <tfoot>
        <tr id="toRemove">
            <td><button type="button" id="bttnMore">Show More</button></td>
        </tr>
    </tfoot>
</table>

<script>

    $(document).ready(function() {
        let offset = 10;
        $('#bttnMore').click(() => {
            $('#bttnMore').html("Loading...");
            $.ajax({
                url: 'components/dashboard/moreNotifications.php',
                type: 'POST',
                data: {
                    offset: offset
                },
                success: function(data) {
                    if(data != ""){
                        offset += 10;
                        $('#notifications').append(data);
                        $('#bttnMore').html("Show More");
                    } else {
                        $('#bttnMore').html("No more data");
                        $('#bttnMore').attr('disabled', true)
                    }
                }
            });
        });
    });


</script>