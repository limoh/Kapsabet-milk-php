<?php



 function validate_farmers($f_no, $f_id, $f_name, $f_locallity, $f_ac, $f_phone,$conn) {
    $errors= array ('valid'=>true, 'nulls'=>'','id'=>'','no'=>'');
     $has_errors = FALSE;
    if ($f_no=='' || $f_id=='' ||$f_name=='' ||$f_locallity=='' ||$f_ac=='' ||$f_phone=='') {
         $errors['nulls']= '<span class="error badge badge-warning"> All fields with * are requied</span>';
        $has_errors = TRUE;
     }
      $idresult=  mysql_query("select * from farmers where f_id= '$f_id' ", $conn) or die("unable to fetch records" . mysql_error());
        if (mysql_num_rows($idresult) > 1) {
            $errors['id'] = "<span class='error  badge badge-warning'>Farmer with id no:$f_id Has been registered already</span>";
            $has_errors = TRUE;
        } else {
            $errors['id'] = '';
        }
       $noresult= mysql_query("select * from farmers where f_no= '$f_no' ", $conn) or die("unable to fetch records" . mysql_error());
        if (mysql_num_rows($noresult) > 1) {
            $errors['no'] = "<span class='error  badge badge-warning'>Farmer no:$f_id Has already been issued</span>";
            $has_errors=TRUE;
        } else {
            $errors['no'] = '';
        }
      
  $errors['valid']=!$has_errors;
    return $errors;
}
?>