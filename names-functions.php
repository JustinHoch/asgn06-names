<?php

// for finding unique names
// Takes in an array and returns the number of unique values in the array
function uniqueNameCount($nameArray) {
  return count(array_unique($nameArray));
}

// For finding the 10 most common values in an array
// Takes in an array and returns an array of the 10 most common occurances as keys and the number of occurances as values
function mostCommon($nameArray) {
  $array = array_count_values($nameArray);
  arsort($array);
  return array_slice($array, 0, 10);
}

// Modified Names
function theNameMangler($specialNames) {
  foreach($specialNames as $name) {
    list($lastName[], $firstName[])=explode(', ', $name);
  }
  $firstName[]=array_shift($firstName);
  return array_combine($lastName, $firstName);
}
