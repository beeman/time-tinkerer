<?php

$days = 14;

$now = time();
$today = date('Y-m-d', time());
$next = strtotime($today . " - $days days");
$last = strtotime($today . " + $days days");

function nice_date($timestamp) {
    return date('D Y-m-d H:i:s', $timestamp);

}

function set_system_time($timestamp) {
    $command = 'sudo date -s "' . $timestamp . '"';
    exec($command);
}

if (isset($_GET['settime'])) {
    $time = $_GET['settime'];
    $time = strtotime(nice_date($time) . " + 10 hours");
    $timestamp = nice_date($time);
    set_system_time($timestamp);
    header('Location: ./');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Time Tinkerer</title>
    <style>
        body {
            background: #000;
            color: #eee;
            padding: 0px 5px;
        }

        a {
            color: green;
        }

        a.active {
            color: red;
        }
    </style>
</head>
<body>
<pre><h1>Time Tinkerer</h1><?php echo "<h2><a href='./'>Server time: " . nice_date($now) . "</a></h2>"; ?>
<ul><?php for ($i = 1; $next <= $last; $i++) :
            $next = strtotime(nice_date($next) . " + 1 day");
            $currentday = date('Y-m-d', $next);
            $class = ($currentday === $today) ? 'active' : '';
            echo "<li><a href='?settime=$next' class='$class'>" . date('D Y-m-d', $next) . "</a></li>";
        endfor; ?>
    </ul>
</pre>
</body>
</html>
