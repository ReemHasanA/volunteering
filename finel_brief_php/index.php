<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="abd.css">

  <header>


    <!-- ///////navbar//////// -->
    <div class="company-logo">Volunteer</div>
    <nav class="navbar">
      <ul class="nav-items">
        <li class="nav-item"><a href="index.php" class="nav-link">HOME</a></li>
        <li class="nav-item"><a href="login_form.php" class="nav-link">Sign In</a></li>
        <li class="nav-item"><a href="register_form.php" class="nav-link">Sign Up</a></li>
      </ul>
    </nav>
        <!-- ///////navbar//////// -->

    <div class="menu-toggle">
      <i class="bx bx-menu"></i>
      <i class="bx bx-x"></i>
    </div>
  </header>
  <main>
    <!-- HOME SECTION -->
    <header class="header__main">
        <div class="slider">
          <svg class="slider__mask" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" width="0" height="0">
            <defs>
              <!-- Slide 1 -->
              <pattern id="bg1" patternUnits="userSpaceOnUse" width="1920" height="1080" viewBox="0 0 1920 1080">
                <image href="images/33-339198_volunteering-clipart-transparent-volunteer-clip-art-transparent.png" width="100%" height="100%"/>
              </pattern>
              <pattern id="pattern1l" patternUnits="userSpaceOnUse" width="562" height="366" viewBox="0 0 562 366">
                <image href="images/Eleanor-Bobbie-Chris-Michael-volunteers-London-2015-James-Darling-2-smaller-1-1440x810.jpg" width="600px" height="600px"/>
              </pattern>
              <pattern id="pattern1r" patternUnits="userSpaceOnUse" x="365px" width="562" height="366" viewBox="0 0 562 366">
                <image href="images/istockphoto-1283710056-640x640.jpg" width="600px" height="600px"/>
              </pattern>
              
              <!-- Slide 2 -->
              <pattern id="bg2" patternUnits="userSpaceOnUse" width="1920" height="1080" viewBox="0 0 1920 1080">
                <image href="images/1.webp" width="100%" height="100%"/>
              </pattern>
              <pattern id="pattern2l" patternUnits="userSpaceOnUse" width="562" height="366" viewBox="0 0 562 366">
                <image href="images/2.webp" width="600px" height="600px"/>
              </pattern>
              <pattern id="pattern2r" patternUnits="userSpaceOnUse" x="365" width="562" height="366" viewBox="0 0 562 366">
                <image href="images/3.jpg" width="600px" height="600px"/>
              </pattern>
            </defs>
          </svg>
    
          <div class="slide" id="slide-1">
            <svg class="slide__bg" viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1920" height="1080">
              <rect x="0" y="0" width="1920" height="1080" fill="url(#bg1)" />
            </svg>
            <div class="slide__images">
              <div class="slide__image slide__image--left">
                <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
                  <path d="M 0 0 L 0 365 L 351.2382 365 L 562 0 L 0 0 Z" fill="url(#pattern1l)"/>
                </svg>
              </div>
    
              <div class="slide__image slide__image--right">
                <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
                  <path d="M 900 365 L 900 0 L 548.7618 0 L 338 365 L 900 365 Z" fill="url(#pattern1r)"/>
                </svg>
              </div>
            </div>
          </div>
    
          <div class="slide" id="slide-2">
            <svg class="slide__bg" viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1920" height="1080">
              <rect x="0" y="0" width="1920" height="1080" fill="url(#bg2)" />
            </svg>
            <div class="slide__images">
              <div class="slide__image slide__image--left">
                <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
                  <path d="M 0 0 L 0 365 L 351.2382 365 L 562 0 L 0 0 Z" fill="url(#pattern2l)"/>
                </svg>
              </div>
    
              <div class="slide__image slide__image--right">
                <svg viewBox="0 0 900 365" version="1.1"	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px">
                  <path d="M 900 365 L 900 0 L 548.7618 0 L 338 365 L 900 365 Z" fill="url(#pattern2r)"/>
                </svg>
              </div>
            </div>
          </div>
    
        <div class="slider__pagination">
          <a href="#slide-1" class="button"><</a>
          <a href="#slide-2" class="button">></a>
        </div>
      </header>
    </main>

      <script src="/abd.js">
      </script>

  </body>
</html>
