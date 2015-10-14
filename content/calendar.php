<!DOCTYPE html>
<html>
<head>

<title>Power Logistics Timeoff Utility</title>

<link href="../layout/calendar.css" rel="stylesheet" type="text/css" />

</head>

<body>


<?php


//THIS PAGE IS TO HOST THE CALENDAR USED FOR TRACKING PTO, UPT, AND VACATION FOR EMPLOYEES

$date = time();

$day = date("d" , $date);
$month = date("m" , $date);
$year = date("Y" , $date);

$first_day = mktime(0,0,0,$month,1,$year);

$title = date("F" , $first_day);

$day_of_week = date("D" , $first_day);

switch($day_of_week){

    case "Sun" : $blank = 0; break;
    case "Mon" : $blank = 1; break;
    case "Tue" : $blank = 2; break;
    case "Wed" : $blank = 3; break;
    case "Thu" : $blank = 4; break;
    case "Fri" : $blank = 5; break;
    case "Sat" : $blank = 6; break;

}

$days_in_month = cal_days_in_month(0, $month, $year);

echo '<table border=6 width=750>';
echo '<tr><th colspan=60>'; 
echo $title;
echo '&nbsp';
echo $year; 
echo '</th></tr>';
echo '<tr><td class="table_cells" width=62>Sun</td>
      <td class="table_cells" width=62>Mon</td>
      <td class="table_cells" width=62>Tue</td>
      <td class="table_cells" width=62>Wed</td>
      <td class="table_cells" width=62>Thu</td>
      <td class="table_cells" width=62>Fri</td>
      <td class="table_cells" width=62>Sat</td></tr>';

$day_count = 1;

echo '<tr>';

while($blank > 0){

echo '<td class="table_cells"></td>';
$blank = $blank - 1;
$day_count++;

}

$day_num = 1;

while($day_num <= $days_in_month){

echo '<td>'; 
echo $day_num;
echo '</td>';
$day_num++;
$day_count++;

    if($day_count > 7){

        echo '</tr><tr>';
        $day_count = 1;
    }

}

while($day_count >1 && $day_count <=7){

    echo '<td> </td>';
    $day_count++;
}

echo '</tr></table>';






?>

</body>
</html>