<?php include('partials/menu.php');  ?>

          <!-- Main-content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Programmata</h1> 
                <!--Me to br kanei to keno anamesa sto h1 kai to add souvl -->
                <br><br></br>
                    <!-- bottom to add admnin -->
                    <a href="add-admin.php" class="btn-primary">Add Programma</a>
                </br><br></br>

                
                <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        $query = "SELECT * FROM programma";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) == 0){
                            echo '<h1 style="margin-top: 5rem;">No Organismoi found!</h1>';
                        }
                        else{

                            echo '<div class="table-responsive">';
                                echo '<table class="table">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>ID Programmatos</th>';
                                            echo '<th>Onoma Programmatos</th>';
                                            echo '<th>Dieuthinsi Programmatos</th>';
                                            echo '<th></th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row = mysqli_fetch_row($result)){
                                        echo '<tr>';
                                            echo '<td>' . $row[0] . '</td>';
                                            echo '<td>' . $row[1] . '</td>';
                                            echo '<td>' . $row[2] . '</td>';
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

                        <div class="katergou">

                            <tr>
                                
                                <td>
                                    <a href="update_programma.php" class="btn-secondary">Update Programma</a>
                                    <a href="delete_prog.php" class="btn-danger">Delete Programma     </a>
                                </td>
                            </tr>

                            

                        </div>
                   

                </table>

    </div>
</div>

                    

        <?php include('partials/footer.php'); ?>

