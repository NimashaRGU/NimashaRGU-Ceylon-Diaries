
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Story Writing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    
        <style>
        * {
            padding: 0;
            margin: 0;

        }

        .wrapper {
            width: 100%;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .logoutbutton{
            position: absolute;
            max-width: 400px;
            padding: 10px;
            font-size:25px;
            box-sizing: border-box;
            background-color: rgb(196, 186, 186);       
        }
    </style>
</head>

<body>
<header>
<?php
  include 'header.php';
  
  ?>
  <div class = "logoutbutton">
      <a href="logout.php" class="btn btn-danger ml-3">logout</a>
      
    </div>
  
    
  </header>
  
<!--Main Start-->
  <main>
    <div class="wrapper">
        
        <div class="ui container">
            <form class="ui mini form" action="add-post.php" method="POST" enctype="multipart/form-data">
                <h1 class="ui header olive" ><strong>File upload</strong></h1>
                <div class="ui field">
                    <div class="ui mini input">
                        <input type="text" name="title" placeholder="Title" />
                    </div>
                </div>
                <div class="ui field">
                    <div class="ui mini input">
                        <textarea name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
                    </div>
                </div>

                <div class="ui field">
                    <div class="ui mini input">
                        <input type="file" name="images" id="images" required="required" multiple="multiple" />
                    </div>
                </div>

                <div class="ui field">
                    <button class="ui blue mini button " type="submit" name="submit">Upload Posts</button>
                </div>

            </form>


            <br>
            <br>

        </div>
        <div class="ui container">
            <div class="ui">
                <h1 class="ui header olive">
                    Uploaded images and Stories
                </h1>
                <br>
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
                            <img src="uploads/<?php echo $row['image_src']; ?>"  alt="" style="width: 200px; height:100px; object-fit:cover; " class="ui t image">
                            
                            <div class="content">
                                <a class="header"><?php echo $row['title']; ?></a>
                                <div class="description">
                                    <?php echo substr($row['description'], 0, 50); ?>
                                </div>
                            </div>
                            <div class="extra content">
                                <a href="delete-post.php?id=<?php echo $row['id']; ?>" class="ui button red">Delete</a>
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