<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!is_dir('logs')) {
        mkdir('logs', 0777, true);
    }
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
    if (!empty($_POST['subfolder'])) $cmd .= " --subfolder2 " . escapeshellarg($_POST['subfolder']);
    if (isset($_POST['delete2'])) $cmd .= " --delete2";
    if (isset($_POST['move'])) $cmd .= " --move";
    $cmd .= " --ssl1 --ssl2 --syncinternaldates";


    $descriptor = [1 => ['pipe','w'], 2 => ['pipe','w']];
    $process = proc_open($cmd, $descriptor, $pipes);
    $output = stream_get_contents($pipes[1]);
    $error  = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    $status = proc_close($process);

    file_put_contents($logFile, $output . $error);
    echo "<pre>" . htmlspecialchars($output . $error) . "</pre>";
    if ($status !== 0) {
        echo '<p style="color:red">Error during synchronization. See log file.</p>';
    }
}
?>
