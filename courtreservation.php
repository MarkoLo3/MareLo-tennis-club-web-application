<?php
    session_start();
    if(!isset($_SESSION['userID']))
    {
        header('Location: login.php');
        exit();
    }
?>


<?php
    @include 'navbar.php';
?>

<div class="container center">
    <div class="contaner text-center">
        
        <br>
        <hr>
        <h2 class="h2Reservation"><strong>Court Reservation</strong></h2>
        <hr>
        
    </div>
    
</div>
<div class="contaner center">

    <section>
        <div class="card-group">
            <div class="card">
                <img src="css/images/courts11.jpg" class="card-img-top" loading="lazy" alt="Clay Court">
                <div class="card-body">
                    <h5 class="card-title"><a href="courtreservationform.php" class="threeCardsReservationTitle">Clay Courts</a></h5>
                    <p class="threeCardsReservationDesc" class="card-text">Experience the classic charm of clay courts, ideal for those who appreciate slower, strategic play. Book your time on our meticulously maintained clay courts and enjoy a match with exceptional bounce and a smooth, earthy feel underfoot.<hr><strong>Court numbers 1-3</strong></p>
                </div>
            </div>
            <div class="card">
                <img src="css/images/courts22.jpg" class="card-img-top" loading="lazy" alt="Outdoor Hard Court">
                <div class="card-body">
                    <h5 class="card-title"><a href="courtreservationform.php" class="threeCardsReservationTitle">Outdoor Hard Courts</a></h5>
                    <p class="threeCardsReservationDesc" class="card-text">Play on our state-of-the-art outdoor hard courts, designed for durability and consistent performance. These courts provide a fast-paced game perfect for those looking to enhance their skills and enjoy competitive matches in the open air.<hr><strong>Court numbers 4-6</strong></p>
                </div>
            </div>
            <div class="card" id="card3">
                <img src="css/images/courts33.jpg" class="card-img-top" loading="lazy" alt="Another Hard Court">
                <div class="card-body">
                    <h5 class="card-title"><a href="courtreservationform.php" class="threeCardsReservationTitle">Premium Hard Courts</a></h5>
                    <p class="threeCardsReservationDesc" class="card-text">Discover our premium outdoor hard courts, offering top-notch surface quality and excellent grip. Ideal for both casual play and intense training sessions, these courts ensure a high-energy game with consistent bounce and minimal maintenance.<hr><strong>Court numbers 7-9</strong></p>
                </div>
            </div>
        </div>
    </section>

</div>







<?php
    @include 'footer.php';
?>
