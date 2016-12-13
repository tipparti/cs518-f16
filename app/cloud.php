<?php
class WordCloud {

public function wordcount($str) {
    return array_count_values(str_word_count(strtolower($str), 1));
}

public function array_merge_recursive_numeric() {

    // Gather all arrays
    $arrays = func_get_args();

    // If there's only one array, it's already merged
    if (count($arrays)==1) {
        return $arrays[0];
    }

    // Remove any items in $arrays that are NOT arrays
    foreach($arrays as $key => $array) {
        if (!is_array($array)) {
            unset($arrays[$key]);
        }
    }

    // We start by setting the first array as our final array.
    // We will merge all other arrays with this one.
    $final = array_shift($arrays);

    foreach($arrays as $b) {

        foreach($final as $key => $value) {

            // If $key does not exist in $b, then it is unique and can be safely merged
            if (!isset($b[$key])) {

                $final[$key] = $value;

            } else {

                // If $key is present in $b, then we need to merge and sum numeric values in both
                if ( is_numeric($value) && is_numeric($b[$key]) ) {
                    // If both values for these keys are numeric, we sum them
                    $final[$key] = $value + $b[$key];
                } else if (is_array($value) && is_array($b[$key])) {
                    // If both values are arrays, we recursively call ourself
                    $final[$key] = array_merge_recursive_numeric($value, $b[$key]);
                } else {
                    // If both keys exist but differ in type, then we cannot merge them.
                    // In this scenario, we will $b's value for $key is used
                    $final[$key] = $b[$key];
                }

            }

        }

        // Finally, we need to merge any keys that exist only in $b
        foreach($b as $key => $value) {
            if (!isset($final[$key])) {
                $final[$key] = $value;
            }
        }

    }

    return $final;

}

public function cleanup_wordcounts($counts) {
    $stopwords = array_map(function($w) { return trim($w); }, file($_SERVER['DOCUMENT_ROOT']."/data/.txt"));

    $cleaned = [];
    foreach ($counts as $w => $c) {
        if (!in_array($w, $stopwords)) {
            $cleaned[$w] = $c;
        }
    }

    return $cleaned;
}
}
?>
