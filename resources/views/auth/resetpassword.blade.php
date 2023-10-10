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
  <section class="vh-100" style="background-image: url('https://roum.kemkes.go.id/wp-content/uploads/2022/11/Kemenkes-2-1.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <div class="container py-3 h-100">
      <form method="post" action="{{route('password.update')}}">
        @csrf
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5" >
          <div class="card shadow-2-strong" style="border-radius: 10rem; background-image: url('https://cdn.pnghd.pics/data/9/background-batik-abu-abu-25.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;" >
            <div class="card-header p-5 text-center">
              <a href="/">
                <p><img src="https://trello.com/1/cards/64ed4989bbe6747599ce1a05/attachments/650921641616b168841dbe3b/previews/650921651616b168841dbed5/download/logo-ebuilding.png" class="img-fluid"  width="150"></p>
              </a>
              <h2>Reset Password ?</h2>
              <p>Silahkan masukkan Password dan konfirmasi password</p>
             <hr class="my-4">
              <div class="form-outline mb-4">
                <label class="form-label" for="password" style="font-family: Comic Sans MS">Password :</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" style="border-radius: 10rem;" placeholder="Masukkan Password anda" required />
              </div>
              <div class="form-outline mb-4" >
                <label class="form-label" for="password_confirmation" style="font-family: Comic Sans MS">Konfirmasi Password :</label>
                <input type="password_confirmation"name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" style="border-radius: 15rem;" placeholder="Masukkan konfirmasi password anda"required/>
              </div>
              <button class="btn btn-outline-dark btn-lg" style="border-radius: 15rem;" type="submit" value="Requst Password Reset"> Update Password</button>
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
