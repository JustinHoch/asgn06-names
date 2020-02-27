<?php

  include_once('names-functions.php');

  // ****************** Declare variables *******************
  $totalNameCount = 0;
  $fullNames = array();
  $lastNames = array();
  $firstNames = array();
  $specialNames = array();
  $n = 25;
  /* Regex to match only names in the list that contain ONLY:
      -capital or lower case letters
      -apostrophes */
  $regex = '/^([a-zA-Z\']+),\s([a-zA-Z]+)/';

  // ******************* Getting Info From Text File *******************
  $file = fopen('names.txt', 'r');
  $nextName = fgets($file);
  while(!feof($file)) {
    if(preg_match($regex, $nextName, $matches)) {
      if(!in_array($matches[1], $lastNames) && !in_array($matches[2], $firstNames)) {
        $specialNames[] = $matches[0];
      }
      $fullNames[] = $matches[0];
      $lastNames[] = $matches[1];
      $firstNames[] = $matches[2];
      $totalNameCount++;
    }
    $nextName = fgets($file);
  }
  fclose($file);

  // ************** Operations *****************
  $uniqueFullNameCount = uniqueNameCount($fullNames);
  $uniqueLastNameCount = uniqueNameCount($lastNames);
  $uniqueFirstNameCount = uniqueNameCount($firstNames);
  $mostCommonLastNames = mostCommon($lastNames);
  $mostCommonFirstNames = mostCommon($firstNames);
  $nSpecialNames = array_slice($specialNames, 0, $n);
  $modifiedNames = theNameMangler($nSpecialNames);

  // ************** Printing *******************

  print('<h1>Names!</h1>');
  print('<p>Total number of names in the list: <strong>'. number_format($totalNameCount, 0, '.', ',') .'</strong></p>');

  print('<h2><u>Unique Name Count</u></h2>');
  print('<p>Number of unique full names: <strong>'. number_format($uniqueFullNameCount, 0, '.', ',') .'</strong></p>');
  print('<p>Number of unique last names: <strong>'. number_format($uniqueLastNameCount, 0, '.', ',') .'</strong></p>');
  print('<p>Number of unique first names: <strong>'. number_format($uniqueFirstNameCount, 0, '.', ',') .'</strong></p>');

  print('<h2><u>Most Common Names</u></h2>');
  print('<h3>The 10 most common last names and the number of times they occur.</h3>');
  print('<ol>');
  foreach($mostCommonLastNames as $key => $value) {
    print('<li>' . $key . ', ' . $value . '</li>');
  }
  print('</ol>');

  print('<h3>The 10 most common first names and the number of times they occur.</h3>');
  print('<ol>');
  foreach($mostCommonFirstNames as $key => $value) {
    print('<li>' . $key . ', ' . $value . '</li>');
  }
  print('</ol>');

  print('<h2><u>Special and Modified Names</u></h2>');
  print('<h3>The first N number of specially unique names (in this case N=25)</h3>');
  print('<ol>');
  foreach($nSpecialNames as $value) {
    print('<li>' . $value . '</li>');
  }
  print('</ol>');

  print('<h3>Modified special names</h3>');
  print('<ol>');
  foreach($modifiedNames as $key => $value) {
    print('<li>' . $key . ', ' . $value . '</li>');
  }
  print('</ol>');
