<?php
	require "func.inc.php";

	if (isset($_GET['action']))
	{
		switch ($_GET['action']) {
			case 'add':
				AddParticipant($_GET['name']);
				break;

			case 'remove':
				RemoveParticipant($_GET['name']);
				break;

			case 'voteup':
				VoteUp($_GET['name']);
				break;

			case 'votedown':
				VoteDown($_GET['name']);
				break;
		}
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Poll</title>
</head>
<body>
	<table>
		<?php foreach (GetParticipants() as $name => $votes): ?>
			<tr>
				<td><?php echo $name; ?></td>
				<td><?php echo $votes; ?></td>
				<td>
					<form action="" name="voteUp">
						<input type="hidden" name="name" value="<?php echo $name; ?>" />
						<input type="submit" value="Up" />
						<input type="hidden" name="action" value="voteup" />
					</form>
				</td>
				<td>
					<form action="" name="voteDown">
						<input type="hidden" name="name" value="<?php echo $name; ?>" />
						<input type="submit" value="Down" />
						<input type="hidden" name="action" value="votedown" />
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<div>
		<form action="" name="addParticipant">
			<input type="text" name="name" value="" />
			<input type="submit" value="Add participant" />
			<input type="hidden" name="action" value="add" />
		</form>
	</div>
	<div>
		<form action="" name="removeParticipant">
			<input type="text" name="name" value="" />
			<input type="submit" value="Remove participant" />
			<input type="hidden" name="action" value="remove" />
		</form>
	</div>
</body>
</html>
	