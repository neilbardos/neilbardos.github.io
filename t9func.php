<?php 
$t9 = array(
  0 => array('a', 'b', 'c'),
  1 => array('c', 'd', 'e'),
  2 => array('e', 'f', 'g'),
  3 => array('g', 'h', 'i'),
  4 => array('i', 'j', 'k'),
  5 => array('k', 'l', 'm'),
  6 => array('n', 'o', 'p'),
  7 => array('p', 'q', 'r', 's'),
  8 => array('t', 'u', 'v'),
  9 => array('w', 'x', 'y', 'z')
  );

function getPossibleWords($input)
{
  global $t9;
  if (! is_numeric($input))
    return false;
  $userInput = str_split($input);
  $total = 1;
  for($a = count($userInput) - 1; $a >= 0; $a--)
  {
    $total *= count($t9[$userInput[$a]]);
    $t[$a] = $total;
  }
  sort($t);
  for ($b = 0; $b < count($userInput); $b++)
  {
    $k = $l = 0;
    $j = count($userInput) - ($b + 2);
    for ($c = 0; $c < $total; $c++)
    {
      $possibleWords[$c] .= $t9[$userInput[$b]][$l];
      if ($j >= 0 && $c == ($t[$j] * ($k+1)) - 1 || $j < 0)
      {
        $k++;
        if ($l < count($t9[$userInput[$b]]) - 1)
          $l++;
        else
          $l = 0;
      }
    }
  }
  // return json_encode($possibleWords);
  $script = implode(',', $possibleWords);
  echo $script;
}
if(isset($_POST['input'])){
  $input = $_POST['input'];
  return getPossibleWords($input);
}
?>