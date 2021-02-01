<?php


function pagination (){
    
    $conn = dbconnect();


    $record_per_page = 10;

    $page = '';

    $output = '';

    if(isset($_POST["page"]))
    {
      $page = $_POST["page"];
    }
    else
    {
      $page = 1;
    }

    $start_from = ($page - 1) * $record_per_page;

      if(isset($_POST['query']) AND (!empty($_POST['query']))){
        
        $search = trim($_POST['query']);
    
        $query = ("SELECT * FROM users WHERE 
        vardas LIKE '%$search%' ORDER BY id ASC");
       
      }else
      {
    
        $query = ("SELECT * FROM users ORDER BY id ASC");
        
      }

      $result =  $conn->prepare($query . " LIMIT $start_from, $record_per_page");
      $result->execute();

      $output .="
      <table id='user-table'>
        <tr>
          <th>Vardas</th>
          <th>Pavarde</th>
          <th>Veiksmas</th>
        </tr>
        ";

      if($result->rowCount() == 0){
        $output .= '
        <tr>
          <td colspan="4" >No Results Found.</td>
        </tr>
      ';
      }

      while($row = $result->fetch())
      {
        $output .= '
          <tr>
            <td>'.$row["vardas"].'</td>
            <td>'.$row["pavarde"].'</td>
            <td><button type="button" class="btn-blue poke" id="'.$row['id'].'">Poke</button></td>
          </tr>
        ';
      }
        $output .= '</table><br/>';
      
      $page_query = $query;

      $page_result = $conn->query($page_query);

      $total_records = $page_result->rowCount();

      $total_pages = ceil($total_records / $record_per_page);

      $pages_limit = 7;

      $pages_start = ( ($page - $pages_limit) > 0 ) ? $page - $pages_limit : 1;

      $pages_end = ( ($page - $pages_limit) < $total_pages ) ? $page + $pages_limit : $total_pages;

      for($i = 1; $i<= $total_pages; $i++)
      {
          $output .= "<span class='pages-link' style='cursor:pointer; padding:6px; border:1px solid black;' id='".$i."'>".$i."</span>";
      }

      echo $output;
      $conn=null;

}

  pagination();
?>