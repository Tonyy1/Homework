<html>
    <head>
        <meta charset="utf-8">
        <title>IP Calculator by Tonyy V2 - Remastered</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="all" href="ipsmh.css">
    </head>

    <header>
    
    </header>
    <body>

        <!-- Výpočty -->
        <?php

            if (isset($_POST["spocitej"])) {
                $ip = $_POST["ip"];
                $prefix = $_POST["prefix"];

                $prefix2 = $prefix;
                $ip2 = $ip;
                $ip = ip2long ($ip);
                $ip = decbin ($ip);
                $ip3 = $ip;
                $ip3 = substr($ip3, 0, $prefix);
                $prefix2 = 26;
                $prefix2 = -(32 - $prefix);
                
                if ($prefix == 32) {
                $pomocna1 = 35;
                $pomocna2 = 35;
                }
                elseif ($prefix >= 24) {
                $pomocna1 = -(32 - $prefix);
                $pomocna2 = $prefix + 3;
                } 
                elseif ($prefix >= 16) {
                $pomocna1 = -(32 - $prefix + 1);
                $pomocna2 = $prefix + 2;
                }
                elseif ($prefix >= 8) {
                $pomocna1 = -(32 - $prefix + 2);
                $pomocna2 = $prefix + 1;
                }
                elseif ($prefix <= 8) {
                $pomocna1 = -(32 - $prefix + 3);
                $pomocna2 = $prefix + 0;
                }

                $maska = str_pad ($ip3, 32, '0', STR_PAD_RIGHT);
                $maska = substr($maska, $prefix2);
                $maska = str_pad ($maska, 32, '1', STR_PAD_LEFT);
                $maska = bindec ($maska);
                
                $broadcast = str_pad ($ip3, 32, '1', STR_PAD_RIGHT);
                $broadcast = bindec ($broadcast);

                $network = str_pad ($ip3, 32, '0', STR_PAD_RIGHT);
                $network = bindec ($network);

                $fHost = str_pad(str_pad ($ip3, 31, '0', STR_PAD_RIGHT), 32, '1', STR_PAD_RIGHT);
                $fHost = bindec ($fHost);

                $lHost = str_pad(str_pad ($ip3, 31, '1', STR_PAD_RIGHT), 32, '0', STR_PAD_RIGHT);
                $lHost = bindec ($lHost);

                $hCount = str_pad(str_pad ($ip3, 31, '1', STR_PAD_RIGHT), 32, '0', STR_PAD_RIGHT);
                $hCount = substr($hCount, $prefix2 + 32);
                
        }

        ?>
        <!-- Inputy + tlačítko -->
       <div class = box>
            <form action="/ipsmh.php" method="post">
                <h1>IP Calculator</h1>
                    <ul>
                        <li><input type="text" name = "ip" placeholder="Adresa Sítě" required></li>
                        <li><input type="number" name = "prefix" placeholder="Prefix" min = "0" max = "32" required></li>
                        <li><input type="submit" name = "spocitej" value="Vypočítat"></li>
            </ul>
            <!-- Výpis po zadání hodnot + validace správného formátu IP adresy -->
            <?php
            if (isset($_POST["spocitej"])) {
                if (filter_var($ip2, FILTER_VALIDATE_IP)) {

                echo '<span class = "highlight">' . "Zadaná adresa:" . '</span>' . '</br>';
                echo $ip2 . '/'. $prefix;
                echo '</br>';

                echo '<span class = "highlight">' . "Část pro síť a pro hosty:" . '</span>' . '</br>';
                echo '<p class = "net_side">' . substr(implode(".", str_split($ip, 8)),0, $pomocna1) . '</p>';
                echo '<p class = "host_side">' . substr(implode(".", str_split($ip, 8)), $pomocna2) . '</p>';
                echo '</br>';

                echo '<span class = "highlight">' . "Maska sítě:" . '</span>' . '</br>';
                echo(long2ip($maska));
                echo '</br>';

                echo '<span class = "highlight">' . "Broadcast adresa:" . '</span>' . '</br>';
                echo(long2ip($broadcast));
                echo '</br>';

                echo '<span class = "highlight">' . "Network adresa:" . '</span>' . '</br>';
                echo(long2ip($network));
                echo '</br>';

                echo '<span class = "highlight">' . "First host:" . '</span>' . '</br>';
                echo(long2ip($fHost));
                echo '</br>';

                echo '<span class = "highlight">' . "Last host:" . '</span>' . '</br>';
                echo(long2ip($lHost));
                echo '</br>';

                echo '<span class = "highlight">' . "Host count:" . '</span>' . '</br>';
                echo $hCount = bindec ($hCount);
                echo '</br>';

            } else {
            echo("Špatně zadán formát IP adresy") . '</br>' . ("Příklad správného formátu: 192.168.25.4") ;
            }

            }
        ?> 
            </form>
        </div>
    </body>
</html>