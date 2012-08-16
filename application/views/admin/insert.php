<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="sivacohan@gmail.com"/>
        <meta name="create time" content="2012-08-08"/>
        <title>insert</title>
    </head>
    <body>
        <h1>insert</h1>
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
            This is insert page.
        </p>
        <p>
            <form method="post" action="#">
                title<input type="text" name="title" /><br/>
                content<input type="text" name="content"/><br/>
                groupId<input type="number" name="groupId"/><br/>
                <input type="submit" />
            </form>
        </p>
    </body>
</html>