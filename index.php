<?php

require_once 'vendor/autoload.php';

use YapsterAi\NLPProcessor;
use YapsterAi\ResponseGenerator;
use YapsterAi\Chat;

$nlp        = new NLPProcessor();
$response   = new ResponseGenerator();
$result     = new Chat($nlp, $response);

echo $result->handleQuery("سال تولدم چه سالی بوده؟"); // چند ساله هستم؟