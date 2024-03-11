<?php
use Illuminate\Support\Facades\DB;

    $q = $_POST['target'];
    $ans = $_POST['widget'];

    DB::table('pienteren')->insert(['container'=>$q, 'widget'=> $ans]);
    
     echo('Question has been saved');
     /* header('Location: ../instr_home.php'); */



