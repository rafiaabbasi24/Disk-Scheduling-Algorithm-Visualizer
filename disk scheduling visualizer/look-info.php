<?php include('../auth.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOOK - Disk Scheduling Algorithms</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="images/icon.ico" type="image/x-icon">
</head>

<body>

  <header class="shadow-md">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand mr-5" href="index.php"><img src="images/heading.png" href="index.php" alt=""
            width="400px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                style="cursor: pointer;">Visualize</a>
              <div class="dropdown-menu" id="custom-dropdown-menu">
                <a class="dropdown-item" href="FCFS/fcfs.php">FCFS</a>
                <a class="dropdown-item" href="SSTF/sstf.php">SSTF</a>
                <a class="dropdown-item" href="SCAN/scan.php">SCAN</a>
                <a class="dropdown-item" href="CSCAN/cscan.php">C-SCAN</a>
                <a class="dropdown-item" href="LOOK/look.php">LOOK</a>
                <a class="dropdown-item" href="CLOOK/clook.php">C-LOOK</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="py-3 mb-3">
    <div class="container">

      <h1>LOOK</h1>
      <br>
      <p>Look disk scheduling is another type of disk scheduling algorithm. Look scheduling is an enhanced version of
        SCAN disk scheduling. Look disk scheduling is the same as SCAN disk scheduling, but in this scheduling, instead
        of going till the last track, we go till the last request and then change the direction.</p>
      <br>

      <h3>Advantages:</h3>
      <ul>
        <li>In Look disk scheduling, there is no starvation.</li>
        <li>It offers low variance in waiting time and response time.</li>
        <li>Offers better performance than SCAN disk scheduling.</li>
        <li>No need to move to end of disk when no request exists there.</li>
      </ul>
      <br>

      <h3>Disadvantages:</h3>
      <ul>
        <li>Overhead of finding the end requests.</li>
        <li>Long waiting time for just-visited cylinders.</li>
      </ul>

      <h3>Example:</h3>
      <ul>
        <li>Disk contains 200 tracks (0–199) and request queue: 176, 79, 34, 60, 92, 11, 41, 114</li>
        <li>Initial R/W head at 50, moving toward higher tracks.</li>
        <li>Calculate total cylinder movement using LOOK algorithm.</li>
        <br>
        <img src="images/look-eg-graph.png" alt="graph of example">
        <br><br>
        <li>Total cylinders moved = (60-50)+(79-60)+(92-79)+(114-92)+(176-114)+(176-41)+(41-34)+(34-11) = 291</li>
      </ul>

      <h3>Steps to Implement Algorithm:</h3>
      <ol>
        <li>Request array stores requested track indices by arrival time.</li>
        <li>Head has a given initial direction.</li>
        <li>Service all requests in that direction.</li>
        <li>Stop at last request in direction, then reverse.</li>
        <li>Calculate absolute distance from head to track.</li>
        <li>Increment total seek count by this distance.</li>
        <li>Update head to current track after servicing.</li>
      </ol>

      <p><b>Time Complexity: O(n) &emsp; Auxiliary Space: O(1)</b></p>

      <a class="simulate" href="LOOK/look.php">Visualize</a>

    </div>
  </div>

  <div class="footer">
    <div class="container">
      <div class="row py-3 text-light">
        <div class="col-lg-3">
          <a href="index.php"><img src="images/footer.png" class="footer-logo img-fluid" width="200" draggable="false"
              alt="Logo"></a>
        </div>
        <div class="col-lg">
          <h3>Disk Scheduling</h3>
          <p>Disk scheduling is the process of determining the order in which the read/write operations to a computer's disk drive are carried out.</p>
        </div>
        <div class="col-lg-2">
          <h3>Quick Links</h3>
          <div class="footer-links">
            <a href="fcfs-info.php">FCFS</a>
            <a href="sstf-info.php">SSTF</a>
            <a href="scan-info.php">SCAN</a>
            <a href="cscan-info.php">C-SCAN</a>
            <a href="look-info.php">LOOK</a>
            <a href="clook-info.php">C-LOOK</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('navbar-scrolled', 'shadow');
      } else {
        nav.classList.remove('navbar-scrolled', 'shadow');
      }
    });
  </script>

</body>

</html>
