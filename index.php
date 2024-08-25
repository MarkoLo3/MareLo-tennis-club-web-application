<?php
 session_start();
?>

  <?php
    @include 'navbar.php';
  ?>
  
  
  
  
  
  <div class="container center">
  
    <main>
      
      <div class="container-fluid">
        <div class="row" id="navbarPadding">
          <!-- prvi -->
          <div id="divCitat">
            <div class="jumbotron1">
              <div>
                <figure>
                  <blockquote class="blockquote" id="citat">
                    <p></p>
                  </blockquote>
                  <figcaption class="blockquote-footer" id="autor">
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      
      <hr>


      <section>
        <div class="card-group">
          <div class="card">
              <img src="css/images/tennisLessions.jpg" class="card-img-top" loading="lazy" alt="Tennis Lessons">
              <div class="card-body">
                  <h5 class="card-title"><a href="training.php" class="porukaLink">Tennis Lessons</a></h5>
                  <p class="threeCardsText" class="card-text">Improve your game with our professional tennis lessons. Our experienced coaches offer personalized training for all skill levels.</p>
              </div>
          </div>
          <div class="card">
              <img src="css/images/tennisCourts.jpg" class="card-img-top" loading="lazy" alt="Court Reservation">
              <div class="card-body">
                  <h5 class="card-title"><a href="courtreservation.php" class="porukaLink">Court Reservation</a></h5>
                  <p class="threeCardsText" class="card-text">Reserve a tennis court easily with our online booking system. Choose from a variety of court types and times that suit your schedule.</p>
              </div>
          </div>
          <div class="card">
              <img src="css/images/tennisTournament.jpg" class="card-img-top" loading="lazy" alt="Tennis Tournaments">
              <div class="card-body">
                  <h5 class="card-title"><a href="tournaments.php" class="porukaLink">Tennis Tournaments</a></h5>
                  <p class="threeCardsText" class="card-text">Participate in our exciting tennis tournaments. Compete with players of different levels and win amazing prizes.</p>
              </div>
          </div>
        </div>
      </section>

      
      <hr>
      
    
      

     


      <!--2 cards-->


      <div class="container card-container">
        <div class="row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card card-custom">
              <img loading="lazy" src="css/images/tennisbag.webp" class="card-img-top card-img-custom" alt="...">
              <div class="card-body card-body-custom">
                <h5 class="card-title card-title-custom">Tennis bags</h5>
                <p class="card-text card-text-custom">Visit our website to explore and purchase a wide range of high-quality tennis bags.</p>
                <a href="https://global.tennis-point.com/tennis-bags/" target="_blanc" rel="noopener noreferrer" class="btn btn-primary btn-custom">Visit the web site</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-custom">
              <img loading="lazy" src="css/images/tennisracketresize.jpg" class="card-img-top card-img-custom" alt="...">
              <div class="card-body card-body-custom">
                <h5 class="card-title card-title-custom">Tennis rackets and other eq</h5>
                <p class="card-text card-text-custom">Discover top-notch tennis rackets and equipment available for purchase on our site.</p>
                <a href="https://global.tennis-point.com/" target="_blanc" rel="noopener noreferrer" class="btn btn-primary btn-custom">Visit web site</a>
              </div>
            </div>
          </div>
        </div>
    </div>

      <hr>
      <!--2 cards-->


      <!--special card-->


      <div class="container-fluid pt-5 pb-5">
        <div class="card text-center">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary btn-dark">Go somewhere</a>
          </div>
          <div class="card-footer text-body-secondary">
            2 days ago
          </div>
        </div>
      </div>


      <!--special card-->
      
      
      
      
      
      
      
    </main>
  </div>
  
  
 

  <?php
      @include 'footer.php';
    ?>
