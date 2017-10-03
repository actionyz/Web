<?php
// echo 21
require_once "common.php";
session_start();
if(!is_login()) {
    header("Location: login.php");
    exit;
}

$title = isset($_GET['title'])?$_GET['title']:"";
$is_ok = $title && ($content = read_cache($title));
$list = get_list();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>61D财务中心</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-item.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">61D财务报表申请</a>
            </div>
        </div>
    </nav>
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">Your Tickets</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active"><?=get_username()?></a>
                </div>
            </div>

            <div class="col-md-9">

                <?php if($is_ok): ?>
                <div class="thumbnail">
                    <img class="img-responsive" src="img/chat.jpg" alt="">
                    <div class="caption-full">
                        <h4><a href="#"><?=htmlspecialchars($title, ENT_COMPAT | ENT_HTML401 | ENT_QUOTES);?></a>
                        </h4>
                        <p><?=nl2br(htmlspecialchars($content, ENT_COMPAT | ENT_HTML401 | ENT_QUOTES))?></p>
                    </div>
                </div>
                <?php endif; ?>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">提交财务申请</a>
                    </div>

                    <hr>
                    <?php foreach($list as $title => $content): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><a href="?title=<?=_(urlencode($title))?>"><?=_($title)?></a></h4>
                            <p><?=_($content)?></p>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>
    <div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 61D team</p>
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <form method="post" action="deal.php" id="sf" data-toggle="validator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Title:</label>
                    <input type="text" data-validation="custom" data-validation-regexp="^[ _A-Za-z0-9]+$" name="title" class="form-control" id="recipient-name" placeholder="Alphabet && Number">
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Content:</label>
                    <input class="form-control" type="text" name="content" id="message-text" data-validation="custom" data-validation-regexp="^[ _a-zA-Z0-9]+$" placeholder="Alphabet && Number">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.form-validator.min.js"></script>

    <script>
    window.onload = function() {
        $.validate({
            lang: 'en'
        });
    }
    </script>

</body>

</html>
