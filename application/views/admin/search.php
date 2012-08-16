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
        <nav>
            <a href="<?php echo $url['index'];?>">index</a>
            <a href="<?php echo $url['insert'];?>">insert</a>
            <a href="<?php echo $url['delete'];?>">delete</a>
            <a href="<?php echo $url['update'];?>">update</a>
            <a href="<?php echo $url['search'];?>">search</a>
            <a href="<?php echo $url['import'];?>">import</a>
            <a href="<?php echo $url['outport'];?>">outport</a>
        </nav>
        <p>
            This is search page.
        </p>
        <form method="post" action="#">
            <input type="number" name="title"/>
            <input type="submit"/>
        </form>
        <div>
            <?php
                if(isset($result)){
            ?>
                        <table>
                        <tr>
                            <td>title</td><td>content</td><td>update</td><td>delete</td>
                        </tr>
            <?php
                    foreach($result as $row){
            ?>
                        <tr>
                        <td><?php echo $row['title'];?></td><td><?php echo $row['content'];?></td>
                        <td><a href="<?php echo $url['update'].'/'.$row['tid']; ?>">update</a></td>
                        <td><a href="<?php echo $url['delete'].'/'.$row['tid']; ?>">delete</a></td>
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