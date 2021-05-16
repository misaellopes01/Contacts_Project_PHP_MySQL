<?php
    include('database.php');
    $id = $_GET['q'];
    $query = "SELECT id, name, phone, email FROM `contacts` WHERE id = '$id' ";
    $run_query = mysqli_query($database, $query);
    $contact = mysqli_fetch_object($run_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar navbar-theme justify-content-between">
        <a class="navbar-brand" href="index.php">Home</a>
    </nav>
    <section class="sec">
        
        <legend class="legen">Details of <span style="color: crimson;"><?= $contact->name; ?></span></legend>
        
        <table class="table table-dark">
            <tbody>
                <tr>
                    <th scope="col">#ID</th>
                    <td><?= $contact->id; ?></td>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <td><?= $contact->name; ?></td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td><?= $contact->email; ?></td>
                </tr>
                <tr>
                    <th scope="col">Phone</th>
                    <td><?= $contact->phone; ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a class="btn btn-danger" href="delete.php?q=<?= $contact->id; ?> onclick="return confirm('Are You Sure?')">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>