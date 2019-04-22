<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">RPM Motor Parts</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucwords($_SESSION['name'])?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" class="dropdown" style="width: 190px">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#changeUsernameModal"><i class="fa fa-fw fa-gear"></i> Change Username</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                        <?php if($_SESSION['branch_id'] == '3'):?>
                        <li><a href="create-account.php"><i class="fa fa-shopping-cart"></i> Create Account</a></li>
                        <?php endif;?>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php if($_SESSION['branch_id'] != '3'):?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'class="active"'?>>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'product.php') echo 'class="active"'?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#productMenu"><i class="fa fa-fw fa-bar-chart-o"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="productMenu" class="collapse">
                            <li>
                                <a href="product.php?<?php if(isset($_GET['branch_id'])) echo '&branch_id=' . $_GET['branch_id'];?>"> All Products</a>
                            </li>
                            <li>
                                <a href="product.php?archived=true<?php if(isset($_GET['branch_id'])) echo '&branch_id=' . $_GET['branch_id'];?>"> Archived products</a>
                            </li>
                            <li>
                                <a href="product.php?replenish=true<?php if(isset($_GET['branch_id'])) echo '&branch_id=' . $_GET['branch_id'];?>"> Products to be replenished</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#salesMenu"><i class="fa fa-fw fa-shopping-cart"></i> Sales <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="salesMenu" class="collapse">
                            <li <?php if(basename($_SERVER['PHP_SELF']) == 'sales.php') echo 'class="active"'?>>
                                <a href="sales.php"><i class="fa fa-fw fa-plus"></i> Add Sales</a>
                            </li>
                            <li <?php if(basename($_SERVER['PHP_SELF']) == 'sales.php') echo 'class="active"'?>>
                                <a href="view_sales.php"><i class="fa fa-fw fa-list"></i> View Sales</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php else:?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'class="active"'?>>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'product.php') echo 'class="active"'?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#productMenu"><i class="fa fa-fw fa-bar-chart-o"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="productMenu" class="collapse">
                            <li>
                                <a href="product.php?branch_id=1"> Branch 1</a>
                            </li>
                            <li>
                                <a href="product.php?branch_id=2"> Branch 2</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#salesMenu"><i class="fa fa-fw fa-shopping-cart"></i> Sales <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="salesMenu" class="collapse">
                            <li <?php if(basename($_SERVER['PHP_SELF']) == 'sales.php') echo 'class="active"'?>>
                                <a href="view_sales.php?branch_id=1">Branch 1</a>
                            </li>
                            <li <?php if(basename($_SERVER['PHP_SELF']) == 'sales.php') echo 'class="active"'?>>
                                <a href="view_sales.php?branch_id=2">Branch 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php endif;?>
            <!-- /.navbar-collapse -->
        </nav>