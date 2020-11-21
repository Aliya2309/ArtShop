<a href="/"> Go Back </a><br><br>

<?php
//echo 'hello';
echo"Product Details:  ".'<br><br>';
    foreach($product as $p){
       echo "NAME:   ".$p['name'].'<br><br>';
        echo "DESCRIPTION:".$p['description'].'<br><br>';
        echo "CATEGORY:  ".$p['category'].'<br><br>';
       echo "PRICE:  ".$p['price'].'<br><br>';
    }
    echo "Contact the seller:".'<br><br>';
    foreach($sellerinfo as $s){
        echo "NAME:   ".$s['name'].'<br><br>';
         echo "E-MAIL:".$s['email'].'<br><br>';
     
     }
        
   ?>



