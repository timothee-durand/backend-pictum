<?php
echo 'test';

$output = shell_exec('ipconfig');

echo '<pre>'.$output.'</pre>';
