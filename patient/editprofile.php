<?php 
    include_once("header.php");
?>

<br><br><br><br><br><br>
<!-- BEGIN PAGE CONTENT-->
             <div class="row-fluid">
                 <!-- BEGIN PROFILE PORTLET-->
                 <div class=" profile span12">
                    
                    
 <div class="span10">
           <?php
include_once("../class/User.php");
$obj=new User(); 
$fnm=$lnm=$bd=$add=$mob=$email=$city="";
$Uid=$_SESSION["uid"];
    $rec=$obj->display1($Uid);
    while($result=mysqli_fetch_array($rec))
    {
        $fnm=$result[0];
        $lnm=$result[1];
        $bd=$result[5];
        $mob=$result[2];
        $add=$result[3];
        $email=$result[4];
        $city=$result[6];       
    }       
//print_r($_POST);

if(isset($_POST["btnSub"]))
{
        
        $fnm=$_POST["txtFnm"];
        $lnm=$_POST["txtLnm"];
    $bd=$_POST["txtBb"];
    $mob=$_POST["txtMob"];
        $add=$_POST["textAdd"];
    $email=$_POST["txtEm"];
    //$city=$_POST["txtAnm"];
            
        $obj->set_Firstname($fnm);
        $obj->set_Lastname($lnm);
        $obj->set_DOB($bd);
        $obj->set_Contact($mob);
        $obj->set_Address($add);
        $obj->set_Email($email);

                $obj->update1($obj,$Uid);
            
    
    header('location:../patient/profile.php');    
}

?>


 
                        
                         <div class="space15"></div>
                     <div class="row-fluid">
                             <div class="span8 bio">
 
                <div class="panel panel-default">
                <div class="panel-heading"><strong><h2>EDIT GRAPH</h2></strong></div>
                    <div class="panel-body">
                                <thead>
                                 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable"> 
                                
                                
                                
                         <form  method="post" id="form-validate">
        
        
        
        
            <tr><td><label for="firstname" class="required">First Name</label></td><td>
           <input type="text" id="firstname" name="txtFnm" value="<?php echo $fnm;?>" title="First Name" maxlength="255" class="input-text required-entry"  /></td></tr>
        
    
    
      <tr><td>  <label for="lastname" class="required">Last Name</label></td><td>
             <input type="text" id="lastname" name="txtLnm" value="<?php echo $lnm;?>" title="Last Name" maxlength="255" class="input-text required-entry"  /></td></tr>
       
       <tr><td><label for="dob" class="required">Date of Birth</label></td><td>
            <input type="date" id="dob" name="txtBb" value="<?php echo $bd;?>" title="dob" maxlength="255" class="input-text required-entry"  /></td></tr>
        
        <tr><td><label for="contact1" class="required">Mobile no.</label></td><td>
             <input type="text" id="Contact" name="txtMob" value="<?php echo $mob;?>" title="Contact" maxlength="255" class="input-text required-entry"  /></td></tr>
        
        <tr><td><label for="address" class="required">Address</label></td><td>
                <textarea rows="5" cols="10" name="textAdd" style="width: 363px; height: 74px;" ><?php echo $add;?></textarea></td></tr>

                
 
          
             <tr><td><label for="email" class="required">Email</label></td><td>
                    <input type="text" id="Email" name="txtEm" value="<?php echo $email;?>" title="Email" class="input-text required-entry"  /></td></tr>
            
                       <tr><td colspan="2"><center> <button type="Submit" name="btnSub" title="Submit" class="button">Submit</button></center></td></tr>
                 
                            </form> 
                             <div class="space10"></div>

              </table></thead>
                                
                                 
                                  </div>
                         </div>
                          

                     
                     </div>
                 </div>
                 <!-- END PROFILE PORTLET-->
             </div>
            <!-- END PAGE CONTENT-->
         </div>
         </div>                 
                          <!-- END PROFILE PORTLET-->
              
<?php 
    include_once("footer.php");
?>
    

    
</body>
</html>