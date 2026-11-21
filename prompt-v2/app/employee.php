<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start = $_POST['start'];
    $end   = $_POST['end'];
    $uid   = $user['id'];
    $stmt = mysqli_prepare($conn, "INSERT INTO shifts (user_id, start_time, end_time) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "iss", $uid, $start, $end);
    mysqli_stmt_execute($stmt);
}
$uid = $user['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM shifts WHERE user_id=? ORDER BY id DESC");
mysqli_stmt_bind_param($stmt, "i", $uid);
mysqli_stmt_execute($stmt);
$shifts = mysqli_stmt_get_result($stmt);
?>
<h2>Welcome, <?php echo htmlspecialchars($user['username']); ?></h2>
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
<tr><td><?php echo htmlspecialchars($row['id']); ?></td><td><?php echo htmlspecialchars($row['start_time']); ?></td><td><?php echo htmlspecialchars($row['end_time']); ?></td></tr>
<?php endwhile; ?>
</table>
<br><a href="logout.php">Logout</a>
