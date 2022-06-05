<?php include('partials/menu.php'); ?>


<h1>Stelehi ELIDEK - Posa</h1>

<?php 

    include 'constants.php';
    $conn = OpenCon();

            $query="SELECT ID_stelehouss, Onoma_stelehous, Poso_ergou, Onoma_organismou
            FROM ergo
            JOIN organismos ON ergo.ID_Organismouu = organismos.ID_Organismou
            JOIN stelehos on ergo.ID_stelehouss = stelehos.ID_stelehous   
              Where Katigories_organismou = 'Etairies_Idia_Kefalaia'
             order by Poso_ergou desc
            limit 5";

    $result = mysqli_query($conn, $query);
                            
        if(mysqli_num_rows($result) == 0){
        echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
        }

        else{

            echo '<div class="table-responsive">';
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>ID</th>';
                            echo '<th>Onoma</th>';
                            echo '<th>Poso</th>';
                            echo '<th>Onoma organismou</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = mysqli_fetch_row($result)){
                        echo '<tr>';
                            echo '<td>' . $row[0] . '</td>';
                            echo '<td>' . $row[1] . '</td>';
                            echo '<td>' . $row[2] . '</td>';
                            echo '<td>' . $row[3] . '</td>';
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