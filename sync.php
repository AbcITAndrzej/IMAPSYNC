<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $logFile = "logs/" . date("Ymd_His") . ".log";
    $cmd = "/usr/bin/imapsync ";
    $cmd .= "--host1 " . escapeshellarg($_POST["host1"]);
    $cmd .= " --user1 " . escapeshellarg($_POST["user1"]);
    $cmd .= " --password1 " . escapeshellarg($_POST["password1"]);
    $cmd .= " --host2 " . escapeshellarg($_POST["host2"]);
    $cmd .= " --user2 " . escapeshellarg($_POST["user2"]);
    $cmd .= " --password2 " . escapeshellarg($_POST["password2"]);
    if (isset($_POST["justlogin"])) $cmd .= " --justlogin";
    if (isset($_POST["justfoldersizes"])) $cmd .= " --justfoldersizes";
    if (isset($_POST["justfolders"])) $cmd .= " --justfolders";
    if (isset($_POST["dry"])) $cmd .= " --dry";
    $cmd .= " --ssl1 --ssl2 --syncinternaldates";

    $output = shell_exec($cmd . " 2>&1 | tee $logFile");
    echo "<pre>" . htmlspecialchars($output) . "</pre>";
}
?>
