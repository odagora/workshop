<?php

/**
 * Heroku and localhost environment variable
 */

$wkhtmltopdf = getenv("WKHTMLTOPDF_BIN");

(!empty($wkhtmltopdf)) ? $pdfBinPath = $wkhtmltopdf : $pdfBinPath = env('WKHTMLTOPDF_BIN_PATH');

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => $pdfBinPath,
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => 'wkhtmltoimage-amd64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
