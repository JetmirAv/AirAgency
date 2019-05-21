<form action="#" method="post">
    <div class="row justify-content-between align-items-end">
        <div class="col-6 col-md-2 col-lg-3">
            <label for="Search">From</label>
            <select name="from" id="from" class="form-control">
                <option value="01">Prishtina</option>
                <option value="02">Bayern</option>
                <option value="03">Barcelona</option>
                <option value="04">Tirana</option>
                <option value="05">Madrid</option>
                <option value="06">New York</option>
            </select>
        </div>
        <div class="col-6 col-md-2 col-lg-3">
            <label for="checkIn">To</label>
            <select name="to" id="to" class="form-control">
                <option value="01">Prishtina</option>
                <option value="02">Bayern</option>
                <option value="03">Barcelona</option>
                <option value="04">Tirana</option>
                <option value="05">Madrid</option>
                <option value="06">New York</option>
            </select>
        </div>
        <div class="col-6 col-md-2 col-lg-3">
            <label for="checkOut">Check In</label>
            <input type="date" min="<?php echo date("Y-m-d")?>" max="<?php echo date("Y-m-d", strtotime("+4 weeks")) ?>" class="form-control" id="checkOut" name="checkout-date">
        </div>

        <div class="col-12 col-md-3">
            <button type="submit" class="form-control btn roberto-btn w-100">Check Flights</button>
        </div>
    </div>
</form>