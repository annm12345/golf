<?php
    require('connection.php');

    if(isset($_GET['id'])){
        $event_id=$_GET['id'];
        $event_res=mysqli_query($con,"SELECT * FROM `event` where `id`='$event_id'");
        $event_row=mysqli_fetch_assoc($event_res);
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
        margin: auto;
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

    td.selected {
        background-color: #e74c3c;
        color: white;
    }

    

    @media (max-width: 768px) {
        .table-container {
            margin:auto;
            max-width: 750px; /* Adjust this height according to your needs */
            overflow-y: auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
            font-size: 11px;
            min-width: 15px;
        }
    }
</style>

<main>
        <div>
            <a href="index.php">Back</a>
        </div>
        <div class="table-container">

        
                    <div class="section-title-wrapper" >
                        <h2 class="section-title" style="margin:auto" >Livescore for <?php echo $event_row['name'] ?> </h2>

                        <div id="datetime" class="section-title" style="margin:auto"></div>

                        <script>
                            function updateDateTime() {
                                const datetimeElement = document.getElementById('datetime');
                                const now = new Date();
                                const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
                                const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
                                const dateString = now.toLocaleDateString(undefined, dateOptions);
                                const timeString = now.toLocaleTimeString(undefined, timeOptions);
                                datetimeElement.textContent = dateString + ' ' + timeString;
                            }

                            // Update the date and time every second (1000 milliseconds)
                            setInterval(updateDateTime, 1000);

                            // Initial update
                            updateDateTime();
                        </script>
                    </div>

                    <form  method="post">
        
                        <table id="myTable">
                        
                            <thead>
                                
                                <tr style="background:lightblue">
                                    <td></td>
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
                                    <td>First</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>Second</td>
                                    <td>Total</td>
                                    <td>Mark</td>
                                    <td>HC</td>
                                    <td>Birdie</td>
                                    <td>Par</td>
                                    <td>Net</td>
                                    
                                    
                                </tr>
                                <tr >
                                    <?php 
                                    $par_res=mysqli_query($con,"SELECT * FROM `hole` where id='1'");
                                    $par_row=mysqli_fetch_assoc($par_res);
                                    $fst_total=$par_row['1']+$par_row['2']+$par_row['3']+$par_row['4']+$par_row['5']+$par_row['6']+$par_row['7']+$par_row['8']+$par_row['9'];
                                    $sec_total=$par_row['10']+$par_row['11']+$par_row['12']+$par_row['13']+$par_row['14']+$par_row['15']+$par_row['16']+$par_row['17']+$par_row['18'];
                                    $all_total=$fst_total+$sec_total;
                                    ?>
                                    <td></td>
                                    <td>Par</td>
                                    <td><?php echo $par_row['1'] ?></td>
                                    <td><?php echo $par_row['2'] ?></td>
                                    <td><?php echo $par_row['3'] ?></td>
                                    <td><?php echo $par_row['4'] ?></td>
                                    <td><?php echo $par_row['5'] ?></td>
                                    <td><?php echo $par_row['6'] ?></td>
                                    <td><?php echo $par_row['7'] ?></td>
                                    <td><?php echo $par_row['8'] ?></td>
                                    <td><?php echo $par_row['9'] ?></td>
                                    <td><?php echo $fst_total?></td>
                                    <td><?php echo $par_row['10'] ?></td>
                                    <td><?php echo $par_row['11'] ?></td>
                                    <td><?php echo $par_row['12'] ?></td>
                                    <td><?php echo $par_row['13'] ?></td>
                                    <td><?php echo $par_row['14'] ?></td>
                                    <td><?php echo $par_row['15'] ?></td>
                                    <td><?php echo $par_row['16'] ?></td>
                                    <td><?php echo $par_row['17'] ?></td>
                                    <td><?php echo $par_row['18'] ?></td>
                                    <td><?php echo $sec_total?></td>
                                    <td><?php echo $all_total?></td>
                                    <td><?php echo 0 ?></td>
                                    <td><?php echo 0 ?></td>
                                    <td><?php echo 0 ?></td>
                                    <td><?php echo 0 ?></td>
                                    <td><?php echo 0 ?></td>
                                    
                                </tr>
                            </thead>
                            <tbody id="score_list">
                                
                                
                                

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                
                                
                            </tbody>
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                            <script>
                                function fetchAllScoreData(eventId) {
                                    $.ajax({
                                        type: "GET",
                                        url: "get_scores.php?id="+eventId,
                                        dataType: 'json',
                                        success: function (response) {
                                            // Update your UI with the fetched data
                                            displayScoreData(response);
                                        },
                                        error: function (error) {
                                            console.error('Error fetching score data:', error);
                                        }
                                    });
                                }
                                

                                function displayScoreData(data) {
                                    // Clear existing rows in the score_list tbody
                                    $('#score_list').empty();
                                    data.sort(function(a, b) {
                                        return a.marks - b.marks; // Sorting by marks in ascending order
                                    });

                                    // Iterate through the fetched data and append rows to the score_list
                                    $.each(data, function(index, score) {
                                        var fstsum = 0;
                                        var secsum = 0;
                                        var allsum = 0;
                                        var marks = 0;

                                        for (var i = 1; i <= 9; i++) {
                                            fstsum += parseInt(score[i]) || 0;
                                        }
                                        for (var i = 10; i <= 18; i++) {
                                            secsum += parseInt(score[i]) || 0;
                                        }
                                        for (var i = 1; i <= 18; i++) {
                                            allsum += parseInt(score[i]) || 0;
                                        }
                                        for (var i = 1; i <= 18; i++) {
                                            marks += parseInt(score.marks[i]) || 0;
                                        }
                                        var HC = 36 - marks;
                                        var NET = allsum - (HC + 72);

                                        var row = '<tr>';
                                        row += '<td> <img src="media/image/' + score.image + '" style="width:50px;height:50px;border-radius:50%"></td>';
                                        row += '<td>' + score.name + '</td>'; // Replace with actual column names
                                        row += '<td>' + score['1'] + '</td>';
                                        row += '<td>' + score['2'] + '</td>';
                                        row += '<td>' + score['3'] + '</td>';
                                        row += '<td>' + score['4'] + '</td>';
                                        row += '<td>' + score['5'] + '</td>';
                                        row += '<td>' + score['6'] + '</td>';
                                        row += '<td>' + score['7'] + '</td>';
                                        row += '<td>' + score['8'] + '</td>';
                                        row += '<td>' + score['9'] + '</td>';
                                        row += '<td style="background:#E062F9">' + fstsum + '</td>';
                                        row += '<td>' + score['10'] + '</td>';
                                        row += '<td>' + score['11'] + '</td>';
                                        row += '<td>' + score['12'] + '</td>';
                                        row += '<td>' + score['13'] + '</td>';
                                        row += '<td>' + score['14'] + '</td>';
                                        row += '<td>' + score['15'] + '</td>';
                                        row += '<td>' + score['16'] + '</td>';
                                        row += '<td>' + score['17'] + '</td>';
                                        row += '<td>' + score['18'] + '</td>';
                                        row += '<td style="background:#E062F9">' + secsum + '</td>';
                                        row += '<td style="background:#F652BA">' + allsum + '</td>';
                                        row += '<td style="background:#1BFA9F">' + marks + '</td>';
                                        row += '<td style="background:#11F668">' + HC + '</td>';
                                        row += '<td style="background:#89F727">' + score.birdieCount + '</td>';
                                        row += '<td style="background:#0BA2EE">' + score.parCount + '</td>';
                                        row += '<td style="background:##D3F333">' + NET + '</td>';
                                        // Add more columns as needed
                                        row += '</tr>';

                                        $('#score_list').append(row);
                                    });

                                }


                                // Example: Call the fetchAllScoreData function on page load or as needed
                                $(document).ready(function () {
                                    // Provide the actual event_id value
                                    fetchAllScoreData(<?php echo $event_id ?>); 
                                    setInterval(function () {
                                        fetchAllScoreData(<?php echo $event_id ?>);
                                    }, 1000); // 1000 milliseconds = 1 second// Replace with actual value
                                });
                            </script>
                        </table>
                        <!-- <input type="submit" value="SET" class="submit-btn" name="set"> -->
                    </form>
        </div>
</main>                  
