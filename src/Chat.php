<?php

namespace YapsterAi;

class Chat {

    private NLPProcessor $nlpProcessor;
    private ResponseGenerator $responseGenerator;

    public function __construct($processor, $response){
        $this->nlpProcessor         = $processor;
        $this->responseGenerator    = $response;
    }

    public function handleQuery($query) : ? string {

        $action = $this->nlpProcessor->processQuery($query);

        $response = $this->responseGenerator->generateResponse($action);
        if($response !== null){
            return $response;
        }else{
            return $action;
        }
    }

}