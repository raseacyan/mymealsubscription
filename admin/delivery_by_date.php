<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

    <form action="meal_options_by_date.php" method="get">
        <input type="date" name="date" value="2022-02-07"/>
        <input type="submit" name="submit" value="submit"/>
    </form>

	
		<table border="1" cellpadding="10" cellspacing="1">
			<tr>
				<th>Date</th>                
                <th>Customer Name</th>
                <th>Address</th>
                <th>Township</th>
			</tr>
			
			<tr>
				<td>2022-02-07</td>
                <td>Effy</td>
                <td>Inya View, Kan Street</td>  
                <th>Kamayut</th>         
               
			</tr>
			
		</table>


		
</body>
</html>