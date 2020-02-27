<?php

// for finding unique names
// Takes in an array and returns the number of unique values in the array
function uniqueNameCount($nameArray) {
  return count(array_unique($nameArray));
}

// For finding the 10 most common values in an array
// Takes in an array and returns an array of the 10 most common occurances as keys and the number of occurances as values
function mostCommon($nameArray) {
  $nameArray = array_count_values($nameArray);
  arsort($nameArray);
  return array_slice($nameArray, 0, 10);
}

// Modified Names
// Splits last name and first name into arrays, then shifts the beginning first name to the end of the first name array, then combines the two arrays into one to create the modified names.
function theNameMangler($specialNames) {
  foreach($specialNames as $name) {
    list($lastName[], $firstName[])=explode(', ', $name);
  }
  $firstName[]=array_shift($firstName);
  return array_combine($lastName, $firstName);
}
