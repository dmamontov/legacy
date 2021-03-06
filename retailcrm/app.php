<?php

if (
    function_exists('date_default_timezone_set')
    &&
    function_exists('date_default_timezone_get')
) {
    date_default_timezone_set(@date_default_timezone_get());
}

require_once 'bootstrap.php';

$shortopts = 'dluce:m:p:r:h:';

$options = getopt($shortopts);

if (!$options || $options == -1) {
    $opt = new OptHelper($shortopts);
    $options = $opt->get();
}

if (isset($options['e'])) {
    $command = new Command($options);
    $command->run();
} elseif (!$options) {
    CommandHelper::notWorkGetOptNotice();
} else {
    CommandHelper::runHelp();
}
