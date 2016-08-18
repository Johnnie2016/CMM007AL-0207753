<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diary App add</title>
    <link rel="stylesheet" type="text/css" href="resources/style.css">
    <link rel="stylesheet" type="text/css" href="resources/unsemantic-grid-responsive-tablet.css">
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>
    <meta name="viewpoint" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
</head>
<body>

<!-- HEADER STARTS HERE -->
<header class="grid-100">
    <img id="Logo" src="resources/diary.png" alt="Logo" class="grid-20">
    <div class="grid-80" id="Top row text">
        <h1>myDiary</h1>
        <h2>Keeping track of all my thoughts</h2>
    </div>
</header>
<!-- HEADER FINISHES HERE -->

<!-- MAIN STARTS HERE -->
<main class="grid-container">
    <nav class="grid-25" id="Navigation">
        <ul>
            <li><a href="diary.php">All Diary Items</a></li><br>
            <li><a href="diary.php?category=work">Work Items</a></li><br>
            <li><a href="diary.php?category=university">University Items</a></li><br>
            <li><a href="diary.php?category=family">Family Items</a></li><br>
            <li><a href="add.php">Insert a Diary Item</a></li><br>
        </ul>
    </nav>

    <section class="grid-75">
        <?php

                 if ($_SERVER['REQUEST_METHOD'] === 'GET')
                             {
                                 echo " 
                 <div class=\"grid-100\" > 
                     <form class=\"form-input\" action='{$_SERVER['PHP_SELF']}' method='post' > 
  
                         <div class=\"field\" > 
                             <label>Title:</label>
                             <input type = \"text\" name = \"title\" id = \"title\" accesskey=\"1\" placeholder = \"Entry Title\" autofocus required >
                         </div> 
                         <div class=\"field\" > 
                             <label>Entry Summary:</label>
                             <textarea rows = \"5\" cols = \"28\" name = \"summary\" id = \"summary\" accesskey=\"2\" placeholder = \"Entry Summary\" required ></textarea>
                         </div> 
                         <div class=\"field\"> 
                             <label>Category:</label>
                             <select name = \"category\" id = \"category\" accesskey=\"3\" required> 
                                 <option value = \"\" disabled  selected >Select category..</option> 
                                 <option value = \"work\" selected >Work</option>
                                 <option value = \"university\" >University</option>
                                 <option value = \"family\" >Family</option>
                             </select> 
                         </div> 
                         <div class=\"field\" > 
                             <label>Submitted By:</label> 
                             <input type = \"text\" name = \"submitter\" id = \"submitter\" accesskey=\"4\" placeholder = \"Submitted By (Optional)\" required > 
                         </div> 
                         <div id = \"right\"> 
                             <input type = \"submit\" value = \"Submit\"> 
                         </div> 
                     </form> 
                 </div>";
                 }
                 elseif ($_SERVER['REQUEST_METHOD'] === 'POST')
                 {
                                 include_once('dbaseconn.php');

                     $title = $_POST['title'];
                     $summary = $_POST['summary'];
                     $category = $_POST['category'];
                     $submitter = $_POST['submitter'];

                     if ($submitter == NULL) {
                                        $submitter = "Anonymous";
                     }

                     $sql = "INSERT INTO bugView VALUES (NULL,'$title','$summary','$category','$submitter')";
                     mysqli_query($db,$sql);
                     mysqli_close($db);
                     header('Location: add.php?category=all');
                 }
                 else {
                                 header('Location: index.php');
                 }

                 ?>
    </section>

</main>
<!-- MAIN FINISHES HERE -->

<!-- FOOTER STARTS HERE -->
<footer>
    <p>Designed by John Morrison, 2016</p>
</footer>
<!-- FOOTER FINISHES HERE -->

</body>
</html>