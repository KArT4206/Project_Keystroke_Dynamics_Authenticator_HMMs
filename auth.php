<?php
//auth.php
header('Content-Type: text/plain');

$users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

$inputUsername = $_POST['username'] ?? '';
$inputPassword = $_POST['password'] ?? '';
$inputTimings = json_decode($_POST['timings'] ?? '{}', true);

$authSuccess = false;

foreach ($users as $line) {
    $user = json_decode($line, true);
    if (!$user) continue;

    if ($user['username'] === $inputUsername && $user['password'] === $inputPassword) {
        $storedHolds = $user['timings']['holds'] ?? [];
        $inputHolds = $inputTimings['holds'] ?? [];

        $storedDDs = $user['timings']['dds'] ?? [];
        $inputDDs = $inputTimings['dds'] ?? [];

        $storedUDs = $user['timings']['uds'] ?? [];
        $inputUDs = $inputTimings['uds'] ?? [];

        $holdDiff = calculateTimingDiff($storedHolds, $inputHolds);
        $ddDiff = calculateTimingDiff($storedDDs, $inputDDs);
        $udDiff = calculateTimingDiff($storedUDs, $inputUDs);

        $totalDiff = ($holdDiff + $ddDiff + $udDiff) / 3;

        echo "Hold Difference: $holdDiff\n";
        echo "DD Difference: $ddDiff\n";
        echo "UD Difference: $udDiff\n";
        echo "Total Difference: $totalDiff\n\n";

        $authSuccess = ($totalDiff < 50); // threshold
        break;
    }
}

echo $authSuccess ? "Authentication Successful! ✅" : "Authentication Failed ❌";

function calculateTimingDiff($stored, $input) {
    if (empty($stored) || empty($input)) return 1000;

    $minLength = min(count($stored), count($input));
    $diff = 0;

    for ($i = 0; $i < $minLength; $i++) {
        $diff += abs($stored[$i] - $input[$i]);
    }

    return $diff / $minLength;
}
?>
