<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tawuran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;

  }

  body {
    min-height: 100vh;
    min-height: -webkit-fill-available;
    display: flex;
  }

  html {
    height: -webkit-fill-available;
  }

  main {
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
  }

  .dropdown-toggle {
    outline: 0;
  }

  .btn-toggle {
    padding: .25rem .5rem;
    font-weight: 600;
    color: rgba(0, 0, 0, .65);
    background-color: transparent;
  }

  .btn-toggle:hover,
  .btn-toggle:focus {
    color: rgba(0, 0, 0, .85);
    background-color: #d2f4ea;
  }

  .btn-toggle::before {
    width: 1.25em;
    line-height: 0;
    content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
    transition: transform .35s ease;
    transform-origin: .5em 50%;
  }

  .btn-toggle[aria-expanded="true"] {
    color: rgba(0, 0, 0, .85);
  }

  .btn-toggle[aria-expanded="true"]::before {
    transform: rotate(90deg);
  }

  .btn-toggle-nav a {
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
  }

  .btn-toggle-nav a:hover,
  .btn-toggle-nav a:focus {
    background-color: #d2f4ea;
  }

  .scrollarea {
    overflow-y: auto;
  }

  .container {
    position: relative;
  }

  .wrapper {
    font-family: 'Courier New', cursive;
    font-size: 16px;
    margin: 10px 50px;
    letter-spacing: 6px;
    /* font-weight: bold; */
  }
</style>

<body>
  <div class="sidebar text-bg-dark">
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 970px;">
      <a href="<?= BASEURL; ?>/mainmenu" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none text-center">
        <img src="asset/logo.png" class="ms-2 mt-5" width="auto" height="60">
      </a>
      <span class="fs-4 text-center">-{ <?= $data['tier']; ?> }-</span>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="<?= BASEURL; ?>/mainmenu" class="nav-link text-white" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#home" />
            </svg>
            Sekolah
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/toko" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#speedometer2" />
            </svg>
            Toko
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/pasukan" class="nav-link text-white ">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#table" />
            </svg>
            Pasukan
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/serang" class="nav-link text-white active">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#grid" />
            </svg>
            Serang
          </a>
        </li>
      </ul>

      <hr>

      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><?= $data['user']['username']; ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="<?= BASEURL; ?>/logout">Sign out</a></li>
        </ul>
      </div>
    </div>

  </div>
  <div class="container">
    <div class="d-flex flex-row-reverse">
      <div class="col-md-3 fs-4 float-start">
        <span id="uang">Duit : Rp. <?= $data['user']['uang'] ?></span>
      </div>
      <div class="col-md-3 fs-4 float-start">
        <span id="makanan">Makanan : <?= $data['user']['makanan'] ?></span>
      </div>
    </div>
    <div class="sekolah mt-5">
      <div class="row">
        <div class="col-5 m-2">
          <div class="card">
            <img src="asset/gangbang.png" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title">Mulai menyerang</h5>
                  <button class="btn btn-primary" id="CariLawan" name="CariLawan">Cari Lawan</button>
                </div>
                <div class="col">
                  <h1 id="attackresult"></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-5 m-2">
          <div class="card">
            <div class="card-header">
              Mencari Lawan
            </div>
            <div class="card-body" style="height: 16rem;">
              <h5 class="card-title">Username : <strong id="userenemy">-</strong></h5>
              <p class="card-text">Bangunan yang dimiliki : <strong id="bangunanenemy">-</strong></p>
              <p class="card-text">Uang : <strong id="uangenemy">-</strong></p>
              <p class="card-text">Makanan : <strong id="makananenemy">-</strong></p>
              <p class="card-text">Exp : <strong id="expenemy">-</strong></p>
              <p class="card-text">Tropy : <strong id="poinenemy">-</strong></p>
            </div>
            <div class="card-footer">
              <input type="text" value="" id="idenemy" hidden>
              <button type="button" class="btn btn-danger" id="attackenemy" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>Serang</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Penyerangan Dilakukan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <div class="wrapper">
                      <div id="typedtext"></div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="komentar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="">
                      Lewati Penyerangan
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal victory  -->
            <div class="modal fade" id="skip-victory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header text-center bg-success text-white">
                      <h1 class="modal-title w-100 fs-1" id="staticBackdropLabel">VICTORY</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">
                      <span>Mendapatkan</span><br>
                      <b id="vmatchpoin">Poin : + 8000</b><br>
                      <b id="vmatchexp">Exp : + 8000</b><br>
                      <b id="vmatchuang">Uang : + 8000</b><br>
                      <b id="vmatchmakanan">Makanan : + 8000</b>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- DEFEAT -->
            <div class="modal fade" id="skip-defeat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header text-center bg-danger text-white">
                    <h1 class="modal-title w-100 fs-1" id="staticBackdropLabel">DEFEAT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body text-center">
                    <span>Mendapatkan</span><br>
                    <b id="dmatchpoin">Poin : + 8000</b><br>
                    <b id="dmatchexp">Exp : + 8000</b><br>
                    <b id="dmatchuang">Uang : + 8000</b><br>
                    <b id="dmatchmakanan">Makanan : + 8000</b>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>























  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    /* global bootstrap: false */
    (() => {
      'use strict'
      const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      tooltipTriggerList.forEach(tooltipTriggerEl => {
        new bootstrap.Tooltip(tooltipTriggerEl)
      })
    })()
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="<?= BASEURL; ?>/js/script.js"></script>
  <script src="<?= BASEURL; ?>/js/animasi.js"></script>
</body>

</html>