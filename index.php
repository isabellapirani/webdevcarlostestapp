<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US"> 

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> 
		Visitors' Parking Lot Tool 
	</title>


	<style>
		.error {color: #FF0000;}
	</style>

	<!-- Include CSS for different screen sizes -->
	<link rel="stylesheet" type="text/css" href="defaultstyle.css">
</head>

<body>

<?php
	
	require 'connectToDatabase.php';

	// Connect to Azure SQL Database
	$conn = ConnectToDabase();

	/*// Get data for expense categories
	$tsql="SELECT CATEGORY FROM Expense_Categories ORDER BY CATEGORY ASC"; 
	$expenseCategories= sqlsrv_query($conn, $tsql);

	// Populate dropdown menu options 
	$options = '';
	while($row = sqlsrv_fetch_array($expenseCategories)) {
		$options .="<option>" . $row['CATEGORY'] . "</option>";
	}*/

	// Close SQL database connection
	sqlsrv_close ($conn);

	/*// Get the session data from the previously selected Expense Month, if it exists
	session_start();
	if ( !empty( $_SESSION['prevSelections'] ))
	{ 
		$prevSelections = $_SESSION['prevSelections'];
		unset ( $_SESSION['prevSelections'] );
	}

	// Extract previously-selected Month and Year
	$prevExpenseMonth= $prevSelections['prevExpenseMonth'];
	$prevExpenseYear= $prevSelections['prevExpenseYear'];*/
?>

<div class="intro">

	<h2> Visitors' Parking Lot Tool </h2>

	<!-- Display redundant error message on top of webpage if there is an error -->
	<h3> <span class="error"> <?php echo $prevSelections['errorMessage'] ?> </span> </h3>

</div>

<!-- Define web form. 
The array $_POST is populated after the HTTP POST method.
The PHP script insertToDb.php will be executed after the user clicks "Submit"-->
<div class="container">
	<form action="insertToDb.php" method="post">

		<label>Vehicle Make:</label>
		<input type="text" name="vehicle_make" ><br>

        <label>Vehicle Model:</label>
		<input type="text" name="vehicle_model" ><br>

        <label>Start Day (1-31):</label>
		<input type="number" step="1" name="start_day" required>

		<!-- Dropdown menu for expense month, remembering previously selected month -->
		<label>Start Month:</label>
		<select name="start_month">
			<option value="-1">Month:</option>
			<option value="01">Jan</option>
			<option value="02">Feb</option>
			<option value="03">Mar</option>
			<option value="04">Apr</option>
			<option value="05">May</option>
			<option value="06">Jun</option>
			<option value="07">Jul</option>
			<option value="08">Aug</option>
			<option value="09">Sep</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
		</select><br>

		<!-- Text input for year, remembering previously selected year -->
		<label>Start Year (YYYY):</label>
		<input type="number" step="1" name="start_year" required><br>

        <label>End Day (1-31):</label>
		<input type="number" step="1" name="end_day" required>

		<!-- Dropdown menu for expense month, remembering previously selected month -->
		<label>End Month:</label>
		<select name="start_month">
			<option value="-1">Month:</option>
			<option value="01">Jan</option>
			<option value="02">Feb</option>
			<option value="03">Mar</option>
			<option value="04">Apr</option>
			<option value="05">May</option>
			<option value="06">Jun</option>
			<option value="07">Jul</option>
			<option value="08">Aug</option>
			<option value="09">Sep</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
		</select><br>

		<!-- Text input for year, remembering previously selected year -->
		<label>End Year (YYYY):</label>
		<input type="number" step="1" name="end_year" required><br>


		<label>Name of Employee [no accents or tildes]:</label>
		<input type="text" name="name_employee" ><br>

		<button type="submit">Submit entry</button>
	</form>
</div>
</body>
</html>
