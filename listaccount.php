<?php
 require ("db.php");
 $conn = connect();

    $sql = "select * from listaccount ";
    $result = $conn -> query($sql);
    $listaccount = [];
    if ($result -> num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $listaccount[] = $row;
        }
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
        <a href="create.php" class="btn btn-outline-primary">Create new account</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listaccount as $item):?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><?php echo $item["fullname"] ?></td>
                    <td><?php echo $item["email"] ?></td>
                    <td><?php echo $item["pass"] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $item["id"] ?>" class="btn btn-warning">Edit</a>
                        <a  href="delete.php?id=<?php echo $item["id"] ?>" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>

        </table>
    </div>
</section>
</body>
<style>

</style>
</html>