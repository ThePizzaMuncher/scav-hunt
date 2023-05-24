<?php include 'includes/header.php'
	echo  "<h1>ПАЦАНЫ КОЛБАСА ЗДЕСЬ";
?>

<main id="main">

<!-- ======= About Section ======= -->
<section id="about" class="about">
<h3>We are nice guys</h3>

</section> <!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>You can contact / hire us here:</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 x align-items-stretch">
            <div class="info">
              <div class="address">
                <a href="https://goo.gl/maps/fsejr6SAXooQRgAfA" target="_blank"><i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>Leeuwarden, Netherlands</p>
                </a>
              </div>

              <div class="email">
                <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJvpbJbBNczfDNKvSwmZDtDSNDwKtjhfkMbxDWcXTtrtkzcnMqLdHvVXNwRXzsJcFxVfdgB"
                  target="_blank"><i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>Valerii - valerazsd@gmail.com</p>
				  <p>Wieger</p>
				  <p>Jonathan</p>
				  <p>Dimitry</p>
                </a>
              </div>

              <div class="phone">
                <a href="tel:0686460217" target="_blank"><i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+31 6 86460217</p>
                </a>
              </div>
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38239.60404047707!2d5.7834849001935025!3d53.2003600313762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c8fef2953ab5ef%3A0x543dbba8c956a9b6!2z0JvQtdGD0LLQsNGA0LTQtdC9!5e0!3m2!1suk!2snl!4v1678054717891!5m2!1suk!2snl"
                width=100% height=200px style="border:0;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 x align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

<?php include "includes/footer.php"?>