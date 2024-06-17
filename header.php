<nav class="fh5co-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="fh5co-logo"><a href="index.php">MThong<span>.</span></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <?php
                            $file = explode("/", $_SERVER["PHP_SELF"]);
                            switch($file[5]){
                                case "index.php":
                                    echo "
                                        <li class=\"active\"><a href=\"index.php\">Home</a></li>
                                        <li><a href=\"about.php\">About</a></li>
                                    ";
                                    break;
                                case "about.php":
                                    echo "
                                        <li><a href=\"index.php\">Home</a></li>
                                        <li class=\"active\"><a href=\"about.php\">About</a></li>
                                    ";
                                    break;
                            }
                        ?>
                        <li class="btn-cta">
                            <?php 
                                if(isset($_SESSION["username"])){
                                    $logout_page = "../LoginSystem/logout.php";
                                    echo "<a href=\"{$logout_page}\"><span>Log out</span></a>";
                                }else{
                                    $login_page = "../LoginSystem/signin.php";
                                    echo "<a href=\"{$login_page}\"><span>Log in</span></a>";
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</nav>