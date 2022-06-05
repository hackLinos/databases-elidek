<?php include('partials/menu.php');  ?>

          <!-- Main-content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Ereunites</h1> 
                <!--Me to br kanei to keno anamesa sto h1 kai to add souvl -->
                

                
                <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        $query = "SELECT * FROM ereunitis";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) == 0){
                            echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
                        }
                        else{

                            echo '<div class="table-responsive">';
                                echo '<table class="table">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>ID </th>';
                                            echo '<th>Onoma </th>';
                                            echo '<th>Epitheto </th>';
                                            echo '<th>Fyllo </th>';
                                            echo '<th>Hmerominia gennnisis</th>';
                                            echo '<th>Hlikia</th>';
                                            echo '<th>Hmerominia ypallilikhs sxeshs</th>';
                                            echo '<th>ID Organismou</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row = mysqli_fetch_row($result)){
                                        echo '<tr>';
                                            echo '<td>' . $row[0] . '</td>';
                                            echo '<td>' . $row[1] . '</td>';
                                            echo '<td>' . $row[2] . '</td>';
                                            echo '<td>' . $row[3] . '</td>';
                                            echo '<td>' . $row[4] . '</td>';
                                            echo '<td>' . $row[5] . '</td>';
                                            echo '<td>' . $row[6] . '</td>';
                                            echo '<td>' . $row[7] . '</td>';
                                            echo '<td>';

                                    
                                                echo '<a type="button" href="./update_student.php?id=' . $row[0]. '">';
                                                    echo '<i class="fa fa-edit"></i>';
                                                echo '</a>';
                                            echo '</td>';
                                            echo '<td>';
                                                echo '<a type="button" href="./delete_student.php?id=' . $row[0]. '">';
                                                    echo '<i class = "fa fa-trash"></i>';
                                                echo '</a>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                            echo '</div>';
                        }
                        ?>

                </table>

    </div>
</div>

                    

        <?php include('partials/footer.php'); ?>