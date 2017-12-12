<?php
	include "included.php";
?>

<form enctype="multipart/form-data" action="sources.php">
	&nbsp
	<div class="form_select">
		<select name="topic">
			<?php
				$query = "SELECT name, id from topic order by name";
				$result = mysqli_query($connection, $query);
				while($row = mysqli_fetch_array($result))
				{
					echo "<option value='$row[1]'>$row[0]</option>";
				}
			?>
		</select>
	&nbsp
		<select name="subTopic">
			<?php
				$query = "SELECT name, id from subtopic order by name";
				$result = mysqli_query($connection, $query);
				while($row = mysqli_fetch_array($result))
				{
					echo "<option value='$row[1]'>$row[0]</option>";
				}
			?>
		</select>
	&nbsp
		<select name="difficulty">
			<option value="Easy"> Easy </option>
			<option value="Intermediate"> Intermediate </option>
			<option value="Advanced"> Advanced </option>
		</select>
	</div>

<div class="select_input">
<input class="input_button" type="submit" value="Search" />
</div>
</form>

<h5><i>Knowledge is a weapon. I intend to be formidably armed.<i></h5>
<div class="footer">
<hr class="fancy-line"></hr>
<p>Made with magic by Jamie Ackerson, Ian Brobin, Faisal Lalani, Keiran Pirie, & Karl Todd</p>
</div>
</body>
</html>
