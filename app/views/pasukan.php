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

  .detail {
    display: flex;
    width: 150px;
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
          <a href="<?= BASEURL; ?>/pasukan" class="nav-link text-white active">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#table" />
            </svg>
            Pasukan
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/serang" class="nav-link text-white">
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
        <span>Duit : Rp. <?= $data['user']['uang'] ?></span>
      </div>
      <div class="col-md-3 fs-4 float-start">
        <span>Makanan : <?= $data['user']['makanan'] ?></span>
      </div>
    </div>
    <div class="sekolah mt-5">
      <h3 class="mb-3">Pasukan yang dimiliki</h3>
      <div class="row">
        <?php foreach ($data['pasukan'] as $pasukan) : ?>
          <div class="col m-2">
            <div class="card itemschool" style="width: 17rem;">
              <div class="card-header text-center"><?= $pasukan['pasukan'] ?></div>
              <div class="card-body d-flex justify-content-center" style="height: 14rem;">
                <img src="../public/asset/<?= $pasukan['icon'] ?>" width="190px" height="auto" class="card-image-top" alt="">
              </div>
              <div class="card-footer text-center">
                <span><?= $pasukan['jumlah'] ?> Pasukan</span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- end baris pertama -->
      <div class="modal fade modal-lg" id="detailpasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pasukan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
              <?php foreach ($data['troops'] as $troops) : ?>
                <div class="row bg-info rounded m-3">
                  <div class="col detail m-3 bg-light rounded p-3 ">
                    <img src="../public/asset/<?=$troops['icon'];?>" alt="arya" style="width: 200px; height: auto;">
                  </div>
                  <div class="col-8 m-3 ">
                    <div class="row text-white">
                      <h1><?=$troops['pasukan'];?></h1>
                      <hr>
                    </div>

                    <div class="row fs-5">
                      <div class="col">
                        <span><b>ATK</b> : <?=$troops['atk'];?></span><br>
                        <span><b>DEF</b> : <?=$troops['def'];?></span><br>
                        <div class="btn btn-dark text-white m3 mt-2" style="cursor:context-menu;">
                          <b>Rp. <?=$troops['harga'];?>/org</b>
                        </div>
                      </div>
                      <div class="col">
                        <span><b>HP</b> : <?=$troops['hp'];?></span><br>
                        <span><b>Muatan</b> : <?=$troops['muatan'];?></span><br>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!-- baris kedua -->
      <h3 class="mb-3 mt-4">Latih Pasukan</h3>
      <div class="row">
        <div class="col">
          <?php Flasher::flash(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                Latih Pasukan
                <a href="" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailpasukan">Detail Pasukan</a>
              </div>
            </div>
            <div class="card-body">
              <form action="<?= BASEURL; ?>/pasukan/latih" method="post">
                <div class="row">
                  <div class="col">
                    <label for="pasukan">Pasukan</label>
                    <select name="pasukan" id="" class="form-select">
                      <?php foreach ($data['troops'] as $troops) : ?>
                        <option value="<?= $troops['idpasukan']; ?>"><?= $troops['pasukan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col">
                    <label for="jml">Jumlah Pasukan</label>
                    <input type="number" name="jml" id="jml" class="form-control" min="1" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <input type="submit" value="Latih Pasukan" class="btn btn-primary">
                  </div>
                </div>
              </form>
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
</body>

</html>