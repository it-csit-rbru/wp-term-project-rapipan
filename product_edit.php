<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-projacttitle-edit</title>
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
                <h4>แก้ไขข้อมูลสินค้า</h4>    
                <?php
                    $pd_id = $_REQUEST['pd_id'];
                    if(isset($_GET['submit'])){
                    $pd_name = $_GET['pd_name'];
                    $pd_name = $_GET['pd_pa'];
                    $pd_name = $_GET['pd_color'];
                    $pd_name = $_GET['pd_sp'];
                    $pd_name = $_GET['pd_py'];
                    $pd_name = $_GET['pd_le_id'];
                    $sql = "update product set ";
                    $sql .= "pd_name='$pd_name',pd_pa='$pd_pa',pd_color='$pd_color',pd_sp='$pd_sp',pd_py='$pd_py',pd_le_id='$pd_le_id'";
                    $sql .="where se_id='$pd_id'";
                    include 'connectdb.php';
                    mysqli_query($conn,$sql);
                    mysqli_close($conn);
                    echo "แก้ไขข้อมูลสินค้า $pd_name $pd_pa เรียบร้อยแล้ว<br>";
                    echo '<a href="product_list.php">แสดงสาขาวิชาทั้งหมด</a>';
                    }else{
                ?>
                <?php
                    include 'connectdb.php';
                    $sql2 = "select * from product where pd_id='$pd_id'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                    $fpd_name = $row2['pd_name'];
                    $fpd_pa = $row2['pd_pa'];
                    $fpd_color = $row2['pd_color'];
                    $fpd_sp = $row2['pd_sp'];
                    $fpd_py = $row2['pd_py'];
                    mysqli_free_result($result2);
                    mysqli_close($conn);
                ?>
                    <form class="form-horizontal" role="form" name="product_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <input type="hidden" name="pd_id" id="pd_id" value="<?php echo "$pd_id";?>">
                        <div class="form-group">
                            <label for="pd_name" class="col-md-2 col-lg-2 control-label">ชื่อสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pd_name" id="pd_name" class="form-control" value="<?php echo $fpd_name;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pd_pa" class="col-md-2 col-lg-2 control-label">รุ่น</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pd_pa" id="pd_pa" class="form-control" value="<?php echo $fpd_pa;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pd_color" class="col-md-2 col-lg-2 control-label">สี</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pd_color" id="pd_color" class="form-control" value="<?php echo $fpd_color;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pd_sp" class="col-md-2 col-lg-2 control-label">ความจุ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pd_sp" id="pd_sp" class="form-control" value="<?php echo $fpd_sp;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pd_py" class="col-md-2 col-lg-2 control-label">วันที่ขาย</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="date" name="pd_py" id="pd_py" class="form-control" value="<?php echo $fpd_py;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="pd_le_id" class="col-md-2 col-lg-2 control-label">ชื่อพนักงานขาย</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="pd_le_id" id="pd_le_id" class="form-control" value="<?php echo $fpd_le_id;?>">
                            <?php
                                include 'connectdb.php';
                                $fpd_le_id = $_row2['pd_le_id'];
                                $sql =  'SELECT * FROM lecturer order by le_id';
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                    echo '<option value=';
                                    echo '"' . $row['le_id'].'"';
                                    if($row['le_id']==$fpd_le_id){
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
