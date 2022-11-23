
<?php

$number = $_POST['number'];
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();

$headers = array("id", "Name", "Surname", "Intials", "Age", "DateOfBirth");
$number = $_POST['number'];
$name = array(
  'Peter',
  'Glenn',
  'Kerri',
  'Shannon',
  'Wilfredo',
  'Marcella',
  'Edgar',
  'Milford',
  'Nanette',
  'Barney',
  'Herschel',
  'Kim Young',
  'Mitchel',
  'Cleo',
  'Katherine',
  'Lawanda',
  'Bernadine',
  'Jill',
  'Jeannie',
  'Teddy'
);


$surname = array(
  'Griffin',
  'Quagmire',
  'Cameron',
  'Thompson',
  'Leblanc',
  'Kennedy',
  'Burnett',
  'Small',
  'Bauer',
  'Owen',
  'Webb',
  'Knox',
  'Flynn',
  'Johnson',
  'Ayala',
  'Franco',
  'Luna',
  'Buckley',
  'Peterson'
);


$file = fopen('output.csv', 'w');

fputcsv($file, $headers);
$UserData = array();


$n = 0;
while ($n < $number) {
  $n++;
  shuffle($name);

  shuffle($surname);
  ini_set('memory_limit', '-1');

  $id = $n;
  $firstname = $name[array_rand($name)];
  $firstname = $name[array_rand($name)];
  if ($firstname === $name[array_rand($name)] or $firstname === null) {
    $firstname = $name[array_rand($name)];
  };
  $surname1 = $surname[array_rand($surname)];
  $surname1 = $surname[array_rand($surname)];
  if ($surname1 === $surname[array_rand($surname)] or $surname1 === null) {
    $firstname = $surname[array_rand($surname)];
  };

  $birthDay = $faker->dateTimeBetween('1975-01-01', '2004-12-31');
  $birthDayF = $birthDay->format('d/m/Y');
  $birthDayY = $birthDay->format("Y");
  $currentY = date('Y');
  $age = $currentY - $birthDayY;




  $words = explode(" ", $firstname);
  $initials = null;
  foreach ($words as $word) {
    $initials .= $word[0];
  }

  array_push($UserData, array("id" => $id, "name" => $firstname, "surname" => $surname1, "initials" => $initials, "age" => $age, "DateOfBirth" => $birthDayF));
}

foreach ($UserData as $fields) {
  fputcsv($file, $fields, ",");
}
fclose($file);

?>