<?php
error_reporting(E_ALL);
require_once('conf.php');
require_once('class/Loader.php');
spl_autoload_register('Loader::loadClass');

DB::connect();
if (!DB::isConnected()) {
    die("Ups...");
}
$book = new Book();
$book->load(1);
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <title><?php echo $book->getTitle(); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $book->getDescription(); ?>">
        <link href="www/main.css" rel="stylesheet" type="text/css"/>
    </head>    
    <body>
        <main>
            <?php echo $book->getArticle(); ?>
        </main>
    </body>
</html>
<?php DB::close(); ?>