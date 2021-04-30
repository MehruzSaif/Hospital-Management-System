<?php require_once('MVC/Model/include/db.php') ;?>
<?php require_once('MVC/Model/include/config.php') ;?>
<?php require_once('MVC/Model/include/session.php') ;?>
<?php require_once('MVC/Model/include/header.php') ;?>
<?php 
$docQuery = 'SELECT * FROM doctors';
$docLists = $mysqli->query($docQuery);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $speciality = $_POST['speciality'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $query  = "INSERT INTO doctors (name,speciality,phone,address) values ('$name','$speciality','$phone','$address')";
    $res = $mysqli->query($query);
    if($res){
        echo 'Doctor added sucessfully!';
        header('Location: '.ROOT_URL.'doctors.php');
    }else{
        echo 'Something Went Wrong';
    }
}


?>


<div class="container mt-5  bg-white p-4" style="border-radius:3px;">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="font-weight-light text-primary">Add Doctor</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="">Doctors Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Doctor Name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Speciality:</label>
                    <input type="text" class="form-control" placeholder="Speciality" name="speciality" required>
                </div>
                <div class="form-group">
                    <label for="">Phone Number:</label>
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter Valid Address" name="address" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" name="submit">Add</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <h2 class="font-weight-light text-primary">Doctors List</h2>
            <?php  if($docLists->num_rows > 0) :  $docRows = $docLists->fetch_all(MYSQLI_ASSOC); ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <tr>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Phone</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach($docRows as $doc):?>
                        <tr>
                            <td><?php echo $doc['name']; ?></td>
                            <td><?php echo $doc['speciality']; ?></td>
                            <td><?php echo $doc['phone']; ?></td>
                            <td><a href="doc_delete.php?id=<?php echo $doc['id'] ;?>" class="btn btn-sm btn-danger">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
           
            <?php else: ?>
                <div class="bg-light text-center py-3 font-italic text-secondary"> No doctors Found!</div>
             <?php  endif ; ?>
        </div>
    </div>
    
</div>

<?php require_once('MVC/View/footer.php') ;?>