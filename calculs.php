<?php


// Operations Arithmétiques
// un programme pour creer des exercices de tables d'operations arithmétique aléatoires

// Regles du jeux
//
// à chaque colonne correspond 
//  - à une operation arithmétique 
//      + - / *
//  - et à une valeur
//      [0-9].*
// chaque rangée possède au minimum une valeur affichée

// how many columns → loop
// foreach columns
// 1. pick a random operator
// 2. pick a value
// how many rows
// for each rows
// 1. pick a starting value
// 2. make the calculation
// generate the exercice table
// output only one value visible per row (random column index)
// generate the auto-correction table
// output everything

$operators = ['-', '+', '*']; // '/', 

$howmany_cols = 5;
$howmany_rows = 20;
$min_value = 1;
$max_value = 20;

$max_operator_index= count($operators)-1;

// init
$calculus = array();
$results = array();
for($row_i=1; $row_i<$howmany_rows+1; $row_i++) {
  $calculus[0][$row_i] = rand($min_value, $max_value);
}

for ($col_i=1; $col_i<$howmany_cols+1; $col_i++ ){
  $random_operator = rand(0,$max_operator_index);
  $random_value = rand($min_value,$max_value);

  $calculus_header[$col_i] = $operators[ $random_operator ] . " " . $random_value;

  for($row_i=1; $row_i<$howmany_rows+1; $row_i++) {


    // should refer to previous column, what for the first calculus? what for the remaining?
    // we should have a first loop to define the start val outside of the calculation: stored in $calculus[0]
    $calculus[$col_i][$row_i] = "(".$calculus[$col_i-1][$row_i] . " " . $operators[ $random_operator ] . " " . $random_value.")";
    $results[$col_i][$row_i] = eval("return ".$calculus[$col_i][$row_i].";");
  }
}

system('clear');

echo "Exercices\n";
echo "\n";
echo "\t";
for ($col_i=1; $col_i<$howmany_cols+1; $col_i++ ){
  echo $calculus_header[$col_i] . "\t";
}
echo "\n";
echo "\t";
for ($col_i=1; $col_i<$howmany_cols+1; $col_i++ ){
  echo "------\t";
}
echo "\n";


for($row_i=1; $row_i<$howmany_rows+1; $row_i++) {
  $visible_col = rand(0, $howmany_cols);

  for ($col_i=0; $col_i<$howmany_cols+1; $col_i++ ){
    if ($col_i == $visible_col) {
      echo eval('return (string) '.$calculus[$col_i][$row_i].';');
    }
    echo "\t";
    
  }
  echo "\n";
}

echo "\n\n";
echo "Corrections\n";
echo "\n";
echo "\t";
for ($col_i=1; $col_i<$howmany_cols+1; $col_i++ ){
  echo $calculus_header[$col_i] . "\t";
}
echo "\n";
echo "\t";
for ($col_i=1; $col_i<$howmany_cols+1; $col_i++ ){
  echo "------\t";
}
echo "\n";
for($row_i=1; $row_i<$howmany_rows+1; $row_i++) {
  for ($col_i=0; $col_i<$howmany_cols+1; $col_i++ ){
    echo eval('return '.$calculus[$col_i][$row_i].';');
    echo "\t";
  }
  echo "\n";
}