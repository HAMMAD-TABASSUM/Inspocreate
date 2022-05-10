<?php
//index.php
?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Store Form data in CSV File using PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <div class="row">
     <div class="col-md-6" style="margin:0 auto; float:none;">
      <span id="success_message"></span>
      <form method="post" id="programmer_form">
       <div class="form-group">
        <label>Enter your Skill</label>
        <input type="text" name="skill" id="skill" class="form-control" />
       </div>
        <input type="submit" name="save-user" id="save-user" class="btn btn-info" value="save-user " />
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){
 
 $('#skill').tokenfield({
  autocomplete:{
   source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
   delay:100
  },
  showAutocompleteOnFocus: true
 });

 $('#programmer_form').on('submit', function(event){
  event.preventDefault();
  
  if($.trim($('#skill').val()).length == 0){
   alert("Please Enter Atleast one Skill");
   return false;
  }else{
   var form_data = $(this).serialize();
//    $('#submit').attr("disabled","disabled");
   $.ajax({
    url:"tags.php",
    method:"POST",
    data:form_data,
    success:function(data){
     if(data != '')
     {
      $('#skill').tokenfield('setTokens',[]);
      $('#success_message').html(data);
      $('#save-user').attr("disabled", false);
      $('#save-user').val('save-user');
     }
    }
   });
   setInterval(function(){
    $('#success_message').html('');
   }, 5000);
  }
 });
 
});
</script>
<?php
    //insert.php

    if(isset($_POST["skill"]))
    {
    $connect = new PDO("mysql:host=localhost;dbname=inspocreate", "root", "");
    $query = "UPDATE post (tags) VALUES(:skill) where id={$usid}";
    $statement = $connect->prepare($query);
    $statement->execute(array(':skill' => $_POST["skill"]));
    $result = $statement->fetchAll();
    $output = '';
    echo $output;
    }

?>