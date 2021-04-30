<?php require_once('MVC/Model/include/db.php') ;?>
<?php require_once('MVC/Model/include/config.php') ;?>
<?php require_once('MVC/Model/include/session.php') ;?>
<?php require_once('MVC/View/header.php') ;?>
<?php 
$docQuery = 'SELECT * FROM doctors';
$docLists = $mysqli->query($docQuery);
if(isset($_POST['submit'])){
    $pat_name = $_POST['pat_name'];
    $gender = $_POST['gender'];
    $pat_dob = $_POST['pat_dob'];
    $app_date = $_POST['app_date'];
    $doc_id = $_POST['doc_id'];
    $query  = "INSERT INTO appointments (pat_name,gender,pat_dob,app_date,doc_id) values ('$pat_name','$gender','$pat_dob','$app_date','$doc_id')";
    $res = $mysqli->query($query);
    if($res){
        echo 'Appointment added sucessfully!';
        header('Location: '.ROOT_URL.'appointments.php');
    }else{
        echo 'Something Went Wrong';
    }
}


?>


<div class="container mt-5  bg-white p-4" style="border-radius:3px;">
    <div class="row">
    <div class="col-lg-9">
            <h2 class="font-weight-light text-primary">Add Appointments</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="">Patient Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Patient Name" name="pat_name" required>
                </div>
                <div class="form-group">
                    <label for="">Gender:</label>
                    <select name="gender" id="" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>    
                </div>
                <div class="form-group">
                    <label for="">Patient's Date of birth:</label>
                    <input type="date" class="form-control" placeholder="Date of Birth" name="pat_dob" required>
                </div>
                <div class="form-group">
                    <label for="">Appointment Date:</label>
                    <input type="date" class="form-control" placeholder="Appointment Date" name="app_date" required>
                </div>
                <div class="form-group">
                    <label for="">Doctor's Name:</label>
                    <select name="doc_id" id="" class="form-control">
                    <?php  if($docLists->num_rows > 0) :  $docRows = $docLists->fetch_all(MYSQLI_ASSOC); foreach($docRows as $doc ) : ?>
                        <option value=<?php echo $doc['id'];  ?>><?php echo $doc['name']; ?></option>
                    <?php endforeach; endif; ?>    
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" name="submit">Add Appointment</button>
                </div>
            </form>
        </div>    
        <div class="col-lg-12">
            <h2 class="font-weight-light text-primary">Appointment List</h2>
            <?php 
            $appQuery = 'SELECT a.*,b.name as doc_name,b.phone as doc_phone from appointments a,doctors b where a.doc_id = b.id';
            $appointments = $mysqli->query($appQuery);
            if($appointments->num_rows > 0){ ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <tr>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Appointment Date</th>
                        <th>Doc Info</th>
                        <th>Delete</th>
                    </tr>
            <?php         
                $approws = $appointments->fetch_all(MYSQLI_ASSOC);
                foreach($approws as $app){ ?>
                    <tr>
                        <td><?php echo $app['pat_name'] ;?></td>
                        <td><?php echo $app['gender'] ;?></td>
                        <td><?php echo $app['pat_dob'] ;?></td>
                        <td><?php echo $app['app_date'] ;?></td>
                        <td>
                            <strong> Doc Name: <?php echo $app['doc_name'] ;?> <br> </strong>
                            Doc Contact: <?php echo $app['doc_phone'] ?>
                        </td>
                        <td><a href="appointment_delete.php?id=<?php echo $app['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    
                    </tr>
               <?php }
            }else{ ?>
             <div class="bg-light text-center py-3  font-italic text-secondary"> No Appointments Found!</div>     

           <?php }
            ?>
           
                </table>
        </div>
        </div>
        
    </div>
</div>

<?php require_once('MVC/View/footer.php') ;?>