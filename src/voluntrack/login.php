<?php
namespace voluntrack;

echo "Logged in!<br><br>";

foreach ($_POST as $key => $value) {
    echo "$key: $value<br>";
}
