<?php if(!isset($_SESSION['username'])){
    header('location: ?p=login');
}
else ?>