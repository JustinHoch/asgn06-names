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

// Specially Unique
/* Finds specially unique names by taking in fullname, lastname, and firstname arrays and the number of unique names you want to find. Creates test arrays to test against. loops through array using for statement and tests each last name and first name to see if it has been seen before via the test arrays. If it has not, the full name from the fullname array is added to the special array and returned. Each name looked at is added to the corresponding test array.*/
function specialUniqueNames($fullNameArray, $lastNameArray, $firstNameArray, $number) {
  $testlastName = array();
  $testfirstName = array();
  $special = array();
  for($i=0; count($special)<$number; $i++) {
    if(!in_array($lastNameArray[$i], $testlastName) && !in_array($firstNameArray[$i], $testfirstName)) {
      $special[] = $fullNameArray[$i];
    }
    $testlastName[] = $lastNameArray[$i];
    $testfirstName[] = $firstNameArray[$i];
  }
  return $special;
}

// Modified Names
function theNameMangler($specialNames) {
  foreach($specialNames as $name) {
    list($lastName, $firstName)=explode(', ', $name);
  }
  $firstName[]=array_shift($firstName);
  return array_combine($lastName, $firstName);
}
