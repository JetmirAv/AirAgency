<?php include "getCities.php"?>

<form action="#" method="post">
    <div class="row justify-content-between align-items-end">
        <div class="col-6 col-md-2 col-lg-3">
            <label for="Search">From</label>
            <select onchange="getAssocCities(this)" name="fromCity" id="from" class="form-control">
                
                <?php
                    if(isset($_COOKIE['assocCity'])){
                        echo $_COOKIE['assocCity'];
                    } else {
                        foreach($output as $key=>$foundCity){
                            echo '<option value="'. $key .'">' . $foundCity . ' </option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div id="test" class="col-6 col-md-2 col-lg-3">
            <label for="checkIn">To</label>
            <select name="to" id="toCity" class="form-control">
                <?php
                
                foreach($output as $key=>$foundCity){
                    echo '<option value="'. $key .'">' . $foundCity . ' </option>';
                }
                ?>
            </select>
        </div>
        <div class="col-6 col-md-2 col-lg-3">
            <label for="checkOut">Check In</label>
            <input type="date" min="<?php echo date("Y-m-d")?>" max="<?php echo date("Y-m-d", strtotime("+4 weeks")) ?>" class="form-control" id="checkOut" name="checkout-date">
        </div>

        <div class="col-12 col-md-3">
            <button id="bttnFindFlight" type="submit" class="form-control btn roberto-btn w-100">Check Flights</button>
        </div>
    </div>
</form>

<script>
 function getAssocCities(e) {
        console.log(e.value);
        $.ajax({
            url: 'components/getCities.php',
            type: 'POST',
            data: {
                refreshCity: true,
                fromCityId: e.value
            },
            success: function (data) {
                if (data != "") {
                    document.cookie = "assocCity = " + data;
                    location.reload();  
                } else {
                    alert("Jo")
                    $("#to").append("<option >No Flight found</option>");
                    $("#bttnFindFlight").attr('disabled', true);
                }
            }
        });
    }

</script>