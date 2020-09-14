 
 <!DOCTYPE html>
<html>
	<head>
		<title>Calculator</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">		 
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
		<div class="container" style="margin:50px; background-color:#f9ecf2">	

<?php
		$conn = new mysqli("localhost","root"," ","Calc");
		
		$fnum="";
		$snum="";
		$opr="";
		$caltable_set="";
		// If the submit button has been pressed
		if(isset($_POST['submit']))
		{
			// Check number values
			if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))
			{
				$fnum=$_POST['number1'];
				$snum=$_POST['number2'];
				$opr=$_POST['operation'];
		
				// Calculate total
				if($_POST['operation'] == 'plus')
				{
				$total = $_POST['number1'] + $_POST['number2'];	
				}
				if($_POST['operation'] == 'minus')
				{
				$total = $_POST['number1'] - $_POST['number2'];	
				}
				if($_POST['operation'] == 'multiply')
				{
				$total = $_POST['number1'] * $_POST['number2'];	
				}
				if($_POST['operation'] == 'divided by')
				{
				$total = $_POST['number1'] / $_POST['number2'];	
				}
		
				// Check connection
				if ($conn->connect_error) {
				   die("Connection failed: " . $conn->connect_error);
				} 
				
				//Insert Query
				$sql = "INSERT INTO Calc(Calc_FirstNo,Calc_SecNo,Calc_Opreration,Calc_Result)
				VALUES ($fnum,$snum,'$opr',$total)";
				$conn->query($sql);
				
				
				//After saving showing the result
				$result = "SELECT * from Calc";
				$resultset = $conn->query($result);

				if ($resultset->num_rows > 0) {  
				  while($row = $resultset->fetch_assoc()) {
					$caltable_set .= "<tr><th>" . $row["Calc_FirstNo"]. "</th>
					<th>" . $row["Calc_SecNo"]. "</th>
					<th> " . $row["Calc_Opreration"]. "</th>
					<th> " . $row["Calc_Result"]. "</th></tr>";
					}
				} else {
				  $caltable_set .=  "<tr><th colspan='4'>No Records Found</th></tr>";
				}
				$conn->close();				
		
				// Print total to the browser
				echo "<h3>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals {$total}</h3>";
		
			} else {		
				// Print error message to the browser
				echo '<h3>Numeric values are required</h3>';
		
			}			
		}else{
				//fetching the result
				$result = "SELECT * from Calc";
				$resultset = $conn->query($result);

				if ($resultset->num_rows > 0) {  
				  while($row = $resultset->fetch_assoc()) {
					$caltable_set .= "<tr><th>" . $row["Calc_FirstNo"]. "</th><th>" . $row["Calc_SecNo"]. "</th><th> " . $row["Calc_Opreration"]. "</th><th> " . $row["Calc_Result"]. "</th></tr>";
					}
				} else {
				  $caltable_set .=  "<tr><th colspan='4'>No Records Found</th></tr>";
				}
				$conn->close();		
		}
	
		?>
	    
		    <!-- Calculator form-->
		    <form method="post" id="CalC">
		        <input name="number1" type="number" class="form-control" style="width: 150px; display: inline; margin:20px" id="number1"/>
		        <select name="operation" style="margin:20px">
		        	<option value="plus">Plus</option>
		            <option value="minus">Minus</option>
		            <option value="multiply">Multiply</option>
		            <option value="divided by">Devide</option>
		        </select>
		        <input name="number2" type="number" class="form-control" style="width: 150px; display: inline; margin:20px" id="number2"/>
		        <input name="submit" type="submit" value="Calculate" class="btn btn-primary" style="margin:20px" />
		    </form>			
	    
		</div>
		<div class="container" style="margin-top: 50px">
			<table border="1" align="center">
		<tr>
			<th>First No</th>	
			<th>Second No</th>	
			<th>Operation</th>
			<th>Result</th>
		</tr>	
			<?php  echo $caltable_set;?>				
		</table>
		</div>
	
	</body>
</html>
