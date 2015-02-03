<?php
	if(!isset($_GET['day']))
	$day = '01';
	else
	$day = $_GET['day'];	

	// Validate GET date values
	if(checkdate($_GET['month'], $day, $_GET['year']) !== false) {
		$selected_day = $_GET['year'] . '-' . $_GET['month'] . '-' . $day;	
	} else { 
		echo 'Invalid date!';
		exit();
	}
	
	?>
			
				<form method='post' action='book_slots.php'>								
					<input type='hidden' name='uid' id='uid' value='" . $_SESSION['u_id'] . "'>
					<input type='hidden' name='fid' id='fid' value='" . $_SESSION['f_id'] . "'>
					<input type='hidden' name='slots_booked' id='slots_booked'>
					<input type='hidden' name='cost_per_slot' id='cost_per_slot' value='" . $this->cost_per_slot . "'>
					<input type='hidden' name='booking_date' value='" . $_GET['year'] . '-' . $_GET['month'] . '-' . $day . "'>
					
					<input type='submit' class='classname' value='Make Booking'>

				</form>
		