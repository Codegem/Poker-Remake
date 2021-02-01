<?php

if(isset($_POST['query'])){
    $result = '';
    $search = trim($_POST['query']);
    $arr = '';
    $con = dbconnect();
            $query = ("SELECT * FROM users WHERE 
            vardas or pavarde or email LIKE '%$search%' ");
            $searchas = $con->prepare($query);
            $searchas->bindParam("sss", $search, PDO::PARAM_INT);
            $searchas ->execute();
            echo $result = '<table id="user-table">';
            if($searchas->rowCount() > 0){
                echo $result = ("
                <tr>
                    <th>vardas</th>
                    <th>pavarde</th>
                    <th>email</th>
                </tr>");        
                while($arr = $searchas->fetch()){
                    echo $result = ("
                              <tr>
                                <td>".$arr['vardas']."</td>
                                <td>".$arr['pavarde']."</td>
                                <td>".$arr['email']."</td>
                              </tr>
                          ");
                }
                echo $result = '</table>';
            }else if($searchas->rowCount() == 0){
                echo $result = "
                <tr>
                <td>No Results</td>
                </tr>";
       }
}