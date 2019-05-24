<?php 

    include "../databaseConfig.php";


    // $stmt = $conn->query("select * from users");
    // if($stmt === false) {
    //     echo "Wrong";
    // }

    // echo "<br />";
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    //     echo $row["id"] . " " . $row["firstname"] . " " .$row["lastname"] . " " . $row["email"] . "<br />"; 
        

    // endwhile;    

    $thisMonthQuery = "select COUNT(*) as 'num' from users ".
        " where MONTH(createdAt) = MONTH(CURRENT_DATE) ".
        " AND YEAR(createdAt) = YEAR(CURRENT_DATE);";     
    $thisMonth = $conn->query($thisMonthQuery);

    
?>

<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "This Month"},
			{y: 7.31, label: "Other"},
		]
	}]
});
chart.render();

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
