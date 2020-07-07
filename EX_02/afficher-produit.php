<!DOCTYPE html>
<html>

<head>
    <title> MySQL</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>Bases de données MySQL</h1>
    <?php
   function connect_to_database()
   {
       $servername = "localhost";
       $username = "root";
       $password = "root";
       $databasename = "BaseTest01";
       try {
           $pdo = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
           $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           echo "Connexion réussie, congrats!";
           return $pdo;
       }catch (PDOException $e){
           echo "Connection failed: " . $e -> getMessage();
       }
    }
   $pdo = connect_to_database();
   $produit = $pdo-> query("SELECT * FROM produit")->fetchAll();
    
   echo"<ul>";
   foreach($produit as $produit){
       echo "<li>$produit[nom]</li>" ; 
   }
   echo"</ul>";
   
    ?>
</body>

</html>