<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PHP Web Scraper</title>
</head>
<body>
  
    <!-- Inicializace Dom Crawler knihovny a Guzzle -->
    <?php
        require 'vendor/autoload.php';
        use Symfony\Component\DomCrawler\Crawler;
        if (isset($_POST["submit"]))
            {
	            $url = $_POST["url"];
	            $url = strpos($url, 'http') !== 0 ? "http://$url" : $url;
	            $client = new \GuzzleHttp\Client();
	            $response = $client->request('GET', $url);
	            $html = ' ' . $response->getBody();
	            $crawler = new Crawler($html);
	            $number = 1;
            }
    ?>
    <!-- Input a Submit -->
    <main>
    <div class="wrap">
        <form action="seo-web-scraper.php" method="post">
                <h3>PHP SEO Analyzer/Web Scraper</h3>
                <input type="text" name = "url" placeholder="Zadejte URL">
                <input type="submit" name = "submit" value="Odeslat">
        </form>
    </div>
    <!-- Výpis -->
    <div class="output">
        <?php
            if (isset($_POST["submit"]))
                {
                '<!-- URL Validace -->';
	            if (filter_var($url, FILTER_VALIDATE_URL))
	                {
                        '<!-- Výpis nadpisů -->';
		                echo '<h1>' . "HTML Značky" . '</h1>' . '<br>' . '<h3>' . "--------Nadpisy nacházející se na stránce--------" . '</h3>';
		                for ($x = 0;$x <= 5;$x++)
		                    {
			                    $znak = "h" . $number;
			                    $nodeValues = $crawler->filter($znak)->each(function (Crawler $node, $i)
			                {
				                global $znak;
				                echo '<span>' . $znak . ": " . $node->text() . '</span>' . '<br>';
			                });
			                    $number    = $number + 1;
		                    }
		        $link_num  = 0;
                $link_num1 = 0;
                '<!-- Výpis odkazů -->';
		        echo '<h3>' . "--------Odkazy nacházející se na stránce (názvy)--------" . '</h3>';
		        $nodeValues = $crawler->filter('a')->each(function (Crawler $node, $i)
		            {
			            global $link_num;
			            global $link_num1;
			            if ($node->text() == '')
			                {
				                $link_num1 = $link_num1 + 1;
				                echo "";
			                }
			                else
			                {
				                $link_num = $link_num + 1;
				                echo '<span>' . "Odkaz " . $link_num . ": " . $node->text() . '</span>' . '<br>';
			                }
		                    });
                        $link_num1 = $link_num1 + $link_num;
                        '<!-- Výpis statistiky -->';
		                echo '<h3>' . "--------Statistiky--------" . '</h3>';
		                echo "Celkem odkazů na stránce: " . $link_num1 . '<br>';
		                echo "Celkem validních odkazů na stránce: " . $link_num;
	                }
	                else
	                {
		                echo ("Zadaná URL adresa není validní.");
	                }
                }
            ?>
        </div>
    </main>
</body>
</html>
