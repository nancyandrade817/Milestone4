<table>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>	
		<?php 
		for ($index = 0; $index < count($users); $index++) {
		    echo "<tr>";
		    echo "<td>"  . $users[$index][0]. "</td>" .
		          "<td>" . $users[$index][1]. "</td>" .
		          "<td>" . $users[$index][2]. "</td>" ;
		    echo "</tr>";
		}
	   ?>

	</tr>
</table>
