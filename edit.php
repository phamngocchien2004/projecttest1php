<?php
$id = $_GET["id"];
// 1. connect db
$host = "127.0.0.1";
$dbname = "registerphp";
$dbuser = "root";
$dbpass = ""; // Xampp: ""   Mamp: "root"

$conn = new mysqli($host,$dbuser,$dbpass,$dbname); // host user pass dbname
if($conn->connect_error){
    die("Connection refused!");
}
// connection succeed
$sql = "select * from listaccount where id = $id";// 0 | 1
$result = $conn->query($sql);
$listaccount1 = null;
if($result->num_rows > 0){
    $listaccount1 = $result->fetch_assoc();
}else{
    die("404 not found!");
}
?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<section>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="update.php?id=<?php echo $id;?>" method="post">

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" value="<?php echo $listaccount1["fullname"] ?>" name="fullname" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" value="<?php echo $listaccount1["email"] ?>" name="email" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" value="<?php echo $listaccount1["pass"] ?>" name="pass" class="form-control" required/>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</section>
</body>
</html>
