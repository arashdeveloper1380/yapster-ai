<?php

namespace YapsterAi;

class Chat {

    private NLPProcessor $nlpProcessor;
    private ResponseGenerator $responseGenerator;

    public function __construct($processor, $response){
        $this->nlpProcessor         = $processor;
        $this->responseGenerator    = $response;
    }

    public function handleQuery($query, $userName = null) {
        $action = $this->nlpProcessor->processQuery($query);
        switch ($action) {
            case 'birthday':
//                $result = $this->database->getBirthday($userName);
                $result = '1380/01/22';
                return $this->responseGenerator->generateResponse($action, $result);
            case 'name':
                return "نام شما: " . $userName;
            case 'age':
//                $result = $this->database->getAge($userName);
                $result = '18';
                return $this->responseGenerator->generateResponse($action, $result);
            default:
                return $this->nlpProcessor->suggestSimilarQuery($query);
        }
    }

}