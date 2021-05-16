<?php
    include('database.php');
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $query = "INSERT INTO `contacts` (name, email, phone) VALUES ('$name', '$email', '$phone');";
        
        if(mysqli_query($database, $query)){
            echo '<strong style="color: green">Subscrição Feita com Sucesso!</strong>';
        }
    }
    //Showing Data
    $query = "SELECT * FROM `contacts`";
    $run_query = mysqli_query($database, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar navbar-theme justify-content-between">
        <a class="navbar-brand">Contacts WEB Diary</a>
    </nav>
    <section class="sec">    
        <form class="form1" method="POST" action="index.php">
            <legend class="legen">Contact Us</legend>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Nome" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@example.com" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputNumber" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNumber" name="phone" placeholder="Type your phone number" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
        </form>
    </section>
    <hr>
    <?php
        if ($run_query->num_rows == 0) {
            echo "<legend class='legen'>No Records Added</legend> <hr>";
        } else {

    ?>

    <section class="sec">
        <legend class="legen">List Of All Records</legend>
        <table class="table table-dark">
            <thead>
                <tr style="text-align: center;">
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($contact = mysqli_fetch_object($run_query)): ?>
                <tr style="text-align: center;">
                    <td><?= $contact->id ?></td>
                    <td><?= $contact->name ?></td>  
                    <td><?= $contact->email ?></td>
                    <td><?= $contact->phone ?></td>
                    <td>
                        <a href="details.php?q=<?= $contact->id; ?>">Details</a>
                        <a href="edit.php?q=<?= $contact->id; ?>" style="color: yellow;">Update</a>
                        <a href="delete.php?q=<?= $contact->id; ?>" style="color: red;" onclick="return confirm('Are You Sure?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </section>
<?php } ?>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>