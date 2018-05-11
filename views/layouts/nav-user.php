<?php 
use app\models\User;
?>
<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../.."><strong>ST's</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['ID_USER'])): ?> 

                    <li>
                        <a href="index.php/site/login" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            $users = User::findUsersById($_SESSION['ID_USER']);
                            echo $users->name;
                            ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="../site/logout-user" align="center"><strong>Sign out </strong></a></li>
                            <li><a href="" align="center"><strong>Contact </strong></a></li>
                        </ul>
                    </li>


                    
                <?php else: ?>
                    <li><a href="#">Track Order</a></li>
                    
                    <li>
                        <a href="../../site/login" >Login <b class="caret"></b></a>
                        
                    </li>
                    <li><a href="../site/register">Sign up</a></li>
                <?php endif; ?>





                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Infomation <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>