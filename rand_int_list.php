<?php

// DICTEES DE CHIFFRES
// Learning numbers in french is tough from an english-native point of view
// I wrote this to assist my daughter and generate randoim list of numbers for her to train
// picks 10 4-digits random numbers
// i would like the two last digits of those numbers to be above 59 and below 99
// it can have any 1-9 for the first digit (hundreds)
// the list should then be saved for correction at a later stage

// How many numbers in this list?
$quantity = 50;

for($ii=0; $ii<$quantity; $ii++) {
  $random_base_d1 = rand(0,9);
  $random_base_d2 = rand(6,9);
  $random_base_d3 = rand(1,9);

  $random_number_list[$ii] = $random_base_d3 . $random_base_d2 . $random_base_d1;

  $dict_unit = [
    '0' => '',
    '1' => 'un',
    '2' => 'deux',
    '3' => 'trois',
    '4' => 'quatre',
    '5' => 'cinq',
    '6' => 'six',
    '7' => 'sept',
    '8' => 'huit',
    '9' => 'neuf'
  ];

  $dict_unit_alt = [
    '0' => 'dix',
    '1' => 'onze',
    '2' => 'douze',
    '3' => 'treize',
    '4' => 'quatorze',
    '5' => 'quinze',
    '6' => 'seize',
    '7' => 'dix-sept',
    '8' => 'dix-huit',
    '9' => 'dix-neuf'
  ];

  $dict_tenth = [
    '0' => '',
    '1' => 'dix',
    '2' => 'vingt',
    '3' => 'trente',
    '4' => 'quarante',
    '5' => 'cinquante',
    '6' => 'soixante',
    '7' => 'soixante',
    '8' => 'quatre-vingt',
    '9' => 'quatre-vingt'
  ];

  $dict_hundredth = [
    '0' => '',
    '1' => 'cent',
    '2' => $dict_unit[2] . ' cent',
    '3' => $dict_unit[3] . ' cent',
    '4' => $dict_unit[4] . ' cent',
    '5' => $dict_unit[5] . ' cent',
    '6' => $dict_unit[6] . ' cent',
    '7' => $dict_unit[7] . ' cent',
    '8' => $dict_unit[8] . ' cent',
    '9' => $dict_unit[9] . ' cent'
  ];

  if ( $random_base_d2 == 1 || $random_base_d2 == 7 || $random_base_d2 == 9 ) {
    $dict_unit_corrected = $dict_unit_alt;
  } else {
    $dict_unit_corrected = $dict_unit;
  }

  $random_number_word_list[$ii] = $dict_hundredth[$random_base_d3] .' '. $dict_tenth[$random_base_d2] .' '. $dict_unit_corrected[$random_base_d1];

}

$exercice_output = "";
$correction_output = "";
for($ii=0; $ii<$quantity; $ii++) {
  $exercice_output .= ($ii+1) .': ' . $random_number_word_list[$ii] . " → _ _ _ \n"; // '. $random_number_list[$ii] . '
  $correction_output .= ($ii+1) .': ' . $random_number_word_list[$ii] . " → ". $random_number_list[$ii] . " \n"; // '. $random_number_list[$ii] . '
}

system('clear');

echo "  \n";
echo "  Exercices \n";
echo "  \n";
echo $exercice_output;
echo "  \n";
echo "  Corrections \n";
echo "  \n";
echo $correction_output;