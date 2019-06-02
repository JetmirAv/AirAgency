<script>
    let executed = false;
    function getCities(){
        console.log("EXEc");
        if(!executed){
            $.ajax({
                url: 'components/getCities.php',
                type: 'POST',
                success: function (data) {
                    if (data != "") {
                        document.getElementById("fromCity").innerHTML = data;
                        document.getElementById("toCity").innerHTML = data;
                    } else {
                        alert("Jo")
                        $("#to").append("<option >No Flight found</option>");
                        $("#bttnFindFlight").attr('disabled', true);
                    }
                }
            });
            executed = true;
        }
    }
    getCities();
</script>
<form action="../main/flights.php" method="get">
    <div class="row justify-content-between align-items-end">
        <div class="col-6 col-md-2 col-lg-3">
            <label for="Search">From</label>
            <select
                onchange="getAssocCities(this)"
                name="fromCity"
                id="fromCity"
                class="form-control">
                
                </select>
        </div>
        <div id="test" class="col-6 col-md-2 col-lg-3">
            <label for="checkIn">To</label>
            <select 
                name="toCity" 
                id="toCity" 
                class="form-control">
            
            </select>
        </div>
        <div class="col-6 col-md-2 col-lg-3">
            <label for="checkOut">Check In</label>
            <input
                type="date"
                min="<?php echo date("
                Y-m-d") ?>"
                max="<?php echo date("
                Y-m-d", strtotime("
                +4
                weeks")) ?>"
                class="form-control"
                id="checkOut"
                name="checkout-date">
        </div>

        <div class="col-12 col-md-3">
            <button
                id="bttnFindFlight"
                type="submit"
                class="form-control btn roberto-btn w-100">Check Flights</button>
        </div>
    </div>
</form>

<script>
    // function getAssocCities(e) {
    //     console.log(e.value);
    //     $.ajax({
    //         url: 'components/getCities.php',
    //         type: 'POST',
    //         data: {
    //             refreshCity: true,
    //             fromCityId: e.value
    //         },
    //         success: function (data) {
    //             if (data != "") {
    //                 alert(data); 
    //                 document.getElementById("toCity").innerHTML = data;
    //             } else {
    //                 alert("Jo")
    //                 $("#to").append("<option >No Flight found</option>");
    //                 $("#bttnFindFlight").attr('disabled', true);
    //             }
    //         }
    //     });
    // }
</script>