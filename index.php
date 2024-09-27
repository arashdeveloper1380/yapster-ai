<?php

require_once 'vendor/autoload.php';

use YapsterAi\NLPProcessor;
use YapsterAi\ResponseGenerator;

$nlp        = new NLPProcessor();
$response   = new ResponseGenerator();

$result = new \YapsterAi\Chat($nlp, $response);

echo $result->handleQuery("هویت من چیه");