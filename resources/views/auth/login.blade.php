<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-BUILDING KEMENKES RI</title>

    <link rel="icon" type="image/png" href="https://trello.com/1/cards/64ed4989bbe6747599ce1a05/attachments/650921639318e47f2e317368/previews/650921639318e47f2e317376/download/icon-kemenkes.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
</head>
<body>
  @include('sweetalert::alert')
  <section class="vh-100" style="background-image: url('dist/img/Kemenkes_waifu2x_art_noise3.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <div class="container py-3 h-100">
      <form method="post" action="login">
        @csrf
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-18 col-md-8 col-lg-6 col-xl-5" >
          <div class="card shadow-2-strong" style="border-radius: 10rem; background-image: url('https://cdn.pnghd.pics/data/9/background-batik-abu-abu-25.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;" >
            <div class="card-header p-4.5 text-center">
              <a href="/">
                <p><img src="https://trello.com/1/cards/64ed4989bbe6747599ce1a05/attachments/650921641616b168841dbe3b/previews/650921651616b168841dbed5/download/logo-ebuilding.png" class="img-fluid"  width="150"></p>
              </a>
              <span class="text-uppercase text-center" style="font-family: serif;">
                Sistem Informasi Manajemen <br> Penilaian Jasa Pengelola Gedung
             </span>
             <hr class="my-4">
              <div class="form-outline mb-2">
                <label class="form-label" for="email" style="font-family: Comic Sans MS">Email :</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg"  style="border-radius: 15rem;" placeholder="Masukkan email anda" required />
              </div>
  
              <div class="form-outline mb-2" >
                <label class="form-label" for="password" style="font-family: Comic Sans MS">Password :</label>
                <input type="password"name="password" id="password" class="form-control form-control-lg" style="border-radius: 15rem;" placeholder="Masukkan password anda"required/>
              </div>
              <hr class="my-4">
              <!-- Checkbox -->
              <div class="d-flex justify-content-around align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                  <label class="form-check-label" for="form1Example3"> Remember password </label>
                </div>
                <a href="forgotpassword" style="font-family: Times New Roman font-size: 12">Forgot password?</a>
              </div>
              <button class="btn btn-outline-dark btn-lg" style="border-radius: 15rem;" type="submit">Login</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
