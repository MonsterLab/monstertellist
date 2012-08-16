<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="sivacohan@gmail.com"/>
        <meta name="create time" content="2012-08-08"/>
        <title>update</title>
    </head>
    <body>
        <h1>update</h1>
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
            This is update page.
        </p>
        <form method="post" action="<?php echo $value[0]['tid'];?>">
            <input type="hidden" name="tid" value="<?php echo $value[0]['tid'];?>" />
            title<input type="text" name="title" value="<?php echo $value[0]['title'];?>" /><br/>
            content<input type="text" name="content" value="<?php echo $value[0]['content'];?>" /><br/>
            groupID<input type="text" name="groupId" value="<?php echo $value[0]['groupid'];?>" /><br/>
            <input type="submit"/>
        </form>
    </body>
</html>