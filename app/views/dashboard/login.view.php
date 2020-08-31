<div class="container-fluid ml-0 p-0" style="height: 100%">

    <div class="row w-100" style="height: 100vh">
        <div class="col-5 p-0" style="max-height: 100%;">
            <img src="<?= IMG ?>login.png" alt="Login" class="w-100 h-100">
            <div class="overlay w-100 h-100" style="position: absolute;top: 0;left: 0;background:rgba(28,5,81,0.5)"></div>
        </div>
        
        <div class="col-7 p-0">
            <div class="login" style="margin: 20vh 10vw;">
                <h1 class="mb-2" style="font-size: 60px; color:#1C0551; font-weight: bold">Welcome Back</h1>
                <p class="lead mb-5" style="color: var(--gray);">Sign in to continue using dashboard</p>

                <form action="#" method="post">
                    <div class="mb-5 pb-5">
                        <label for="email" class="">Email</label>
                        <input class="form-control mb-4 mt-0 p-0" type="email" name="email" required/>
                        <label for="password" class="">Password</label>
                        <input class="form-control p-0" type="password" name="pass" required/>
                    </div>
                    <input class="form-control btn text-primary" type="submit" name="sub" value="LOGIN" />
                </form>
            </div>
        </div>
    </div>

</div>