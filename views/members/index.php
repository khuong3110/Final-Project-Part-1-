
<?php include('views/elements/header.php');?>

<div class="container">
    <div class="page-header">

        <h1><?php echo $title;?></h1>
    </div>
    <!-- Display all members if current action is all -->
    <table class="table">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </thead>
        <tbody>
            <?php
                foreach ($members as $u){
                    echo '<tr>';
                    echo '<td scope="row"><a href="'.BASE_URL.'members/profile/'.$u["uID"].'">'.$u["first_name"].' '.$u["last_name"].'</td>';
                    echo '<td>'.$u["email"].'</td>';
                    echo ' </tr>';
                }

            ?>
        </tbody>
    </table>
</div>
