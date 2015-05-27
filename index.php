<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OPTIMIZE-SEARCH-OOPS-PROJECT</title>
    </head>
    <body>
        <?php
            require_once 'Coupons.php';
            $couponManager = new Coupons(1,"flipcart",5,15);
           // $couponManager->ShowAllCoupons();
            //$couponManager->insertCoupon($couponManager->getCoupon_id(), $couponManager->getCompany_name(), $couponManager->getDisscount(),$couponManager->getValidity());
            //$couponManager->ShowAllCoupons();
           // $couponManager->insertCoupon(2,'Amazon',5,15);
            //$couponManager->serchCoupon('flip');
            //$couponManager->ShowAllCoupons();
             
        ?>
    </body>
</html>
