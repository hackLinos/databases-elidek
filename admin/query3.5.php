<?php include('partials/menu.php'); ?>


<h1>Zeugi me megaliteri epixorigisi</h1>


<?php 

    include 'constants.php';
    $conn = OpenCon();

        $query="SELECT   A.ID_epistimoniko_pediouu AS ID_epistimoniko_pediouu1,  B.ID_epistimoniko_pediouu AS ID_epistimoniko_pediouu2, count(*) as Fores_pou_emfanistikan_ta_top_zeugi
        FROM epistimoniko_pedio_ergou A,epistimoniko_pedio_ergou B
        WHERE A.ID_epistimoniko_pediouu <> B.ID_epistimoniko_pediouu   AND A.ID_ergouuu = B.ID_ergouuu
        Group by ID_epistimoniko_pediouu1, ID_epistimoniko_pediouu2
        limit 3";

    $result = mysqli_query($conn, $query);
                            
        if(mysqli_num_rows($result) == 0){
        echo '<h1 style="margin-top: 5rem;">No Stelehoi found!</h1>';
        }

        else{

            echo '<div class="table-responsive">';
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>ID epistimonikou pediou 1</th>';
                            echo '<th>ID epistimonikou pediou 2</th>';
                            echo '<th>Fores pou emfanistikan</th>';
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

