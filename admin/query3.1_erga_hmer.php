<?php include('partials/menu.php'); ?>


<h1>Erga/hmerominia enarksis</h1>

<?php 

    include 'constants.php';
    $conn = OpenCon();

            $query="SELECT *
            FROM ergo
            order by Hmerominia_enarksis_ergou desc";
             $result = mysqli_query($conn, $query);
                            
             if(mysqli_num_rows($result) == 0){
             echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
             }
         
             else{
         
                 echo '<div class="table-responsive">';
                     echo '<table class="table">';
                         echo '<thead>';
                             echo '<tr>';
                             echo '<th>ID_ergou</th>';
                             echo '<th>Titlos_ergou</th>';
                             echo '<th>hmerominia_enarksis_ergou</th>';
                             echo '<th></th>';
                             echo '</tr>';
                         echo '</thead>';
                         echo '<tbody>';
                         while($row = mysqli_fetch_row($result)){
                             echo '<tr>';
                                 echo '<td>' . $row[0] . '</td>';
                                 echo '<td>' . $row[1] . '</td>';
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