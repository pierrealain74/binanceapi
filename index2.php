<!-- Language declaration -->
<html lang="en">
<head>
    <!-- Character encoding -->
    <meta charset="UTF-8">
    <!-- Responsive viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <?php 
        // Set the refresh delay
        $delai_refresh = 2; 
        // Set the meta refresh tag
        echo '<meta http-equiv="refresh" content="' . $delai_refresh . '">';
    ?>
    <!-- Page title -->
    <title>CRYPTO VALUES MISC ON BINANCE</title>
    <!-- Internal CSS styles -->
    <style>
        :root{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: "Comfortaa", sans-serif;
            font-weight: 100;
        }

        .wrapper-btc{

            width: 100vw;
            height: 100vh;
            text-align: center;

        }

        .btc{

            font-size: clamp(5rem, 12rem, 25rem);

        }

        .wrapper-crypto{

            
        }
        .othercrypto{

            font-size: clamp(3rem, 4rem, 6rem);

        }
    </style>
</head>
<body>
<!-- JavaScript code -->
<script>
    // Execute when the window is loaded
    window.onload = function() {
        // Call resizeFont function
        resizeFont()
        // Add event listener for window resize
        window.addEventListener('resize', resizeFont)
    }

    // Function to resize font based on window height
    function resizeFont() {
        // Calculate font size based on window height
        let fontSize = window.innerHeight / 1.7
        // Set font size for elements with .btc class
        //document.querySelector('.btc').style.fontSize = fontSize + 'px';
    }
</script>
<?php 
    // API URL
    $url = "https://api.binance.com/api/v3/ticker/price";
    // Get data from API
    $data = file_get_contents($url);
    // Decode JSON data
    $json = json_decode($data);

    // Loop through JSON data
    foreach($json as $item){

        // Check if symbol is BTCUSDT
        if($item->symbol == 'BTCUSDT'){
            // Assign BTC price to variable
            $pricebtc = $item->price;
        }
    
        if($item->symbol == 'ETHUSDT'){

            $priceeth = $item->price;
        }

        if($item->symbol == 'DOGEUSDT'){

            $pricedoge = $item->price;
        }
 
        if($item->symbol == 'WLDUSDT'){

            $pricewld = $item->price;
        }

        if($item->symbol == 'XRPUSDT'){
  
            $pricexrp = $item->price;
        }
    }
    
    // Output BTC and other cryptocurrencies prices
    echo '
    <div class="wrapper-btc">
        <div class="btc">' . round((float) $pricebtc) . '$</div>';
        echo '
            <div class="wrapper-crypto">
                <div class="othercrypto">ETH ' . number_format($priceeth, 2, '.', '') . '$</div>
                <div class="othercrypto">DOGE ' . number_format($pricedoge, 2, '.', '') . '$</div>
                <div class="othercrypto">WLD ' . number_format($pricewld, 2, '.', '') . '$</div>
                <div class="othercrypto">XRP ' . number_format($pricexrp, 2, '.', '') . '$</div>
            </div>
    </div>';

    /* Display all Binance crypto prices via JSON data */
    /* echo '<pre>';
    print_r($json);
    echo '</pre>'; */
?>
</body>
</html>
