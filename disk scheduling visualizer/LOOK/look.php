<?php include('../auth.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="look.js"></script>
  <style>
    .algo {
      padding: 3%;
      margin: 3%;
      height: 150vh;
    }
  </style>
  <title>LOOK</title>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="first">
    <header class="shadow-md">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
          <a class="navbar-brand mr-5" href="../index.php">
            <img src="../images/heading.png" href="../index.php" alt="" width="400px">
          </a>
          <div class="menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="cursor: pointer;">Visualize</a>
                  <div class="dropdown-menu" id="custom-dropdown-menu">
                    <a class="dropdown-item" href="../FCFS/fcfs.php">FCFS</a>
                    <a class="dropdown-item" href="../SSTF/sstf.php">SSTF</a>
                    <a class="dropdown-item" href="../SCAN/scan.php">SCAN</a>
                    <a class="dropdown-item" href="../CSCAN/cscan.php">C-SCAN</a>
                    <a class="dropdown-item" href="../LOOK/look.php">LOOK</a>
                    <a class="dropdown-item" href="../CLOOK/clook.php">C-LOOK</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <div class="algo">
      <h1>LOOK - Simulation</h1>
      <div class="visualizer tm-timeline-item">
        <div class="tm-timeline-item-inner">
          <div class="new tm-timeline-description-wrap">
            <div class="tm-bg-dark tm-timeline-description">
              <div class="">
                <div class="form-container-res" id="ifManualInput" style="display:block">
                  <label class="col-form-label">Enter the request sequence:</label>
                  <input id="Sequence" class="form-control" oninput="resetLookResult()"
                    placeholder="Eg: 10, 25, 40  (Maximum input value = 199)" />
                  <p></p>
                  <label class="col-form-label">Enter the initial head position:</label>
                  <input id="Head" class="form-control" oninput="resetLookResult()"
                    placeholder="Eg: 20 (Maximum input value = 199)" />
                  <p></p>
                  <label>Direction: </label>
                  <p></p>
                  <select class="btn btn-outline-primary btn-outline-light dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: left;"
                    id="Direction">
                    <option style="background-color: white; color: black;">Left</option>
                    <option style="background-color: white; color: black;">Right</option>
                  </select>
                  <p></p>
                  <div class="col center-run">
                    <button class="btn btn-outline-primary btn-outline-light" onclick="look_click()" id="LOOK">Run
                      LOOK</button>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="newc tm-bg-dark-light tm-timeline-description">
        <h3 class="tm-text-orange tm-font-400">Output of the algorithm:</h3>
        <div class="look-output-man" id="ifManualOutput" style="display:block">
          <label>Total seek time is:&nbsp;</label>
          <span style="font-weight: bolder; color: #ffffff" id="look_totalSeekCount"></span>
          <p></p>
          <label>Sequence of execution:&nbsp;</label>
          <span style="font-weight: bolder; color: #ffffff" id="look_finalOrder"></span>
          <p></p>
          <label>Average seek time:&nbsp;</label>
          <span style="font-weight: bolder; color: #ffffff" id="look_averageSeekCount"></span>
          <p></p>
          <p></p>
          <div id="chartContainer" style="display: block"></div>
          <div id="betweenButton"></div>
        </div>
        <div class="tm-timeline-connector-vertical"></div>
      </div>
    </div>

    <div class="footer">
      <div class="container">
        <div class="row py-3 text-light">
          <div class="col-lg-3">
            <a href="../index.php">
              <img src="../images/footer.png" class="footer-logo img-fluid" width="200" draggable="false" alt="Logo">
            </a>
          </div>
          <div class="col-lg">
            <h3>Disk Scheduling</h3>
            <p>Disk scheduling is the process of determining the order in which the read/write operations to a computer's disk drive are carried out.</p>
          </div>
          <div class="col-lg-2">
            <h3>Quick Links</h3>
            <div class="footer-links">
              <a href="../fcfs-info.php">FCFS</a>
              <a href="../sstf-info.php">SSTF</a>
              <a href="../scan-info.php">SCAN</a>
              <a href="../cscan-info.php">C-SCAN</a>
              <a href="../look-info.php">LOOK</a>
              <a href="../clook-info.php">C-LOOK</a>
            </div>
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
