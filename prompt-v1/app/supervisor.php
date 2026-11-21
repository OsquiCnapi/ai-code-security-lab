<?php
$search = '';
$results = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST['search_user'];
    $results = mysqli_query($conn, "SELECT u.username, s.start_time, s.end_time FROM shifts s JOIN users u ON s.user_id=u.id WHERE u.username='$search'");
}
?>
<h2>Supervisor Dashboard</h2>
<form method="POST">
    Search by username: <input type="text" name="search_user" value="<?php echo $search; ?>">
    <input type="submit" value="Search">
</form>
<?php if ($results): ?>
<table border="1">
<tr><th>Username</th><th>Start</th><th>End</th></tr>
<?php while ($row = mysqli_fetch_assoc($results)): ?>
<tr><td><?php echo $row['username']; ?></td><td><?php echo $row['start_time']; ?></td><td><?php echo $row['end_time']; ?></td></tr>
<?php endwhile; ?>
</table>
<?php endif; ?>
<br><a href="logout.php">Logout</a>
