<?php require_once 'include/head.php'; ?>
<body>
  <div class="login-container">
    <div class="login-form">
      <form action="app/loginHandler.php" method="post" autocomplete="off">
        
        <!-- Logo Section -->
        <div class="imgcontainer">
          <img src="assets/img/logo.png" alt="Logo" class="avatar">
        </div>
        
        <!-- Login Form Inputs -->
        <div class="form-container">
          <label for="uname"><b>Username</b></label>
          <div class="input-container">
            <input type="text" placeholder="Enter Username" name="uname" required>
          </div>

          <label for="psw"><b>Password</b></label>
          <div class="input-container">
            <input type="password" placeholder="Enter Password" name="psw" required>
          </div>

          <!-- Submit Button -->
          <button type="submit" name="login">Sign in</button>

          <!-- Remember me Checkbox -->
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
        
        <!-- Forgot password and cancel -->
        <div class="footer-container">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
    </div>
  </div>

  <style>
    /* Apply the image background related to microfinance */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('bgm.jpg') no-repeat center center fixed; /* Use your desired image URL here */
      background-size: cover;
      overflow: hidden; /* Ensure the content doesn't overflow */
    }

    /* Create the bokeh effect using a pseudo-element */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: inherit; /* Inherit the background image */
      filter: blur(10px); /* Apply the blur effect */
      z-index: -1; /* Place the pseudo-element behind the content */
    }

    /* Add overlay to make form stand out */
    .login-container {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.8); /* Light overlay */
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .login-form {
      width: 100%;
    }

    .imgcontainer {
      text-align: center;
      margin-bottom: 20px;
    }

    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #ddd;
    }

    .form-container {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 8px;
    }

    .input-container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
      transition: all 0.3s ease;
    }

    .input-container input:focus {
      border-color: #4e73df;
      outline: none;
    }

    button {
      background-color: #4e73df;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
      margin-top: 20px;
    }

    button:hover {
      background-color: #2e59d9;
    }

    .footer-container {
      background-color: #f1f1f1;
      padding: 10px;
      margin-top: 20px;
      text-align: center;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .footer-container .cancelbtn {
      background-color: #ddd;
      border: none;
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .footer-container .cancelbtn:hover {
      background-color: #bbb;
    }

    .footer-container .psw a {
      color: #4e73df;
      text-decoration: none;
    }

    .footer-container .psw a:hover {
      text-decoration: underline;
    }

    input[type="checkbox"] {
      margin-right: 10px;
    }

    /* Responsive design */
    @media (max-width: 480px) {
      .login-container {
        width: 90%;
      }

      .avatar {
        width: 80px;
        height: 80px;
      }
    }
  </style>
</body>
<?php require_once 'include/footer.php'; ?>
