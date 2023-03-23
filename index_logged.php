
<?php
    require "head_logged.php";
?>
<?php
//si connette al db


session_start();
if(array_key_exists('button1', $_POST)) {
    insert();
}
if(array_key_exists('button2', $_POST)) {
    delete();
}
if(array_key_exists('button3',$_POST)){
    update();
}
if(array_key_exists('button4',$_POST)){
    select();

}function select(){
    require('db.php');
    if(isset($_POST['Max'])){
        if (isset($_POST['Num']) and isset($_POST['CLASSE'])){
            $Num=$_REQUEST['Num'];
            $CLASSE=$_REQUEST['CLASSE'];
            $Max=$_REQUEST['Max'];
            $query = "SELECT * FROM TEST_GPS WHERE N=$Num AND CLASSE='$CLASSE' LIMIT $Max";
            $result = $con->query($query);
            
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<div class='flex-container'>";
                echo"<div class='glass'>";
                echo "<table  class='styled-table'>";
                
                echo "<tr><th>ID</th><th>LAT</th><th>LON</th><th>ALT</th></tr>";
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["LAT"]. "</td><td>" . $row["LON"]. "</td><td>" . $row["ALT"]. "</td></tr>";
                }
                echo "</table>";
                echo"</div>";
                echo"</div>";
            } else {
                echo "0 results";
            }
            $con->close();
            
        }
    }else{
        if (isset($_POST['Num']) and isset($_POST['CLASSE'])){
            $Num=$_REQUEST['Num'];
            $CLASSE=$_REQUEST['CLASSE'];
            $query = "SELECT * FROM TEST_GPS WHERE N=$Num AND CLASSE='$CLASSE'";
            $result = $con->query($query);
            
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<div class='flex-container'>";
                echo"<div class='glass'>";
                echo "<table  class='styled-table'>";
                
                echo "<tr><th>ID</th><th>LAT</th><th>LON</th><th>ALT</th></tr>";
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["LAT"]. "</td><td>" . $row["LON"]. "</td><td>" . $row["ALT"]. "</td></tr>";
                }
                echo "</table>";
                echo"</div>";
                echo"</div>";
            } else {
                echo "0 results";
            }
            $con->close();
            
        }
    }

}
function delete(){
    require('db.php');
    if (isset($_POST['ID'])){

        $ID=$_REQUEST['ID'];
        $query = "DELETE FROM TEST_GPS WHERE id='$ID'";
        $result = mysqli_query($con,$query) or die(mysql_error());
                if($result){
                    echo"query ok";
                }else{
                    echo "query failed";
                    echo mysql_error();
                }
    }
}
function insert(){
    require('db.php');
    if (isset($_POST['LAT']) and isset($_POST['LON']) and isset($_POST['ALT']) and isset($_POST['CLASSE']) and isset($_POST['Num'])){
        

            $ALT=$_REQUEST['ALT'];
            $LON=$_REQUEST['LON'];
            $LAT=$_REQUEST['LAT'];
            $CLASSE=$_REQUEST['CLASSE'];
            $Num=$_REQUEST['Num'];
            $query = "INSERT INTO TEST_GPS (LAT,LON,ALT,CLASSE,N) VALUES ('$LAT','$LON','$ALT', '$CLASSE ', $Num )";
            for($i=0;$i<1;$i++){
                $result = mysqli_query($con,$query) or die(mysql_error());
                if($result){
                    echo"query ok";
                }else{
                    echo "query failed";
                    echo mysql_error();
                }
            }
            
            
    }
}
function update(){
    //UPDATE employees SET email = 'mary.patterson@classicmodelcars.com'WHERE employeeNumber = 1056;
    require('db.php');
    if (isset($_POST['ID'])){
        $ID=$_REQUEST['ID'];
        if(isset($_POST['LAT']) && $_POST['LAT'] !== ""){
            if(isset($_POST['LAT'])){
            $LAT=$_REQUEST['LAT'];
            $query = "UPDATE TEST_GPS SET LAT='$LAT' WHERE id='$ID'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            if($result){
                echo"query ok";
            }else{
                echo "query failed";
                echo mysql_error();
            }
        }
        if(isset($_POST['LON']) && $_POST['LON'] !== ""){
            $LON=$_REQUEST['LON'];
            $query = "UPDATE TEST_GPS SET LON='$LON' WHERE id='$ID'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            if($result){
                echo"query ok";
            }else{
                echo "query failed";
                echo mysql_error();
            }
        }
        if(isset($_POST['ALT']) && $_POST['ALT'] !== ""){
            $ALT=$_REQUEST['ALT'];
            $query = "UPDATE TEST_GPS SET ALT='$ALT' WHERE id='$ID'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            if($result){
                echo"query ok";
            }else{
                echo "query failed";
                echo mysql_error();
            }
        }
        if(isset($_POST['CLASSE']) && $_POST['CLASSE'] !== ""){
            
            $CLASSE=$_REQUEST['CLASSE'];
            $query = "UPDATE TEST_GPS SET CLASSE='$CLASSE' WHERE id='$ID'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            if($result){
                echo"query ok";
            }else{
                echo "query failed";
                echo mysql_error();
            }
        }
        if(isset($_POST['Num']) && $_POST['Num'] !== ""){
            $Num=$_REQUEST['Num'];
            $query = "UPDATE TEST_GPS SET N='$Num' WHERE id='$ID'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            if($result){
                echo"query ok";
            }else{
                echo "query failed";
                echo mysql_error();
            }
        }
    }
}

}



?>



<div class="flex-container">
<div class="glass">
    <a name="ENTRY"></a>
    <div class="fixed-div2">
        <h1 name="ENTRY" ALIGN=CENTER>fai una entry:</h1>
        
    </div>
    <div>

        <form name="insert" action="" method="post">
        <input type="text" name="LAT" placeholder="Latitudine" required />
        <input type="text" name="LON" placeholder="Longitudine" required />
        <input type="text" name="ALT" placeholder="Altitudine" required />
        <input type="text" name="CLASSE" placeholder="Classe" required />
        <input type="text" name="Num" placeholder="Numero Persona" required />
        <input type="submit" name="button1" value="Button1" />
        </form>

    </div>
    <a name="DELETE"></a>
    <div class="fixed-div2">
        <h1  name="DELETE" ALIGN=CENTER>elimina un record:</h1>
    </div>
    <div  >

        <form name="delete" action="" method="post">
        <input type="text" name="ID" placeholder="ID record" required />
        <input type="submit" name="button2" value="Button2" />
        </form>

    </div>
    <a name="UPDATE"></a>
    <div class="fixed-div2">
        <h1  name="UPDATE" ALIGN=CENTER>aggiorna un record:</h1>
    </div>
    <div  >

        <form name="update" action="" method="post">
        <input type="text" name="ID" placeholder="ID record" required />
        <input type="text" name="LAT" placeholder="Latitudine"  />
        <input type="text" name="LON" placeholder="Longitudine"  />
        <input type="text" name="ALT" placeholder="Altitudine"  />
        <input type="text" name="CLASSE" placeholder="Classe"  />
        <input type="text" name="Num" placeholder="Numero Persona"  />
        <input type="submit" name="button3" value="Button3" />
        </form>

    </div>
    <a name="SELECT"></a>
    <div class="fixed-div2">
        <h1  name="SELECT" ALIGN=CENTER>Visualizza record:</h1>
    </div>
    <div >

        <form name="select" action="" method="post">
        <input type="text" name="CLASSE" placeholder="Classe"  />
        <input type="text" name="Num" placeholder="Numero Persona"  />
        <input type="text" name="Max" placeholder="Numero Massimo di Record"  />
        <input type="submit" name="button4" value="Button4" />
        </form>

    </div>
</div>
</div>

</body>
</html>
