<?php

  $conn = dbconnect();

  $query = "SELECT pokes.id, pokes.usr_from, pokes.usr_to, users.vardas, users.pavarde, pokes.status FROM users
  INNER JOIN pokes ON users.id = pokes.usr_from where pokes.usr_to = :this_user AND pokes.status = :status";

  $stmt = $conn->prepare($query);
  
  $stmt->execute(
    array(
      ':this_user' => $_SESSION['user_id'],
      ':status' => '1'
    )
  );
  
  $result = $stmt->fetchAll();

  $total_row = $stmt->rowCount();

  $output = '';

  if($total_row > 0){
    foreach($result as $row)
    {
      $output .= '<p>'.$row['vardas'].' Poked You!';
    }
  }
  else{
      $output .= '<p>No Recent Activity.</p>';
  }

  $data = array(
    'notification' => $output,
    'unseen_notification' => $total_row
  );

  echo json_encode($data);