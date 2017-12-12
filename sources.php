<?php
include "included.php";
?>
<?php
	if(!isset($_REQUEST['topic'])){
		die("No topic input, please try again");
	}

	if(!isset($_REQUEST['subTopic'])){
		die("No subTopic input, please try again");
	}

	if(!isset($_REQUEST['difficulty'])){
		die("No difficulty input, please try again");
  }

	$topic = $_REQUEST['topic'];
	$subTopic = $_REQUEST['subTopic'];
	$difficulty = $_REQUEST['difficulty'];
?>
	<?php
	$sortingQuery = mysqli_prepare($connection, "SELECT id, url, rank, type FROM links WHERE subTopicId = ? ORDER BY rank DESC");
	mysqli_stmt_bind_param($sortingQuery, "d", $subTopic);
	if(!mysqli_stmt_execute($sortingQuery)){
		die("SQL Query Failed: ".mysqli_error($connection));
	}
	//when executed, bind variables
	mysqli_stmt_bind_result($sortingQuery, $id, $url, $rank, $type);
	?>
	</br>
	<script>
		$(document).ready(function(){
			$('.voting').click(function(){
				var upDown = $(this).attr('name');
				var id = $(this).attr('value');
				console.log(upDown);
				console.log(id);
				var ajaxurl = 'ranking.php?upDown='+upDown+'&id='+id;
				$.post(ajaxurl, function(response) {
					console.log(response);
					location.reload();
				});
			});
		});
	</script>

	<div class="masonry">
	<?php
	while(mysqli_stmt_fetch($sortingQuery)) {//looping through each row in the table
		echo "<a href=$url><div class='item'>";
		if ($type == 'tutorial') {
			echo "<img src='data:image/png;base64,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'>";
			echo "<br>";
			echo "<h3 class='item_header'>Tutorial</h2>";
		} elseif ($type == 'course') {

			echo "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATqSURBVHhe7ZxLbxNXGIYj9R/0T/QHdNufUVa0i6o7EAs2VKjLLtplpW5ArQIhaU0CpdCoaZNycZJiA0kgISGG2Lk6jp0U0pKSbk/Pa3mUuXy+lTkzxyfvKz2S8XznZM73EM9k7HEfwzAMwzAMwzAMwzAMw/R6Ll1dOdmfWfmMxA9622hz57mUWZnWAxUxgO5to82dh0IMQiGWYVJI5uaq+vVumWjQC6lHEUwKufvHjqrt/Us0d6YrYo8imBTy+OlLceeOI3O6F1KPIpgS8sONkqpU34g7dxzZ1r34XvdE6lUAU0IWlvfFHTvOzD97JfYqQNxCrowU+VLVgrnFl2pA90jqXZ04hAz+WFQ3xjbUVL6mNsv/iDtCjtjQPZrMV+s9Q+/8vYxFyMMnf4o/mLQHvfP3kkJSxgoh5Z3D4E44BNYmrbkZFGIYCrEMCrEMCrEMCrEMCrEMCrGMnhSyUztU80uvnARrk9bcDCuEkCMoxDIoxDKsELKze6hyM7tOgrVJa26GFUJ4lnUEhRiGQiyjJ4VU9Lm69GEyF8DapDU3wwoh5AgKsQwKsQwKsQwKsYxjJwRXX7u9ApskzgvZqrxR+dk9dWt8M/CpQDzGcw/m9uo10tg0cFYIriHdf1RTg9faf8J86HqxXtvtdScTOCmkrP/H/zyxFVxYB4zqMduVdKU4JwTHh5/GNoKL6gKMraZ4jHFOyO2p6K1iA8NFNTFZUUuFfbW+daDWNg/Uon48kd2ubwvX43Yzae4kcErIyuprdXnYtxgNbq7E81I9wLbwDZiYo7jWfIxJnBKCi3n+/Ri8XlKrGwdirZ/V9df1Wv/Y3+5ti7WmcUYIjh3hM6r87K5YK4Fa/1jMlcZZlzNClot/BRaC28RwtiXVSqA2/HJXKP4t1prEGSH4DJR/H66Nrol1rRgZXQ/MgTmlOpM4I2RmPrgQnL5Kda0Iny5jTqnOJM4Iebq8H1gIzpykulaEz7Ywp1RnEmeElNYPggvRlPTZk1Qr8bbj48IZIeDqzbXAYsb1H35SnQROc/1jh291fwyKA6eETD2oBRejmV1ovy/h4w/AXFKtaZwSgguDkRvvNWguvlskUq+fy+aqkfoh/Uditx/fiQunhIDHi/K37KDJE9mKuj9Tq4PHeE6qfaLnkOZOAueEAOmlq1OmH6bzUuXhpBAAKf2+fWoHaqdTOm74cVYIrk2d+TyvLl4pqP7Mi+AifWDbBV2D2m6ufZnCiBAcKPG+g/QDkwLN/eh0ts7p8zn15TcL6sJAQX079LwOHn+ln8M2ry5tIXifJnKSEYcQD5zLw3h1V94Bk/iFdEoaQtCbR7pH6JXUw1iFeIzdLif+tmgvCEFPfrnT5r1/E0IAfhWlnTJFLwjBt7RKvQpgSgjeu07yuGK7EBwvpPfzI5gSAnIJLth2Ibj/UOpRBJNCfp9M7tMctgtBL6QeRTApJEm+vrgkNr0VGCPNlSoUIs+XGhQiz5caFCLPlxr/R8h3w4X3Lo+U3reJc1/MfCo1/ZOzU+NA2oYx0lxpgt422tzb+fjUvQ/CDT95Kps5cWLkHYDH4e0Y0xjOxJ2wEE9GY3OfJIVCDMYvJCzDS1gKhRiMJ6SZDC9+KRRiMGhuOxlePCkUYjAfns2924kML6jFmMY/GYZhGIZhGIZhGIZhGIZhGCaR9PX9B5GVkZ5Shm39AAAAAElFTkSuQmCC'>";
			echo "<br>";
			echo "<h3 class='item_header'>Course</h2>";
		}  elseif ($type == 'video') {

			echo "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMgSURBVHhe7Z3LaxNRFIe78B/w/yn4QBERxEexUMQXWFDELkREBAu66KKLTNUWLQXBJFaiSZrGpmkiqRqxaDW+0WpTUBRxI23RonZxnBsmcA2HNKmZmZOZ3wffqsnk3vMtMjNp0xYAAAAAAAAAAAAAAAAAoD4CofiBvnC8s5lUa7aW7z2MYGzeCMWoqTTXbC3feyCIMBBEGJVBrozkaCiZF6Vak75GXwVJvPhG2bllUao16WtEEJdFEGYobuqZIN2Tk2sGwrfXVtPc4IK+2XjhC028XxKlWpO+RtMFbi+6au/WGORghGOtFRvxj+berTHIAUGEgSDCQBBhVAa5MDzKvml6QbU3fa9NEeTicJI9rfSCam/6XhHEZRFEmCKCBELR4+ZVa7aK0/oi+8Ij7M07L6j2pu+1tHd+JiXV7KwxNg4jGB34ZxGwds3ZWWNsHAjyHyKIMJ0IMjh6jyJTRcioZqPPypEg17JP2TMQuFyajT4rBHFZBBEmgggTQYSJIMJEEGEiiDARRJgIIkzPB7k5vUjJN0vszyTq+SCB6CfaujdLPaE5mpj9wz5Gkr4Ism7nWMm2I3fpcuor+zgp+ipI2UOnH9H1h/Ps493Wl0GUG3an6ETvS0q8+sk+zy19G6Tslo4Mnb86S+kPv9nnO63vg5TdcThHlxKf2WM4KYJUuO/kFAXz39ljOSGCMK7flaKunmcUf/6DPaadIkgVN7enqXtwhlIzv9hj2yGC1OD2gzkyzONkivxrNFIEqcOOrgc0lLH3bxsRpE7V2Vjk8SL7Wo0QQWrUqesVBFlBp6/oEaSKbtzzQhBGN+8KI4imhM9NEMR0Y9s4nTJei/hk0fdBOs8+sfU0tl59G6T92H3bL/JWo++CbNt/h3pvfKRMUebn674JsmlPms70v6Wxd87dKFyNng+ibgoePVegWwU57xPV9HyQZvjVH13PB2k2EUSYCCJMBBEmgggTQYSJIMJEEGEiiDARRJiuBOmPjLPftgbzpdnos3IkCKxDBBEmggjTliDhWCv3b+Xgyor8Xl8AAAAAAAAAAAAAAAAAttHS8hfWOiFVhj3/NQAAAABJRU5ErkJggg=='>";
			echo "<br>";
			echo "<h3 class='item_header'>Video</h2>";
		}  elseif ($type == 'paper') {

			echo "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAQ4SURBVHhe7Z1fSFNRHMcH9uehHnuy7A9Zuq2CUitdbfYgmlpthEFEj1k9VkTQQ2VpBhHEMkt7sH9EmnKztszMLSx9KCF6EKSeoqIgeukP/bE63bNdbV6PV7fu7Heu3w98Xsf57cN279k9MBsAAAAAAAAAAAAAAMBmW+u7tcLtDe51+24fsITqLHwmbTx5cJQ1TVMXf9njCzKLejGrvHeqNi593L5gtWAIa+kNVGnj0qao6M50tzfwSTiEheQz8m8CbWy6rPEGF4sGsKJ8Vm1surg3BZeKFm9F+aza2HRBEGIgCDEQhBgIQgwEIQaCEANBiIEgxEAQYuiDrNlwkzlW1rJ59uNsrr2SZWT7We76lmGDyap0QVwlCkvLOMZSFx4a5pxFFWxVUeOIAWWTbBAl1LPzZqi7R7X3RvujvvrrXYx79nIH8ze0DXmyLsAKvP5IlAXOE8IhZZJkkJZw9xKl89FvNQYbj413u9gCe0UkSm5xs3BQWSQZRAl1F4reeCMd2ccjQUb72qo49ZT1Pns/odZf7ReuxUiSQdrb22eon5DnojdeZHXNrUiM2elH2NqNrcJB6670s4mmo+uNcC1Gkr2GNIXDM1vDPUWtnT1l/oYH+3bs72DcbbubWemW2iHzi0+ztEWHI0Gcq88Jh+QiiInwRcYuepnrAktNj0aIepjZc2r4M+lhw8WKICaiD8Lle5EV+Zci5pWMvQfRB3n84Rfb9eSbqSqvf2qvHmVSBYlXfZBrLwdYSuNnUz347Lv26lEQxEAEMREEIYYoiKtUGbqGjGcziGuIieiDLM2rH3GXlZl9BndZyWS8+5B1JX/3IY5VtcIhuQjyD/AY6k79hWhXLnJwp84/NdipJwH+yRC98UY6c4x/y9IHefv1N7v/7qepvvj0S3v1KNYJ0vnQGdevvW1/f+3NKxZvEvVBcJcVJ0qou1x9s8d+HnL+NivYNPbzEAQxEb7IwQXz293RnhiuLmwaMeCgCGIisUG4Lu2Z+nxHNZtnr2KZWf4x9yL6IM2vBtgs5YupHu37ob16lEkTJBH1QSYCBDEQQUwEQYiBIMTQB0nkoFzBljZWuv3ehFq49a5wLUZKFwQH5f4TOChHCByUI0YyDsrJIskgyTgoJ4tkryFmH5STRbJBYuGLjF10IgflZFHKINx4D8rJorRBrCqCEBNBiCltkHgPysmilEESOSgni2SDmH1QThZJBknGQTlZJBkkGQflZJFmkCQclJNFstcQsw/KySLZILHwRQ4uONGDcrIoXRBuIgflZFHKIFYWQYiJIMREEGIiCDERhJgIQkwEISaCEBNBiClFEPzlETEmy5+CqX6U4k/BOOpiK3WLt5xuX/CYNi59PJ7wFHXRF/VDWEU1RkNZWVOKNq48uDffWe7xBfZ4vMETllCdhc+kjQcAAAAAAAAAAAAAwCTGZvsDhr++SZFWMDIAAAAASUVORK5CYII='>";
			echo "<br>";
			echo "<h3 class='item_header'>Paper</h2>";
		}  elseif ($type == 'article') {

			echo "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMhSURBVHhe7Z1NaxNRFIanuvJnZIqCCzciCG7cuxJKk1ApWQjuXEhFCoqCi4JQ/EDrB0VQC1HUKlK1YlKkIPGjwYULwZX+B/f3eAZmIInnjnOZzHDm5n3goZtwuTkPmXsbhQYAAAAAAAAAAACYdEy/e9HsdO9Nju/n4reuE97kd+p3aVLk93s7fus6QRBlIIgyEEQZCKIMBFEGgigDQZSBIMpwDvLxFdHr+/r8/Fbe74j+BVlbImqE+tx8KO93RAQpSwRRJoIoE0GUiSDKRBBlIogyJzYIfjEsFucgFbfQIKYeNk0j7OSy0/4jbdxXCw3Cz87Ff56lrmZ89voigigTQZTpX5CNVaKlVj6jNQbXfHZDfp2LH54Pr2nRvyDj+D0kWmNwzZWz8utczPg+EEQSQVJEkPHBG8EZkjixZ0jFRRBlIogy/QuyvU60fjOf0RqDa249kV/nYu/N8JoW/QuCW5Yd3giCJCJIDhEkRdcg7StErQP5jNYYXPPuovw6F9+tDa9p0b8gFRdBlIkgykQQZeJQl8ShnqJrEFx77fBGECQRQXKIICm6BsGXi3Z4oOUHqbgIokwEUaZ/QfCfHOzwQMsPgluWHd4IgiQiSA4RJEXXIDhD7PBAyw9ScRFEmQiiTP+C4LssOzzQ8oPglmWHN4IgiQiSQwRJ0TUI/k3dDg+0/CAVF0GUiSDKRBBl4lCXxKGeomsQXHvt8EYQJBFBcuhrEFMPz4mbc7HTFjdutepfLva7V+PxjR8zG7bEIbv4ZVPcuK/yJ2QhHt/4MY3aPnHIWT19VNy0z5qvW0fi8RWDqde+icPOYvTsFjbtq2an84vo0q54dMXA58gxcdj/8+RBok/Znru+yJ+O+XhsxcJRbolDtzm3l+jFirhpXzX96PZCU/HIioVmg918ntwRhz/q/H6ix8vipn01imF6vT3xuMqD6tPH+dPyUwzRnCa6MON+za2wfGb85hgnSvtkSFAQTJlmeMg0a2dMI1w2pw4/MudnXtKDy33z9PqPSrixus3X05E/u53VzjX+uRDdpgo/wAEAAAAAAAAAAFAaQfAXg3VBsXhj5M4AAAAASUVORK5CYII='>";
			echo "<br>";
			echo "<h3 class='item_header'>Article</h2>";
		}
		#echo "$rank";
		echo "<img src='thumbsup.png' id='vote'>";
		echo "<span class='rank'>$rank</span>";
		echo "<img src='thumbsdown.png' id='vote'>";
		#echo "<button class = 'voting' id = 'like' name = 'up' value = '$id'><span>Like</span></button>";
		#echo "<button class = 'voting' id = 'dislike' name = 'down' value = '$id'><span>Dislike</span></button>";
		echo "</div></a>";
	}

	mysqli_close($connection);
	?>
</div>

	<form enctype="multipart/form-data" action="addLink.php" method="post">
		&nbsp
		<div class="form_select">
			<select name="type">
				<option value='article'>Article</option>
				<option value='tutorial'>Tutorial</option>
				<option value='video'>Video</option>
				<option value='paper'>Paper</option>
				<option value='course'>Course</option>
			</select>
		&nbsp
		<select name="Difficulty" >
			<option value='0'>Easy</option>
			<option value='1'>Medium</option>
			<option value='2'>Hard</option>
		</select><br>
		&nbsp
			<input name="URL" class="url_field" type="text" placeholder="URL"><br>
		</div>

	<div class="select_input">
	<input class="input_button" type="submit" value="Submit" />
	</div>
	</form>
</body>
</html>
