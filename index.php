<?php
session_start();

define("DBNAME", 'dynamic_insert');
define("DBUSER", 'root');
define("DBPASS", '');

    try{
      $conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    }
    catch(PDOException $e) {
            echo $e->getMessage();
    }
$id = 3;

include 'function.php';
    if(array_key_exists("submit", $_POST)){
      insert($conn,'first',$_POST,'id',$id);
      // insert($conn,'first',$_POST);
    }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dynamic Insert</title>

    <script type="text/javascript" src="ckeditor5-build-classic/build/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
  </head>
  <body>
    <form class="" action="" method="post">
      <!-- <input type="text" name="name" value=""> -->
        <textarea name="name" id="editor" rows="8" cols="80"><?php $stmt = $conn->prepare("SELECT * FROM first");
        $stmt->execute();
        while($row= $stmt->fetch(PDO::FETCH_BOTH)){
          extract($row);
          echo $name;
        }

         ?></textarea>
      <input type="text" name="age" value="">
      <input type="text" name="class" value="">
      <input type="text" name="address" value="">
      <input type="submit" name="submit" value="submit">
    </form>
<br>
<?php $stmt = $conn->prepare("SELECT * FROM first");
$stmt->execute();
while($row= $stmt->fetch(PDO::FETCH_BOTH)){
  extract($row);
  echo $name;
}

 ?>

<script type="text/javascript">
ClassicEditor
.create( document.querySelector( '#editor' ), {
  ckfinder: {
      uploadUrl: 'http://localhost/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

  }
} )
.then( editor => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );
</script>






  </body>
</html>
