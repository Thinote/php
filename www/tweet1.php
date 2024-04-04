<!DOCTYPE html>
<html>
<head>
    <title>Tweets</title>
</head>
<body>
    <h2>Tous les Tweets</h2>
    <form action="tweets.php" method="get">
        Recherche: <input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <input type="submit" value="Rechercher">
    </form>

    <?php
    include 'db_connect.php'; 
    $search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%%";
    $sql = "SELECT tweets.content, tweets.created_at, users.username FROM tweets JOIN users ON tweets.user_id = users.id WHERE tweets.content LIKE ? ORDER BY tweets.created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$search]);

    while ($row = $stmt->fetch()) {
        echo "<p><b>" . htmlspecialchars($row['username']) . ":</b> " . htmlspecialchars($row['content']) . "<br><i>" . $row['created_at'] . "</i></p>";
    }
    ?>
</body>
</html>
