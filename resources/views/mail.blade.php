<?php

echo "Hi " . Auth::user()->name . ", ";
echo "<br><br>";
echo "You have availed our " . $membership . " Membership for " . $duration . " months.";
echo "<br>";
echo "Your due payment is a total of " . $payment . ".";

?>