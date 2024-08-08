<?php
    require('top.php');
    if(isset($_POST['set'])){
        $fst=$_POST['1'];
        $sec=$_POST['2'];
        $thd=$_POST['3'];
        $fot=$_POST['4'];
        $five=$_POST['5'];
        $six=$_POST['6'];
        $sev=$_POST['7'];
        $eig=$_POST['8'];
        $nin=$_POST['9'];
        $ten=$_POST['10'];
        $ele=$_POST['11'];
        $twe=$_POST['12'];
        $thr=$_POST['13'];
        $for=$_POST['14'];
        $fir=$_POST['15'];
        $sir=$_POST['16'];
        $ser=$_POST['17'];
        $eir=$_POST['18'];

        mysqli_query($con,"UPDATE `hole` SET `1`='$fst',`2`='$sec',`3`='$thd',`4`='$fot',`5`='$five',`6`='$six',`7`='$sev',`8`='$eig',`9`='$nin',`10`='$ten',`11`='$ele',`12`='$twe',`13`='$thr',`14`='$for',`15`='$fir',`16`='$sir',`17`='$ser',`18`='$eir' WHERE id='1'");
    }
?>
    <style>
        .submit-btn {
                    padding: 10px;
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
        
                table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            min-width: 50px;
        }

        th {
            background-color: #3498db;
            color: white;
            position: sticky;
            top: 0;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td input[type="number"] {
            width: 40px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
            text-align: center;
            font-size: 12px;
            outline: none;
            transition: 0.3s;
        }

        td input[type="number"]:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
        }

        td.selected {
            background-color: #e74c3c;
            color: white;
        }

        @media (max-width: 768px) {
            th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
            font-size: 11px;
            min-width: 15px;
        }
        td input[type="number"] {
            width: 10px;
            padding: 1px;
            border: 1px solid #ddd;
            border-radius: 3px;
            text-align: center;
            font-size: 11px;
            outline: none;
            transition: 0.3s;
        }
            
        }
    </style>
    <main>
    <article class="container article">
        <section class="projects">
                    <div class="section-title-wrapper">
                        <h2 class="section-title">Set the 'Par' on each 'Hole'</h2>

                   
                    </div>

                    <form  method="post">
        
                        <table id="myTable">
                        
                            <thead>
                                
                                <tr style="background:lightblue">
                                    <td>Hole</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    
                                    
                                </tr>

                            </thead>
                            <tbody>
                                
                                <tr >
                                    <?php 
                                    $par_res=mysqli_query($con,"SELECT * FROM `hole` where id='1'");
                                    $par_row=mysqli_fetch_assoc($par_res);
                                    $fst_total=$par_row['1']+$par_row['2']+$par_row['3']+$par_row['4']+$par_row['5']+$par_row['6']+$par_row['7']+$par_row['8']+$par_row['9'];
                                    $sec_total=$par_row['10']+$par_row['11']+$par_row['12']+$par_row['13']+$par_row['14']+$par_row['15']+$par_row['16']+$par_row['17']+$par_row['18'];
                                    $all_total=$fst_total+$sec_total;
                                    ?>
                                    <td>Par</td>
                                    <td><input type="number" name="1" id="" required value="<?php echo $par_row['1'] ?>"></td>
                                    <td><input type="number" name="2" id="" required value="<?php echo $par_row['2'] ?>"></td>
                                    <td><input type="number" name="3" id="" required value="<?php echo $par_row['3'] ?>"></td>
                                    <td><input type="number" name="4" id="" required value="<?php echo $par_row['4'] ?>"></td>
                                    <td><input type="number" name="5" id="" required value="<?php echo $par_row['5'] ?>"></td>
                                    <td><input type="number" name="6" id="" required value="<?php echo $par_row['6'] ?>"></td>
                                    <td><input type="number" name="7" id="" required value="<?php echo $par_row['7'] ?>"></td>
                                    <td><input type="number" name="8" id="" required value="<?php echo $par_row['8'] ?>"></td>
                                    <td><input type="number" name="9" id="" required value="<?php echo $par_row['9'] ?>"></td>
                                    
                                    <td><input type="number" name="10" id="" required value="<?php echo $par_row['10'] ?>"></td>
                                    <td><input type="number" name="11" id="" required value="<?php echo $par_row['11'] ?>"></td>
                                    <td><input type="number" name="12" id="" required value="<?php echo $par_row['12'] ?>"></td>
                                    <td><input type="number" name="13" id="" required value="<?php echo $par_row['13'] ?>"></td>
                                    <td><input type="number" name="14" id="" required value="<?php echo $par_row['14'] ?>"></td>
                                    <td><input type="number" name="15" id="" required value="<?php echo $par_row['15'] ?>"></td>
                                    <td><input type="number" name="16" id="" required value="<?php echo $par_row['16'] ?>"></td>
                                    <td><input type="number" name="17" id="" required value="<?php echo $par_row['17'] ?>"></td>
                                    <td><input type="number" name="18" id="" required value="<?php echo $par_row['18'] ?>"></td>
                                    
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        <input type="submit" value="SET" class="submit-btn" name="set">
                    </form>
        </section>
    </article>
</main>
                    
<?php
    require('foot.php');
?>