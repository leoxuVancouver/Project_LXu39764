<?php

class Page
{

    public static $heading = "Change MEEEE!!";
    public static $studentID = 300339674;
    public static $studentName = "Leo Xu";
    public static $notifications = [];


    static function showHeader()
    { ?>

        <html>

        <head>
            <html lang="en" class="h-100">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>My hosting</title>
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="css/main.css" rel="stylesheet">
            </head>

        <body>

            <div class="col-lg-8 mx-auto p-3 py-md-5">
                <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
                    <img src="images/gathering.png" alt=" " class="d-flex align-items-center">
                </header>


            <?php }


        static function showFooterLogout()
        { ?>

                <div class="row pt-5 my-5 border-top">
                    <div class="col-md-6">
                        <h2>Join Us</h2>

                        <ul class="icon-list ps-0">
                            <li class="d-flex align-items-start mb-1"><a href="./Project_login_LXu39674.php" rel="noopener" target="_self">Login</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_register_LXu39674.php" rel="noopener" target="_self">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h2>Meetup</h2>

                        <ul class="icon-list ps-0">
                            <li class="d-flex align-items-start mb-1"><a href="./Project_meetup_LXu39674.php" rel="noopener" target="_self">Event List</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_create_meetup_LXu39674.php" rel="noopener" target="_self">Start a event</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_my_meetup_LXu39674.php" rel="noopener" target="_self">My hosting</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_my_attended_LXu39674.php" rel="noopener" target="_self">My attending</a></li>
                        </ul>
                    </div>
                </div>
                <footer class="pt-5 my-5 text-muted border-top">
                    Created by Leo Xu &middot; &copy; 2022
                </footer>
                <!-- <script src="js/bootstrap.bundle.min.js"></script> -->

                <script src="js/main.js"></script>
        </body>

        </html>
    <?php }

        static function showFooterLogin()
        { ?>

        <div class="row pt-5 my-5 border-top">
            <div class="col-md-6">
                <h2>Profile</h2>

                <ul class="icon-list ps-0">
                    <li class="d-flex align-items-start mb-1"><a href="./Project_edit_user_LXu39674.php" rel="noopener" target="_self">View profile</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_logout_LXu39674.php" rel="noopener" target="_self">Logout</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Meetup</h2>

                <ul class="icon-list ps-0">
                    <li class="d-flex align-items-start mb-1"><a href="./Project_meetup_LXu39674.php" rel="noopener" target="_self">Event List</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_create_meetup_LXu39674.php" rel="noopener" target="_self">Start a event</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_my_meetup_LXu39674.php" rel="noopener" target="_self">My hosting</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_my_attended_LXu39674.php" rel="noopener" target="_self">My attending</a></li>
                </ul>
            </div>
        </div>
        <footer class="pt-5 my-5 text-muted border-top">
            Created by Leo Xu &middot; &copy; 2022
        </footer>



        <!-- <script src="js/bootstrap.bundle.min.js"></script> -->

        <script src="js/main.js"></script>
        </body>

        </html>
    <?php }


        static function showUser(User $user, string $disabled)


        {  ?>
        <section>
        <div class="container justify-content-center w-50">

                <?php
                if (self::$notifications) {

                    foreach (self::$notifications as $note) {
                        echo "<p class='error'>" . $note, "</p>";
                    }
                    echo "<br>";
                }
                ?>


                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <h2>Update user information</h2>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" value=<?= $user->getEmail() ?> class="form-control" <?= " " . $disabled ?> required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password class="form-label"" id="p1">password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" <?= " " . $disabled ?> required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password class="form-label"">password confirm</label>
                        <input type="password" name="password2" class="form-control" placeholder="password confirm" <?= " " . $disabled ?> required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="nickname class="form-label"">Nick Name</label>
                        <input type="text" name="nickname" value=<?= $user->getNickname() ?> class="form-control" <?= " " . $disabled ?> required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="gender class="form-label"">Gender</label>
                        <span>
                            <input type="radio" name="gender" value="male" <?= $user->getGender() == 'male' ? 'checked' : null ?> <?= " " . $disabled ?>>Male
                            <input type="radio" name="gender" value="femail" <?= $user->getGender() == 'female' ? 'checked' : null ?> <?= " " . $disabled ?>> Female
                        </span>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" value=<?= $user->getPhone() ?> class="form-control" <?= " " . $disabled ?> required>
                    </div>
                    <div class="form-outline mb-4">
                        <button type="submit" name="edit" value="edit" class="btn btn-primary btn-block mb-4">Edit</button>
                        <button type="submit" name="confirm" value="confirm" <?= " " . $disabled ?> class="btn btn-primary btn-block mb-4">Confirm</button>
                    </div>
                </form>
            </div>
        </section>

    <?php }


        static function showWelcome()
        { ?>

        <section>
            <h1>Meet new friends from all over the world.</h1>
            <p class="fs-5 col-md-8">More than just smell the flower. Meet interesting people in local community.
                Meet wonderful people online. Meet people with same hobby!
            </p>

            <div class="mb-5 d-flex align-items-center"">
            <img src=" images/hiking.jpg" alt=" " class="p-2 my-5 w-25">
                <img src=" images/eatout.jpg" alt=" " class="p-2 my-5 w-25">
                <img src=" images/music.jpg" alt=" " class="p-2 my-5 w-25">
                <img src=" images/dating.jpg" alt=" " class="p-2 my-5 w-25">
            </div>
        </section>
    <?php }



        static function showLogin()
        { ?>
        <!-- login section -->
        <section>
            <div class="container justify-content-center w-25">
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <h2>Please Sign in</h2>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="1234567" class="form-control" required>
                    </div>
                    
                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block mb-4">
                    
                    <?php
                    foreach (self::$notifications as $note)
                        echo  "<p class='error'>" . $note . "</p>";

                    ?>

                </form>
            </div>
        </section>
    <?php }


        static function showRegistration()
        { ?>
        <section>
        <div class="container justify-content-center w-50">
              


                <?php
                if (self::$notifications) {
                    echo  "<p class='error'>All input are required.</p>";
                    foreach (self::$notifications as $note) {
                        echo "<p class='error'>" . $note, "</p>";
                    }
                    echo "<br>";
                }
                ?>


                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <h2>Please fill the form</h2>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">password</label>
                        <input type="password" name="password" placeholder="password" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">password confirm</label>
                        <input type="password" name="password2" placeholder="password confirm"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="nickname" class="form-label">Nick Name</label>
                        <input type="text" name="nickname" placeholder="Nick Name"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="gender" class="form-label">Gender</label>
                        <span  class="form-control" >
                            <input type="radio" name="gender" value="male" >Male
                            <input type="radio" name="gender" value="femail"> Female
                        </span>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" placeholder="123456789" class="form-control"  required>
                    </div>
        
                    <button type="submit" name="submit" value="Register" class="btn btn-primary btn-block mb-3">SIGN IN</button>
                    
                </form>
            </div>
        </section>

    <?php }
       

        static function createMeetup($categories)
        { ?>
        <section>
        <div class="container justify-content-center w-50" >
                <?php
                if (self::$notifications) {
                    echo  "<p class='error'>All input are required.</p>";
                    foreach (self::$notifications as $note) {
                        echo "<p class='error'>" . $note, "</p>";
                    }
                    echo "<br>";
                }
                ?>

                <!-- title,province,city,address,mTime,mDay,userId -->
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post" enctype="multipart/form-data">
                    <h2>Start a event</h2>
                    <div class="form-outline mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" placeholder="title"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="imagefile" class="form-label">Image</label>
                        <input type="file" name="imagefile"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="category">Category(<a href="./Project_create_cate_LXu39674.php" class="form-label" target="_blank">click to add category</a>)</label>
                        <select name="category"  class="form-control" required>
                            <?php
                            foreach ($categories as $cate) {
                                echo "<option value=" . $cate . ">" . $cate . "</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-outline mb-4">
                        <label for="address" class="form-label">address</label>
                        <input type="text" name="address" placeholder="address"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="city" class="form-label">city</label>
                        <input type="city" name="city" placeholder="city"  class="form-control" required>
                    </div>
                    <!-- <div>
                        <label for="province">province</label>
                        <input type="text" name="province" placeholder="province" required>
                    </div> -->
                    <div class="form-outline mb-4">
                        <label for="province" class="form-label">Province</label>
                        <select name="province"  class="form-control" required>
                            <?php
                            foreach (PROVINCE as $prov) {
                                echo "<option value=" . $prov . ">" . $prov . "</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <div class="form-outline mb-4">
                        <label for="mTime" class="form-label">Meeting Time</label>
                        <input type="time" name="mTime"  class="form-control" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="mDay" class="form-label">Meeting Day</label>
                        <input type="date" name="mDay" value=<?= date("Y-m-d") ?> min=<?= date("Y-m-d") ?>  class="form-control" required>
                    </div>


                    <div class="form-outline mb-4">
                        <input type="submit" name="submit" value="Start" class="btn btn-primary btn-block mb-4">
                    </div>
                </form>

            </div>
        </section>

    <?php }

        static function editMeetup($meetup, $categories)
        { ?>
        <section>
            <div class="container justify-content-center w-50">
                <?php
                if (self::$notifications) {
                    echo  "<p class='error'>All input are required.</p>";
                    foreach (self::$notifications as $note) {
                        echo "<p class='error'>" . $note, "</p>";
                    }
                    echo "<br>";
                }
                ?>

                <!-- title,province,city,address,mTime,mDay,userId -->
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <h2>Edit event</h2>
                    <div class="form-outline mb-4">
                        <label for="meetupId"  class="form-label">MeetupId</label>
                        <input type="text" name="meetupId" value=<?= $meetup->getId() ?> class="form-control" readonly>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="title"  class="form-label">Title</label>
                        <input type="text" name="title" value=<?= $meetup->getTitle() ?>  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="category"  class="form-label">Category(<a href="./Project_create_cate_LXu39674.php" target="_blank">click to add category</a>)</label>
                        <select name="category"  class="form-control" required>
                            <?php
                            foreach ($categories as $cate) {
                                // echo $meetup->getCategory()." ".$cate;
                                $selected = ($meetup->getCategory() == $cate) ? "selected" : "null";
                                echo "<option value=" . $cate . " " . $selected . ">" . $cate . "</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-outline mb-4">
                        <label for="address"  class="form-label">address</label>
                        <input type="text" name="address" value=<?= $meetup->getTitle() ?>  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="city" class="form-label">city</label>
                        <input type="city" name="city" value=<?= $meetup->getCity() ?>  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="province" class="form-label">province</label>
                        <input type="text" name="province" value=<?= $meetup->getprovince() ?>  class="form-control" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="mTime" class="form-label">Meeting Time</label>
                        <input type="time" name="mTime" value=<?= $meetup->getmTime() ?>  class="form-control" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="mDay" class="form-label">Meeting Day</label>
                        <input type="date" name="mDay" value=<?= $meetup->getmDay() ?> min=<?= date("Y-m-d") ?>  class="form-control" required>
                    </div>


                    <div class="form-outline mb-4">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block mb-4">
                    </div>
                </form>

            </div>
        </section>

    <?php }

        static function createCategory()
        { ?>
        <section>
        <div class="container justify-content-center w-50">

                <?php
                if (self::$notifications) {
                    foreach (self::$notifications as $note) {
                        echo "<p class='error'>" . $note, "</p>";
                    }
                    echo "<br>";
                }
                ?>

                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <h2>Add new category</h2>
                    <div class="form-outline mb-4">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" name="category" placeholder="category" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="desc" class="form-label">Description</label>
                        <input type="text" name="desc" placeholder="description" class="form-control" required>
                    </div>

                    <div>
                        <input type="submit" name="submit" value="Create" class="btn btn-primary btn-block mb-4">
                    </div>
                </form>
                <h2>Load a file</h2>
            <form method="post" enctype="multipart/form-data">
                You can also load a data file (txt). <br>
                <input type="file" name="cateData" value=""class="btn btn-primary btn-block mb-4"><br>
                <input type="hidden" name="upload" value="upload" class="btn btn-primary btn-block mb-4">
                <input type="submit" name="submit" value="Go!" class="btn btn-primary btn-block mb-4">
            </form>

            </div>

          

        </section>

    <?php }

       


        static function showLogout()
        { ?>
    <?php
        }

        ///
        static function showMeetupList($meetups)
        { ?>
        <!-- title,province,city,address,mTime,mDay,userId -->
        <section>
            <div>
                <h2>Event List </h2>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <div class="input-group" style='width: 25rem;'>
                    <input type="text" placeholder="input title" class="form-control rounded" name="searchTitle">
                    <button type="submit" name="search" value="search" class="btn btn-outline-primary"> serach</button>
                    </div>
                </form>

                <div class="container">
                    <div class="row">
                        <?php

                        foreach ($meetups as $meetup) {

                            echo  "<div class='card' style='width: 25rem;'>";
                            echo    "<img src={$meetup->getImage()} class='card-img-top'>";
                            echo    "<div class='card-body'>";
                            echo    "<h5 class='card-title text-primary'>{$meetup->getTitle()}</h5>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Time    : </span>
                                        <span class='card-text'>{$meetup->getmTime()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Day     : </span>
                                        <span class='card-text'>{$meetup->getmDay()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Address :</span>
                                        <span class='card-text'>{$meetup->getaddress()}</span>
                                        </p>";

                            echo    "<p>
                                        <span class='card-text text-warning'>Location : </span>
                                        <span class='card-text'>{$meetup->getcity()},{$meetup->getprovince()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Category : </span>
                                        <span class='card-text'>{$meetup->getCategory()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Attendee Number : </span>
                                        <span class='card-text'>{$meetup->attendeeCount}</span>
                                        </p>";


                            if (isset($meetup->joined) && $meetup->joined) {
                                $link = $_SERVER['PHP_SELF'] . "?action=cancel&meetupId=" . $meetup->getId();
                                echo "<a href=\"" . $link . "\" class='btn btn-primary'>Cancel</a>";
                            } else {
                                $link = $_SERVER['PHP_SELF'] . "?action=join&meetupId=" . $meetup->getId();
                                echo "<a href=\"" . $link . "\"  class='btn btn-primary'>Join</a>";
                            }
                            echo     "</div> </div>";
                        } ?>

                    </div>
                    <h2 class="m-4"> Total events number : <?=count($meetups)?> </h2>
        </section>

    <?php
        }

        static function showMyMeetupList($meetups)
        { ?>
        <section>
            <div>
                <h2>Event List</h2>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <div class="input-group" style='width: 25rem;'>
                    <input type="text" placeholder="input title" class="form-control rounded" name="searchTitle">
                    <button type="submit" name="search" value="search" class="btn btn-outline-primary"> serach</button>
                    </div>
                </form>

                <div class="container">
                    <div class="row">
                        <?php

                        foreach ($meetups as $meetup) {

                            echo  "<div class='card' style='width: 25rem;'>";
                            echo    "<img src={$meetup->getImage()} class='card-img-top'>";
                            echo    "<div class='card-body'>";
                            echo    "<h5 class='card-title text-primary'>{$meetup->getTitle()}</h5>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Time    : </span>
                                        <span class='card-text'>{$meetup->getmTime()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Day     : </span>
                                        <span class='card-text'>{$meetup->getmDay()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Address :</span>
                                        <span class='card-text'>{$meetup->getaddress()}</span>
                                        </p>";

                            echo    "<p>
                                        <span class='card-text text-warning'>Location : </span>
                                        <span class='card-text'>{$meetup->getcity()},{$meetup->getprovince()}</span>
                                        </p>";
                            echo    "<p>
                                        <span class='card-text text-warning'>Category : </span>
                                        <span class='card-text'>{$meetup->getCategory()}</span>
                                        </p>";

                            //
                            $link = $_SERVER['PHP_SELF'] . "?action=delete&meetupId=" . $meetup->getId();
                            echo "<span class='m-5'><a href=\"" . $link . "\" class='btn btn-primary'>Delete</a></span>";
                            $link = "./Project_edit_meetup_LXu39674.php?action=edit&meetupId=" . $meetup->getId();
                            echo "<span class='m-5'><a href=\"" . $link . "\" class='btn btn-primary'>Edit</a></span>";
                            echo     "</div> </div>";
                        } ?>

                    </div>
        </section>
    

    <?php }





    }



?>