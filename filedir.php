<?php
echo filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
echo $rootPath = dirname(__FILE__);
echo __DIR__;
?>