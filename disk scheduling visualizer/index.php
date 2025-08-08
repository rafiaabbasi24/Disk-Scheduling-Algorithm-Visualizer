<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disk Scheduling Algorithms</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="images/icon.ico" type="image/x-icon">
</head>

<body>
  <div class="first">

    <header class="shadow-md">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand mr-5" href="index.php"><img src="images/heading.png" alt="" width="400px"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <?php session_start(); ?>
            <?php if(isset($_SESSION['username'])): ?>
            <li class="nav-item"><a class="nav-link">Welcome, <?= $_SESSION['username'] ?></a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <?php endif; ?>
            </ul>
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">Visualize</a>
                <div class="dropdown-menu" id="custom-dropdown-menu">
                  <a class="dropdown-item" href="FCFS/fcfs.php">FCFS</a>
                  <a class="dropdown-item" href="/SSTF/sstf.php">SSTF</a>
                  <a class="dropdown-item" href="/SCAN/scan.php">SCAN</a>
                  <a class="dropdown-item" href="/CSCAN/cscan.php">C-SCAN</a>
                  <a class="dropdown-item" href="/LOOK/look.php">LOOK</a>
                  <a class="dropdown-item" href="/CLOOK/clook.php">C-LOOK</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="py-3">
      <div class="container">
        <div class="main-text" style="text-align: center;">
          <h1>Disk Scheduling</h1>
          <p>Disk scheduling is the process of determining the order in which the read/write operations to a computer's disk drive are carried out</p>
          <a href="disk-scheduling-info.php">Click Here to know more</a>
        </div>
      </div>
    </main>

    <div class="section">
      <div class="con">
        <div class="cards">
          <div class="box">
            <div class="content">
              <h2>FCFS</h2>
              <p>The requests are addressed in the order they arrive in the disk queue. FCFS is the simplest disk scheduling algorithm of all the scheduling algorithms.</p>
              <a class="up" href="fcfs-info.php">How it Works</a>
              <a class="down" href="FCFS/fcfs.php">Visualize</a>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="box">
            <div class="content">
              <h2>SSTF</h2>
              <p>The requests having shortest seek time are executed first. So, the seek time of every request is calculated in advance and then they are scheduled accordingly.</p>
              <a class="up" href="sstf-info.php">How it Works</a>
              <a class="down" href="SSTF/sstf.php">Visualize</a>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="box">
            <div class="content">
              <h2>SCAN</h2>
              <p>The disk arm moves into a particular direction and services the requests coming, after reaching the end of disk, it reverses direction and services the request arriving in its path.</p>
              <a class="up" href="scan-info.php">How it Works</a>
              <a class="down" href="SCAN/scan.php">Visualize</a>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="box">
            <div class="content">
              <h2>C-SCAN</h2>
              <p>The disk arm moves in a circular fashion, that is the disk arm instead of reversing its direction goes to the other end of the disk and starts servicing the requests from there.</p>
              <a class="up" href="cscan-info.php">How it Works</a>
              <a class="down" href="CSCAN/cscan.php">Visualize</a>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="box">
            <div class="content">
              <h2>LOOK</h2>
              <p>The disk arm in spite of going to the end of the disk goes only to the last request to be serviced in front of the head and then reverses its direction from there only.</p>
              <a class="up" href="look-info.php">How it Works</a>
              <a class="down" href="LOOK/look.php">Visualize</a>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="box">
            <div class="content">
              <h2>C-LOOK</h2>
              <p>The disk arm in spite of reversing its direction from last request like in LOOK, instead goes to the other end's last request. It prevents extra delay due to traversal to the end of the disk.</p>
              <a class="up" href="clook-info.php">How it Works</a>
              <a class="down" href="CLOOK/clook.php">Visualize</a>
            </div>
          </div>
        </div>
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
            <p>Disk scheduling is the process of determining the order in which the read/write operations to a computer's disk drive are carried out</p>
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

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
