<?php include('partials/menu.php');  ?>

          <!-- Main-content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Epistimonika Pedia</h1> 
                <!--Me to br kanei to keno anamesa sto h1 kai to add souvl -->
                

                
                <?php
                        include 'constants.php';
                        $conn = OpenCon();

                        $query = "SELECT * FROM epistimoniko_pedio";
                        $result = mysqli_query($conn, $query);
                        
                        if(mysqli_num_rows($result) == 0){
                            echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
                        }
                        else{

                            echo '<div class="table-responsive">';
                                echo '<table class="table">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>ID Epistimonikou Pediou</th>';
                                            echo '<th>Onoma ID Epistimonikou Pediou</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row = mysqli_fetch_row($result)){
                                        echo '<tr>';
                                            echo '<td>' . $row[0] . '</td>';
                                            echo '<td>' . $row[1] . '</td>';
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