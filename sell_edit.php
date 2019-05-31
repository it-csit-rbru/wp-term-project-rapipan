<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-projact-title-edit</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #FEF5E7;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>แก้ไขข้อมูลยอดขาย</h4>    
        <?php
                $se_id = $_REQUEST['se_id'];
                if(isset($_GET['submit'])){
                $s_le_id   = $_GET['s_le_id'];
                $s_pd_id   = $_GET['s_pd_id'];
                $se_price   = $_GET['se_price'];
                $sql = "update sell set ";
                $sql .= "s_le_id='$s_le_id',s_pd_id='$s_pd_id',se_price='$se_price'";
                $sql .="where se_id='$se_id'";
                include 'connectdb.php';
                mysqli_query($conn,$sql);
                mysqli_close($conn);
                echo "แก้ไขยอดขายจำนวน $se_price เรียบร้อยแล้ว<br>";
                echo '<a href="sell_list.php">แสดงรายการยอดขายทั้งหมด</a>';
            }else{
        ?>
        <?php
                include 'connectdb.php';
                $sql2 = "select * from sell where se_id='$se_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                $fse_price = $row2['se_price'];
                mysqli_free_result($result2);
                mysqli_close($conn);
        ?>
            <form class="form-horizontal" role="form" name="sell_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="hidden" name="se_id" id="se_id" value="<?php echo "$se_id";?>">
                <div class="form-group">
                <label for="s_le_id" class="col-md-2 col-lg-2 control-label">ชื่อผู้ขาย</label>
                    <div class="col-md-10 col-lg-10">
                        <select name="s_le_id" id="s_le_id" class="form-control" value="<?php echo $fs_le_id;?>">
                        <?php
                            include 'connectdb.php';
                            $fs_le_id  = $row2['s_le_id '];
                            $sql =  "SELECT * FROM lecturer1 order by le_id";
                            $result = mysqli_query($conn,$sql);
                            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<option value=';
                            echo '"' . $row['le_id'].'"';
                            if($row['le_id']==$fs_le_id){
                            echo ' selected="selected" ';
                            }
                                echo ">";
                                echo $row['le_name'] . $row['le_ln'];
                                echo '</option>';
                                }
                                    mysqli_free_result($result2);
                                    mysqli_close($conn);
                        ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="se_id" class="col-md-2 col-lg-2 control-label">ชื่อสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="s_pd_id" id="s_pd_id" class="form-control" value="<?php echo $fs_pd_id;?>">
                                <?php
                                    include 'connectdb.php';
                                    $fs_pd_id = $_row2['s_pd_id'];
                                    $sql =  'SELECT * FROM product order by pd_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['pd_id'].'"';
                                        if($row['pd_id']==$fs_pd_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['pd_name'] . $row['pd_pa'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result2);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="se_price" class="col-md-2 col-lg-2 control-label">ราคา</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="se_price" id="se_price" class="form-control" value="<?php echo $fse_price;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
            <?php include 'name.php';?>
            </div>
        </div>    
    </body>
</html>