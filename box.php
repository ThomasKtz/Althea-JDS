<?php

$class = "success";
$msg = $msgSuccess;

if (!empty($msgError)) {

    $class = "danger";
    $msg = $msgError;
}

if ($msg) {
    echo "<div style='width:40%; margin:30px auto; text-align:center' class='alert alert-$class' role='alert'>
            $msg
</div>";
}
?>