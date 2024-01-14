<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body class="bg-login">

@if(session('success'))
<div class="alert z-3 " role="alert" id="alert">
  <div  class="setmolder alert-success">
    {{toastr()->success('success')}}
  </div>
</div>
@endif
  @if(session('warning'))
<div class="alert z-3 " role="alert" id="alert">
  <div  class="setmolder alert-warning">
    {{toastr()->warning('warning')}}
  </div>
</div>
@endif
    <section class="d">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-4 d-none d-md-block">
                    <img src="assets/img/login.png"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="/login" method="post" class="needs-validation" novalidate="">
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Gudang</span>
                        </div>
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                        @csrf
                        <div class="form-group">
                          <label for="username">username</label>
                          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" tabindex="1" required autofocus>

                          <div>
                            @error('username')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>

                        <div class="position-relative">
                            <label for="password" class="d-block">Password</label>
                            <div class="d-flex position-relative">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                                <span id="togglePasswordLogin" onclick="togglePassword('password', 'togglePasswordLogin')" class="position-absolute eyes far fa-eye-slash">
                                </span>
                            </div>
                         <div>
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="pt-3 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (passwordInput && icon) {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            } else {
                console.error('Element with ID not found');
            }
        }
    </script>

    </body>
</html>
