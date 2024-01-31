<?php
// Read the current certificate counter value from counter.txt
$counterValue = intval(file_get_contents("counter.txt"));

// Increment the counter for display
$incrementedValue = ++$counterValue;

// Return the current incremented counter value
echo "WR{$incrementedValue}";
?>
