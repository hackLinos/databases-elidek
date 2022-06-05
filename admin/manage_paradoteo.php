<?php include('partials/menu.php');  ?>

          <!-- Main-content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Paradotea</h1> 
                <!--Me to br kanei to keno anamesa sto h1 kai to add souvl -->
                

                
                <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        $query = "SELECT * FROM paradoteo";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) == 0){
                            echo '<h1 style="margin-top: 5rem;">No page found!</h1>';
                        }
                        else{

                            echo '<div class="table-responsive">';
                                echo '<table class="table">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>ID</th>';
                                            echo '<th>Titlos</th>';
                                            echo '<th>ID Ergou</th>';
                                            echo '<th>Perilipsi</th>';
                                            echo '<th>Hmerominia Paradosis</th>';
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