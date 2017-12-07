
This page shows image from array creating 4 columns with it

<?php
	for($i = 0; $i < count($imgUrl); $i++)
	{
		if(in_array($i, array(4, 8, 12, 16, 20)))
	  {
			echo "</tr><tr>";
		}
		echo "<td>
				  <div style=\"height: 200px\">
					<img src=\"img/x.png\"
						  style=\"position: relative;height: 35px; left: 175px; z-index: 10;
									box-shadow: 5px 3px 1px #000;\"/>
					<img src=\"" . $imgUrl[$i] . "\" style=\"height: 65%; position: relative; float: right\"/>
				  </div>
			  </td>";
	}
	 //if(!(empty($imgUrl[$i]))){ echo "<td></td>"; } }
?>
