<table id="hor-minimalist-b">
	<thead>
		<tr>
		< ? p h p 
			while ($row = mysqli_fetch_assoc($DataGridHeader))
			{
				foreach ($row as $col_name => $col_val)
				{
					echo "<th scope='col'>{$col_name}</th>";
				}
			}
		? >
		</tr>
	</thead>
	<tbody>
		< ? p h p 
			while ($row = mysqli_fetch_assoc($DataGridContent))
			{
				echo "<tr>";
				echo "<td>" . $row["valor1"] . "</div>";
				echo "<td>" . $row["valor2"] . "</div>";
				echo "<td>" . $row["valor3"] . "</div>";
				echo "<td>" . $row["valor4"] . "</div>";
				echo "<td>" . $row["valor5"] . "</div>";
				echo "<td>" . $row["valor6"] . "</div>";
				echo "<td>" . $row["valor7"] . "</div>";
				echo "<td>" . $row["valor8"] . "</div>";
				echo "<td>" . $row["valor9"] . "</div>";
				echo "<tr>";
			}
		? >
	</tbody>
</table>