<?php
session_start();
include 'lib/db.php';
include 'lib/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Бложик</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item <?php echo !isset($_GET['category']) ? 'active' : '' ?>" href="/">Главная</a>
            <?php foreach (getCategory() as $category): ?>
                <a class="blog-nav-item <?php echo isset($_GET['category']) && $_GET['category'] == $category['id'] ? 'active' : '' ?>"
                   href="?category=<?php echo $category['id'] ?>">
                    <?php echo $category['name'] ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Бложик</h1>
        <p class="lead blog-description">Учебный блок для недалеких.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php if (!isset($_GET['article'])): ?>
                <?php foreach (getArticles() as $article): ?>
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php echo $article['title'] ?></h2>
                        <p class="blog-post-meta">
                            <?php echo $article['date'] ?>
                            <a href="#"><?php echo $article['name'] ?></a>
                        </p>

                        <?php echo '<p>', mb_substr(strip_tags($article['text']), 0, 250), '&hellip;</p>' ?>
                        <a href="/?article=<?php echo $article['id'] ?>" class="btn btn-default">Читать ещё&hellip;</a>
                    </div><!-- /.blog-post -->
                <?php endforeach; ?>

                <nav>
                    <ul class="pager">
                        <li><a href="#">Туда</a></li>
                        <li><a href="#">Сюда</a></li>
                    </ul>
                </nav>
            <?php else: ?>
                <?php $article = getArticle(); ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $article['title'] ?></h2>
                    <p class="blog-post-meta">
                        <?php echo $article['date'] ?>
                        <a href="#"><?php echo $article['name'] ?></a>
                    </p>

                    <?php echo $article['text'] ?>
                </div><!-- /.blog-post -->
            <?php endif; ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
                <h4>Архив</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
