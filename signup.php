<!--signup page -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="logo.jpeg" type="image/icon type">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Uniclub | Signup</title>

    <!--CSS Style-->
    <link rel = "stylesheet" href = "styling.css">
  </head>
  <body>
    <div class = "form">
        <div class = "home1">
            <form action = "signup_send.php" method = "post">
                <div class = "logtxt">Signup</div>
                <div class="form-group">
                    <!--<label for="exampleInputEmail1">We need your Username!</label>-->
                    <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" placeholder="Username" name = "uname" required>
                </div>
                <div class="form-group">
                    <!--<label for="exampleInputName1">We need your Name!</label>-->
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name = "name" required>
                </div>
                <div class="form-group">
                <!--<label for="exampleInputEmail1">Year of Study</label> -->
                    <input type="text" class="form-control" id="exampleInputYear1" aria-describedby="emailHelp" placeholder="Year of Study" name = "year" required>
                </div>

                <div class="form-group">
                <!--<label for="exampleInputEmail1">Department</label> -->
                    <input type="text" class="form-control" id="exampleInputDept1" aria-describedby="emailHelp" placeholder="Department" name = "dept" required>
                </div>

                <div class="form-group">
                    <!--<label for="exampleInputEmail1">We need your Email!</label>-->
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name = "email" required>
                </div>

                <div class="form-group pw">
                    <!--<label for="exampleInputPassword1">And Password (Dw, it's safe with us!)</label>-->
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name = "pword" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class = "logbtn col-md-12 text-center"><button type="submit" class="btn btn-primary" name = "signup">Submit</button></div>
                <div class = "signtxt">Already have an account? <a href = "index.php">Login</a></div>
            </form>
        </div>
    </div>

    
  </body>
</html>
