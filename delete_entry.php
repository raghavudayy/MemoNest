<?php

require_once "includes/auth.php";
require_once "includes/config.php";

$userId = $_SESSION["user_id"];

// Check if ID exists
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: view_entries.php");
    exit;
}

$entryId = (int) $_GET['id'];

// Delete only if entry belongs to logged-in user
$sql = "DELETE FROM diary_entries
        WHERE id = ? AND user_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ii", $entryId, $userId);

mysqli_stmt_execute($stmt);

// Redirect back
header("Location: view_entries.php");
exit;