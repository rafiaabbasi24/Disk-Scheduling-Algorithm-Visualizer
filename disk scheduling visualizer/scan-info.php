<?php include('../auth.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SCAN - Disk Scheduling Algorithms</title>
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
        <a class="navbar-brand mr-5" href="index.php"><img src="images/heading.png" href="index.php" alt="" width="400px"></a>
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
      <h1>SCAN (Elevator Algorithm)</h1>
      <br>
      <p>Scan is often called Elevator Scheduling Algorithm, due to the way it works.<br>
        In SCAN, disk arm starts from one end of the disk and executes all the requests in its way till it reaches the
        other end. <br> As soon as it reaches the other end, it reverses its direction, hence it moves back and forth
        continuously (like an elevator) to access the disk.</p>
      <br>

      <h3>Advantages:</h3>
      <ul>
        <li>There is no starvation.</li>
        <li>Average Response time, and its variance is low.</li>
        <li>High throughput.</li>
        <li>Simple to understand and better in performance compared to FCFS</li>
      </ul>
      <br>

      <h3>Disadvantages:</h3>
      <ul>
        <li>Its Implementation can be difficult and complex.</li>
        <li>The requests at the midrange are serviced more and those arriving behind the disk arm will have to wait.</li>
        <li>Arm will move to end even when there is no request to execute.</li>
      </ul>

      <h3>Example:</h3>
      <ul>
        <li>Consider a disk containing 200 tracks (0-199) and the request queue includes the track number 176, 79, 34, 60, 92, 11, 41, 114.</li>
        <li>The current position of read/write head is 50, and direction is towards the larger value.</li>
        <li>The disk contains 200 tracks from 0 to 199.</li>
        <li>The head starts at 50, services the requests, and then we calculate the total number of cylinders moved.</li>
        <br>
        <img src="images/scan-eg-graph.jpg" alt="graph of example">
        <br><br>
        <li>Total cylinders moved = (50-41)+(41-34)+(34-11)+(11-0)+(60-0)+(79-60)+(92-79)+(114-92)+(176-114) = 226</li>
      </ul>

      <h3>Steps to Implement Algorithm:</h3>
      <ol>
        <li>Let Request array represent track requests in arrival order. 'head' is the position of disk head.</li>
        <li>Let direction represent whether the head is moving left or right.</li>
        <li>Service all tracks in the current direction.</li>
        <li>Calculate absolute distance of each track from head.</li>
        <li>Increment total seek count by this distance.</li>
        <li>Update head position to the serviced track.</li>
        <li>Repeat until reaching one end of the disk.</li>
        <li>If the end is reached, reverse direction and repeat until all requests are serviced.</li>
      </ol>

      <p><b>Time Complexity: O(N * logN) &emsp; Auxiliary Space: O(N)</b></p>
      <a class="simulate" href="SCAN/scan.php">Visualize</a>
    </div>
  </div>

  <div class="footer">
    <div class="container">
      <div class="row py-3 text-light">
        <div class="col-lg-3">
          <a href="index.php"><img src="images/footer.png" class="footer-logo img-fluid" width="200" draggable="false" alt="Logo"></a>
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
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 20) {
        nav.classList.add('navbar-scrolled', 'shadow');
      } else {
        nav.classList.remove('navbar-scrolled', 'shadow');
      }
    });
  </script>

</body>

</html>
