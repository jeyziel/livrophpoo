<?php
ob_start();
echo 'Text that won\'t get displayed.';
$content = ob_get_contents();
ob_end_clean();


echo $content;
?>