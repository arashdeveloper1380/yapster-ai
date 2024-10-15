<?php

namespace YapsterAi;

class Intent{

    private static array $intents = [];

    public static function set(string $intent, string $handle) : void{
        self::$intents[$intent] = $handle;
    }

    public static function get() : Intent | array {
        return self::$intents;
    }
}