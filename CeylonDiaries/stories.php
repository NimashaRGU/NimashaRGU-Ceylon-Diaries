
<!DOCTYPE html>
<html>
<head>
<title>Stories</title>
<link rel="stylesheet" href="stories.css">

</head>
<body>
  
<!--Header Start-->
<header>

  <?php
  include 'header.php';
  ?>

</header>
<!--Header End-->

<!--Main Start-->

<main>
<div class="Stories">
    <h2>Uploaded Images and Stories</h2>
          
    </P>
<!--Main Start-->
<main>
    <div class="wrapper">
        <div class="ui pointing menu">
            <div class="ui container">
                                <div class="right menu">
                    <div class="item">
                        <div class="ui transparent icon input">
                            <input type="text" placeholder="Search..."><br><br>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui container">
            <div class="ui">
                <?php
                // SHOWING DATA TO USERS 
                require('validation.php');
                $sql = "SELECT * FROM post";
                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                // print_r($result);
                // echo count($result);
                // echo $result['title'];
                ?>
                <div class="ui six stackable cards">
                    <?php
                    // https://www.php.net/manual/en/pdostatement.fetchall.php
                    // array_shift — Shift an element off the beginning of array
                    while ($row = array_shift($result)) {
                    ?>
                        <div class="ui card">
                            <img src="uploads/<?php echo $row['image_src']; ?>"  alt="" style="width: 300px; height:auto; object-fit:cover; " class="ui t image">
                            
                            <div class="content">
                                <a class="header"><?php echo $row['title']; ?></a>
                                <div class="description">
                                    <?php echo substr($row['description'], 0, 10000); ?>
                                </div>
                            </div>
                          </div>
                    <?php                }                ?>

                </div>
            </div>
        </div>
    </div>
</main>
<!--Main End-->

<!--Footer Start-->
<footer>
  <?php
  include 'footer.php';
  ?>
</footer>
<!--Footer End-->
</body>
</html>