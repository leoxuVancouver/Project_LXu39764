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
                <title>My meetup</title>
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
                            <li class="d-flex align-items-start mb-1"><a href="./Project_meetup_LXu39674.php" rel="noopener" target="_self">Meetup List</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_my_attended_LXu39674.php" rel="noopener" target="_self">My participation</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_create_meetup_LXu39674.php" rel="noopener" target="_self">Create meetup</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_create_cate_LXu39674.php" rel="noopener" target="_self">Create category</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="./Project_my_meetup_LXu39674.php" rel="noopener" target="_self">My meetup</a></li>
                        </ul>
                    </div>
                </div>
                <footer class="pt-5 my-5 text-muted border-top">
                    Created by Leo Xu &middot; &copy; 2022
                </footer>



                <script src="js/bootstrap.bundle.min.js"></script>


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
                    <li class="d-flex align-items-start mb-1"><a href="./Project_meetup_LXu39674.php" rel="noopener" target="_self">Meetup List</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_my_attended_LXu39674.php" rel="noopener" target="_self">My participation</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_create_meetup_LXu39674.php" rel="noopener" target="_self">Create meetup</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_create_cate_LXu39674.php" rel="noopener" target="_self">Create category</a></li>
                    <li class="d-flex align-items-start mb-1"><a href="./Project_my_meetup_LXu39674.php" rel="noopener" target="_self">My meetup</a></li>
                </ul>
            </div>
        </div>
        <footer class="pt-5 my-5 text-muted border-top">
            Created by Leo Xu &middot; &copy; 2022
        </footer>



        <script src="js/bootstrap.bundle.min.js"></script>


        </body>

        </html>
    <?php }


        static function showUser(User $user)
        { ?>
        <section>
            <div>

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
                    <h2>Update user information</h2>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" value=<?= $user->getEmail() ?> required>
                    </div>
                    <div>
                        <label for="password">password</label>
                        <input type="password" name="password" placeholder="password" required>
                    </div>
                    <div>
                        <label for="password">password confirm</label>
                        <input type="password" name="password2" placeholder="password confirm" required>
                    </div>
                    <div>
                        <label for="nickname">Nick Name</label>
                        <input type="text" name="nickname" value=<?= $user->getNickname() ?> required>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <span>
                            <input type="radio" name="gender" value="male" <?= $user->getGender() == 'male' ? 'checked' : null ?>>Male
                            <input type="radio" name="gender" value="femail" <?= $user->getGender() == 'female' ? 'checked' : null ?>> Female
                        </span>
                    </div>
                    <div>
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" value=<?= $user->getPhone() ?> required>
                    </div>
                    <div>
                        <button type="submit" value="Edit">Edit</button>

                    </div>
                </form>
            </div>
            <p><a href=<?= $_SERVER['HTTP_REFERER'] ?>>Cancel edition</a></p>
        </section>

    <?php }


        static function showWelcome()
        { ?>

        <section>
            <h1>Meet new friends over the world.</h1>
            <p class="fs-5 col-md-8">Meet new friends over the world.</p>

            <div class="mb-5 d-flex align-items-center"">
            <img src=" images/gathering.png" alt=" ">
                <img src="images/gathering.png" alt=" ">
                <img src="images/gathering.png" alt=" ">
            </div>
        </section>
    <?php }



        static function showLogin()
        { ?>
        <!-- login section -->
        <section>
            <div>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                    <h2>Please Sign in</h2>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="1234567" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login">
                    </div>
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
            <div>
                <p>Have an account? Please <a href="./Project_login_LXu39674.php">login</a></p>


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
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" required>
                    </div>
                    <div>
                        <label for="password">password</label>
                        <input type="password" name="password" placeholder="password" required>
                    </div>
                    <div>
                        <label for="password">password confirm</label>
                        <input type="password" name="password2" placeholder="password confirm" required>
                    </div>
                    <div>
                        <label for="nickname">Nick Name</label>
                        <input type="text" name="nickname" placeholder="Nick Name" required>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <span>
                            <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="femail"> Female
                        </span>
                    </div>
                    <div>
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" placeholder="123456789" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </section>

    <?php }
        static function showMeetupList($meetups)
        { ?>
        <!-- title,province,city,address,mTime,mDay,userId -->
        <section>
            <div>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">

                    <div>
                        <table>
                            <tr>
                                <th>

                                <td>Title</td>
                                <td>Category</td>
                                <td>Province</td>
                                <td>City</td>
                                <td>Address</td>
                                <td>Meeting Day</td>
                                <td>Meeting Time</td>
                                </th>
                            </tr>

                            <?php



                            foreach ($meetups as $meetup) {
                                echo "<tr>";
                                echo "<td>" . $meetup->getId() . "</td>";
                                echo "<td>" . $meetup->getTitle() . "</td>";
                                echo "<td>" . $meetup->getCategory() . "</td>";
                                echo "<td>" . $meetup->getprovince() . "</td>";
                                echo "<td>" . $meetup->getcity() . "</td>";
                                echo "<td>" . $meetup->getaddress() . "</td>";
                                echo "<td>" . $meetup->getmDay() . "</td>";
                                echo "<td>" . $meetup->getmTime() . "</td>";

                                if (isset($meetup->joined) && $meetup->joined) {
                                    $link = $_SERVER['PHP_SELF'] . "?action=cancel&meetupId=" . $meetup->getId();
                                    echo "<td><a href=\"" . $link . "\">Cancel</a></td>";
                                } else {
                                    $link = $_SERVER['PHP_SELF'] . "?action=join&meetupId=" . $meetup->getId();
                                    echo "<td><a href=\"" . $link . "\">Join</a></td>";
                                }

                                echo "</tr>";
                            }





                            ?>
                        </table>
                    </div>
                    <p>
                        <input type="text" placeholder="Inpunt title" name="searchTitle">
                        <button type="submit" name="search" value="search">search</i></button>
                        <input type="submit" name="newmeetup" value="Create Meetup">
                    </p>
                </form>
            </div>


        </section>

    <?php }

        static function createMeetup($categories)
        { ?>
        <section>
            <div>
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
                    <h2>Create a meetUp</h2>
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="title" required>
                    </div>
                    <div>
                        <label for="category">Category(<a href="./Project_create_cate_LXu39674.php">click to add category</a>)</label>
                        <select name="category" required>
                            <?php
                            foreach ($categories as $cate) {
                                echo "<option value=" . $cate . ">" . $cate . "</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div>
                        <label for="address">address</label>
                        <input type="text" name="address" placeholder="address" required>
                    </div>
                    <div>
                        <label for="city">city</label>
                        <input type="city" name="city" placeholder="city" required>
                    </div>
                    <div>
                        <label for="province">province</label>
                        <input type="text" name="province" placeholder="province" required>
                    </div>

                    <div>
                        <label for="mTime">Meeting Time</label>
                        <input type="time" name="mTime" required>
                    </div>

                    <div>
                        <label for="mDay">Meeting Day</label>
                        <input type="date" name="mDay" value=<?= date("Y-m-d") ?> min=<?= date("Y-m-d") ?> required>
                    </div>


                    <div>
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>

            </div>
        </section>

    <?php }

        static function editMeetup($meetup, $categories)
        { ?>
        <section>
            <div>
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
                    <h2>Create a meetUp</h2>
                    <div>
                        <label for="meetupId">MeetupId</label>
                        <input type="text" name="meetupId" value=<?= $meetup->getId() ?> readonly>
                    </div>
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" value=<?= $meetup->getTitle() ?> required>
                    </div>
                    <div>
                        <label for="category">Category(<a href="./Project_create_cate_LXu39674.php">click to add category</a>)</label>
                        <select name="category" required>
                            <?php
                            foreach ($categories as $cate) {
                                // echo $meetup->getCategory()." ".$cate;
                                $selected = ($meetup->getCategory() == $cate) ? "selected" : "null";
                                echo "<option value=" . $cate . " " . $selected . ">" . $cate . "</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div>
                        <label for="address">address</label>
                        <input type="text" name="address" value=<?= $meetup->getTitle() ?> required>
                    </div>
                    <div>
                        <label for="city">city</label>
                        <input type="city" name="city" value=<?= $meetup->getCity() ?> required>
                    </div>
                    <div>
                        <label for="province">province</label>
                        <input type="text" name="province" value=<?= $meetup->getprovince() ?> required>
                    </div>

                    <div>
                        <label for="mTime">Meeting Time</label>
                        <input type="time" name="mTime" value=<?= $meetup->getmTime() ?> required>
                    </div>

                    <div>
                        <label for="mDay">Meeting Day</label>
                        <input type="date" name="mDay" value=<?= $meetup->getmDay() ?> min=<?= date("Y-m-d") ?> required>
                    </div>


                    <div>
                        <input type="submit" name="submit" value="Edit">
                    </div>
                </form>

            </div>
        </section>

    <?php }

        static function createCategory()
        { ?>
        <section>
            <div>

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
                    <div>
                        <label for="category">Category</label>
                        <input type="text" name="category" placeholder="category" required>
                    </div>
                    <div>
                        <label for="desc">Description</label>
                        <input type="text" name="desc" placeholder="description" required>
                    </div>

                    <div>
                        <input type="submit" name="submit" value="Create">
                    </div>
                </form>

            </div>

            <h2>Load a file</h2>
            <form method="post" enctype="multipart/form-data">
                You can also load a data file (txt). <br>
                <input type="file" name="cateData" value=""><br>
                <input type="hidden" name="upload" value="upload">
                <input type="submit" name="submit" value="Go!">
            </form>

        </section>

    <?php }

        static function showMyMeetupList($meetups)
        { ?>
        <!-- title,province,city,address,mTime,mDay,userId -->
        <section>
            <div>
                <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">

                    <div>
                        <table>
                            <tr>
                                <th>
                                <td>Title</td>
                                <td>Category</td>
                                <td>Province</td>
                                <td>City</td>
                                <td>Address</td>
                                <td>Meeting Day</td>
                                <td>Meeting Time</td>
                                </th>
                            </tr>
                            <?php

                            foreach ($meetups as $meetup) {
                                echo "<tr>";
                                echo "<td>" . $meetup->getId() . "</td>";
                                echo "<td>" . $meetup->getTitle() . "</td>";
                                echo "<td>" . $meetup->getCategory() . "</td>";
                                echo "<td>" . $meetup->getprovince() . "</td>";
                                echo "<td>" . $meetup->getcity() . "</td>";
                                echo "<td>" . $meetup->getaddress() . "</td>";
                                echo "<td>" . $meetup->getmDay() . "</td>";
                                echo "<td>" . $meetup->getmTime() . "</td>";



                                $link = $_SERVER['PHP_SELF'] . "?action=delete&meetupId=" . $meetup->getId();
                                echo "<td><a href=\"" . $link . "\">Delete</a></td>";
                                $link = "./Project_edit_meetup_LXu39674.php?action=edit&meetupId=" . $meetup->getId();
                                echo "<td><a href=\"" . $link . "\">Edit</a></td>";

                                echo "</tr>";
                            }


                            ?>
                        </table>
                    </div>
                    <p><input type="submit" name="newmeetup" value="Create Meetup">

                </form>
            </div>


        </section>

    <?php }



        static function showLogout()
        { ?>
<?php
        }
    }
?>