<?php
require('../connection.php');

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $res = mysqli_query($con, "SELECT `score`.*, `member`.`name`, `member`.`image` FROM `score` JOIN `member` ON `score`.`m_id` = `member`.`id` WHERE `event_id`='$event_id'");
    $scoreData = array();

    $par_res = mysqli_query($con, "SELECT * FROM `hole`");
    $par = mysqli_fetch_assoc($par_res);

    while ($row = mysqli_fetch_assoc($res)) {
        $marks = array();
        $sam = array();
        $class=array();

        // Calculate marks for each hole
        for ($i = 1; $i <= 18; $i++) {
            $score = $row[$i];
            $par_value = $par[$i];

            if ($score == '0') {
                $marks[$i] = 0;
            } elseif ($score <= $par_value) {
                $marks[$i] = 2;
            } elseif ($score == $par_value + 1) {
                $marks[$i] = 1;
            } elseif ($score > $par_value + 1) {
                $marks[$i] = 0;
            } else {
                $marks[$i] = 0;
            }
        }

        $parCount = 0;
        $birdieCount = 0;
        $parCount = 0;
        $bogeyCount = 0;
        $doubleBogeyCount = 0;

        for ($i = 1; $i <= 18; $i++) {
            $score = $row[$i];
            $par_value = $par[$i];

            if ($score == '0') {
                $sam[$i] = 0;
                $class[$i]='';
            } elseif ($score < $par_value) {
                $sam[$i] = 'birdie';
                $class[$i]='triangle';
                $birdieCount++;
            } elseif ($score == $par_value) {
                $sam[$i] = 'par';
                $class[$i]='circle';
                $parCount++;
            } elseif ($score == $par_value + 1) {
                $sam[$i] = 'bogey';
                $class[$i]='square';
                $bogeyCount++;
            } elseif ($score > $par_value + 1) {
                $sam[$i] ='double_bogey';
                $class[$i]='double_square';
                $doubleBogeyCount++;
            } else {
                $sam[$i] = 0;
            }
        }
        $sumOfPar = 0;
        for ($i = 1; $i <= 18; $i++) {
            $score = $row[$i];
            if (!is_null($score) && $score !== '0') {
                $sumOfPar += $par[$i];
            }
        }
        $row['class']=$class;
        $row['sam'] = $sam;
        $row['birdieCount'] = $birdieCount;
        $row['parCount'] = $parCount;
        $row['bogeyCount'] = $bogeyCount;
        $row['doubleBogeyCount'] = $doubleBogeyCount;
       

        // Calculate the sum of marks from 1 to 18
        $sumOfMarks = $marks['1']+$marks['2']+$marks['3']+$marks['4']+$marks['5']+$marks['6']+$marks['7']+$marks['8']+$marks['9']+$marks['10']+$marks['11']+$marks['12']+$marks['13']+$marks['14']+$marks['15']+$marks['16']+$marks['17']+$marks['18'];
        // $sumOfPar = $par['1']+$par['2']+$par['3']+$par['4']+$par['5']+$par['6']+$par['7']+$par['8']+$par['9']+$par['10']+$par['11']+$par['12']+$par['13']+$par['14']+$par['15']+$par['16']+$par['17']+$par['18'];
        $sumOfscore = $row['1']+$row['2']+$row['3']+$row['4']+$row['5']+$row['6']+$row['7']+$row['8']+$row['9']+$row['10']+$row['11']+$row['12']+$row['13']+$row['14']+$row['15']+$row['16']+$row['17']+$row['18'];
        // Add marks and sumOfMarks to the row data
        $row['marks'] = $marks;
        $row['sumOfMarks'] = $sumOfMarks;
        $HC = 36 - $sumOfMarks; // Assuming $marks is the sum of marks
        $NET = $sumOfscore - ($HC + $sumOfPar);

        // Add the row data to the result array
        $row['NET'] = $NET; // Adding NET value to the row
        $scoreData[] = $row;
    }

    // Order the result array by NET in descending order
    usort($scoreData, function ($a, $b) {
        return $a['NET'] - $b['NET'];
    });
}

// You can use $scoreData array as needed
echo json_encode($scoreData);
?>
