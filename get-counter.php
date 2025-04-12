<?php
$counterFile = 'counter.txt';

if (file_exists($counterFile)) {
    echo (int) file_get_contents($counterFile);
} else {
    echo 0;
}
?>
