<?php

namespace YapsterAi;

final class NLPProcessor {

    public readonly array $patterns;
    public readonly array $suggestions;

    public function __construct(){
        $this->patterns = require ('App/patterns.php');
        $this->suggestions = require ('App/suggestions.php');
    }

    public function processQuery(string $query) : ? string {

        foreach ($this->patterns as $action => $pattern) {

            foreach ($pattern as $item) {

                if (preg_match($item, $query)) {

                    return $action;

                }

            }

        }

        return $this->suggestSimilarQuery($query);
    }

    public function suggestSimilarQuery(string $query) : string {

        $bestMatch = null;
        $minDistance = PHP_INT_MAX;

        foreach ($this->patterns as $action => $pattern) {
            foreach ($pattern as $item) {

                $distance = levenshtein($query, $item);

                if ($distance < $minDistance && $distance <= 60) {
                    $minDistance    = $distance;
                    $bestMatch      = $action;
                }
            }
        }

        if ($bestMatch !== null) {
            return $this->suggestions[$bestMatch][array_rand($this->suggestions[$bestMatch])];
        }

        return "متوجه نشدم. لطفاً سوال خود را به گونه‌ای دیگر بپرسید.";
    }
}