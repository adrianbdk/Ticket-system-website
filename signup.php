<?php
    include_once 'header.php';
?>
<style>
input[type="username"]{
        border-bottom-left-radius: 0px;;
        border-bottom-right-radius: 0px;;
    }
    input[type="email"]{
        border-top-left-radius: 0px;;
        border-top-right-radius: 0px;;
        border-bottom-left-radius: 0px;;
        border-bottom-right-radius: 0px;;        
        border-top: 0px;;
    }
    input[type="password"]{
        border-top-left-radius: 0px;;
        border-top-right-radius: 0px;;
        border-bottom-left-radius: 0px;;
        border-bottom-right-radius: 0px;;
        border-top: 0px;;
        
    }
    input[type="passwordrepeat"]{
        border-top-left-radius: 0px;;
        border-top-right-radius: 0px;;
        border-top: 0px;;
        input[type="password"];;
        
        
    }

</style>
<div class="text-center mt-5">
    <form style="max-width:480px;margin:auto;">
        <h1 class = "h3 mb-3 font-weight-normal">Sign Up</h1>
        <form action="includes/signup.inc.php" method="POST">
            <input type="username" class="form-control" name="username" placeholder="Username..." id="Username" required autofocus>
        
            <input type="email" class="form-control" name="email" placeholder="Email..." id="Email" required autofocus>
            
            <input type="password" class="form-control" name="pwd" placeholder="Password..." required autofocus>
            
            <input type="password" class="form-control" name="pwdrepeat" placeholder="Repeat Password..." required autofocus>
            <div class="mt-3">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>
            </div>
        </form>

        

</form>
</div>