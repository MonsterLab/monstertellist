<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="sivacohan@gmail.com"/>
        <meta name="create time" content="2012-08-08"/>
        <title>search</title>
    </head>
    <body>
        <h1>search</h1>
        <p>
            This is search page.
        </p>
        <form method="get" action="#">
            title:<input type="text" name="title" /><br/>
            content:<input type="text" name="content" /><br/>
            <input type="submit"/>
        </form>
        <div id="result">
            <?php
                if(isset($result)){
            ?>
                        <table>
                        <tr>
                            <td>title</td><td>content</td><td>group</td>
                        </tr>
            <?php
                    foreach($result as $row){
            ?>
                        <tr>
                            <td><?php echo $row['title'];?></td><td><?php echo $row['content'];?></td><td><?php echo $row['groupid'];?></td>
                        </tr>
            <?php
                    }
            ?>
                        </table>
            <?php
                }
            ?>
        </div>
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    </body>
</html>