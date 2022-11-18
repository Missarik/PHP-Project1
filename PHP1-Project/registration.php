<?php   
include 'includes/header.php';
?>


<div class="row">
    <div class="col-8">
        <form action="includes/registration-inc.php" method="POST">
            <div>
                <label for="">Username: </label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="">Password: </label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="">Confirm Password: </label>
                <input type="password" name="confPassword" id="confPassword">
            </div>
            <div>
                <label for="">Name: </label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="">Surname: </label>
                <input type="text" name="lastName" id="lastName">
            </div>
            <div>
                <label for="">Email Address: </label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="">Date of Birth: </label>
                <input type="date" name="dob" id="dob">
            </div>

            <button type="submit" name="submit" id="submit">Submit</button>
        </form>
    </div>
</div>


<?php
include 'includes/footer.php';
?>