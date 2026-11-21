<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = $_POST['start'];
    $end   = $_POST['end'];
    $uid   = $user['id'];
    mysqli_query($conn, "INSERT INTO shifts (user_id, start_time, end_time) VALUES ('$uid', '$start', '$end')");
}
$uid = $user['id'];
$shifts = mysqli_query($conn, "SELECT * FROM shifts WHERE user_id='$uid' ORDER BY id DESC");
?>
<h2>Welcome, <?php echo $user['username']; ?></h2>
<h3>Log Shift</h3>
<form method="POST">
    Start: <input type="datetime-local" name="start"><br><br>
    End:   <input type="datetime-local" name="end"><br><br>
    <input type="submit" value="Submit">
</form>
<h3>Your Shift History</h3>
<table border="1">
<tr><th>ID</th><th>Start</th><th>End</th></tr>
<?php while ($row = mysqli_fetch_assoc($shifts)): ?>
<tr><td><?php echo $row['id']; ?></td><td><?php echo $row['start_time']; ?></td><td><?php echo $row['end_time']; ?></td></tr>
<?php endwhile; ?>
</table>
<br><a href="logout.php">Logout</a>
