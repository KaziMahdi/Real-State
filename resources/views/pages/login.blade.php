<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
      }

      body {
        
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #081b29;
      }

      .wrapper {
        position: relative;
        width: 750px;
        height: 450px;
        background: transparent;
        border: 2px solid #0ef;
        box-shadow: 0 0 25px #0ef;
        overflow: hidden;
      }

      .wrapper .form-box {
        position: absolute;
        top: 0;
        width: 50%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .wrapper .form-box.login {
        left: 0;
        padding: 80px 60px 0 40px;
        display: block;
      }

      .form-box h2 {
        font-size: 32px;
        color: #fff;
        text-align: center;
      }

      .form-box .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        margin: 25px 0;
      }

      .input-box input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border-bottom: 2px solid #fff;
        padding-right: 23px;
        font-size: 16px;
        color: #fff;
        font-weight: 500;
        transition: 0.5s;
      }
      .input-box input:focus,
      .input-box input:valid {
        border-bottom-color: #0ef;
      }

      .input-box label {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        transition: 0.5s;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
      }
      .input-box input:focus ~ label,
      .input-box input:valid ~ label {
        top: -5px;
        color: #0ef;
      }

      .input-box i {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        font-size: 18px;
        color: #fff;
        transition: 0.5s;
      }
      .input-box input:focus ~ i,
      .input-box input:valid ~ i {
        color: #0ef;
      }

      .btn {
        position: relative;
        width: 100%;
        height: 45px;
        background: transparent;
        border: 2px solid #0ef;
        outline: none;
        border-radius: 40px;
        cursor: pointer;
        font-size: 16px;
        color: #fff;
        font-weight: 600;
        z-index: 1;
        overflow: hidden;
      }
      .btn::before {
        content: "";
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 300%;
        background: linear-gradient(#081b29, #0ef, #081b29, #0ef);
        z-index: -1;
        transition: 0.5s;
      }
      .btn:hover::before {
        top: 0;
      }
      .form-box .logreg-link {
        font-size: 14.5px;
        color: #fff;
        text-align: center;
        margin: 20px 0 10px;
      }

      .logreg-link p a {
        color: #0ef;
        text-decoration: none;
        font-weight: 600;
      }

      .logreg-link p a:hover {
        text-decoration: underline;
      }
      .wrapper .info-text {
        position: absolute;
        top: 0;
        width: 50%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      .wrapper .info-text.login {
        right: 0;
        text-align: right;
        padding: 80px 40px 60px 40px; /* Adjusted padding to improve alignment */
        display: block;
      }
      .info-text h2 {
        font-size: 19px;
        color: #fff;
        line-height: 1.3;
        text-transform: uppercase;
      }
      .info-text p {
        font-size: 16px;
        color: #fff;
      }

      .wrapper .bg-animate {
        position: absolute;
        top: -4px;
        right: 0;
        width: 850px;
        height: 600px;
        background: linear-gradient(45deg, #081b29, #0ef);
        border-bottom: 3px solid #0ef;
        transform: rotate(10deg) skewY(41deg);
        transform-origin: bottom right;
      }
      #typing-text {
        color: #d5ad5e;
        box-shadow: 0 0 25px hsl(40, 98%, 55%);
      }

       /* Media query to hide info-text on Android devices */
       @media only screen and (max-width: 600px) {
        .wrapper .info-text.login{
          display: none;
        }
        .bg-animate{
          display: none;
        }
        .wrapper .form-box{
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <span class="bg-animate"></span>
      <div class="form-box login">
        <h2>Login</h2>
        <form action="{{route('login')}}" method="POST">
          @csrf
          <div class="input-box">
            <input type="text" name="username" value="{{old('username')}}"  required />
            <label>User Name Or Email</label>
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input
              type="password"
              id="password-field"
              name="password"
              required
            />
            <label>Password</label>
            <i id="toggler" class="bx bxs-lock-alt"></i>
          </div>

          <button type="submit" class="btn">Login</button>

          <div class="logreg-link">
            <p>
              Don't have an account ?
              <a href="#" class="register-link"> Sign Up</a>
            </p>
          </div>
          <div class="logreg-link">
            <p>              
              <a href="{{ route('forget.password.get') }}" class="register-link"> Reset Password</a>
            </p>
          </div>
        </form>
      </div>

      <div class="info-text login">
        <h2>
          Welcome to
          <span style="color: #d5ad5e; box-shadow: 0 0 25px hsl(40, 98%, 55%)"> Mirsaige 
          </span>
         
        </h2>
        <p>Hi, We are <span id="typing-text"></span></p>
      </div>
    </div>

    <script>
      // Password Toggle eye
      var password = document.getElementById("password-field");
      var toggler = document.getElementById("toggler");
      showHidePassword = () => {
        if (password.type == "password") {
          password.setAttribute("type", "text");
          toggler.classList.add("fa-eye-slash");
        } else {
          toggler.classList.remove("fa-eye-slash");
          password.setAttribute("type", "password");
        }
      };
      toggler.addEventListener("click", showHidePassword);

      // Define the text to be typed
      const texts = [
        "Construction Project Management Consultancy",
        "Customized Construction Solutions",
        "Construction Project Planning Experts",
        "Quality Construction Management",
      ];

      const typingSpeed = 100; // Typing speed in milliseconds
      const erasingSpeed = 60; // Erasing speed in milliseconds

      let textIndex = 0; // Index of the current text being typed
      let charIndex = 0; // Index of the current character being typed

      const typingElement = document.getElementById("typing-text");

      function typeText() {
        if (charIndex < texts[textIndex].length) {
          typingElement.textContent += texts[textIndex].charAt(charIndex);
          charIndex++;
          setTimeout(typeText, typingSpeed);
        } else {
          setTimeout(eraseText, 1000); // Pause for 1 second before erasing
        }
      }

      function eraseText() {
        if (charIndex > 0) {
          const newText = texts[textIndex].substring(0, charIndex - 1);
          typingElement.textContent = newText;
          charIndex--;
          setTimeout(eraseText, erasingSpeed);
        } else {
          textIndex = (textIndex + 1) % texts.length; // Move to the next text
          setTimeout(typeText, 500); // Pause for 0.5 seconds before typing the next text
        }
      }

      // Start the typing animation
      setTimeout(typeText, 500); // Start after a 0.5-second delay


      //jQuery(part)
      // const typed = select('.typed')
      // if (typed) {
      //   let typed_strings = typed.getAttribute("data-typed-items");
      //   typed_strings = typed_strings.split(",");
      //   new Typed(".typed", {
      //     strings: typed_strings,
      //     loop: true,
      //     typeSpeed: 100,
      //     backSpeed: 50,
      //     backDelay: 2000,
      //   });
      // }

      // <p>
      //   I'm{" "}
      //   <span
      //     class="typed"
      //     data-typed-items="Designer, Developer, Freelancer, Photographer"
      //   ></span>
      //   {" "}
      // </p>;


      //  typing text animation script
      //  var typed = new Typed(".typing", {
      //         strings: [" Web Developer", "Web Designer", "Freelancer","Social Worker" ],
      //         typeSpeed: 100,
      //         backSpeed: 60,
      //         loop: true
      //     });
      // <div class="text-3">And I'm a <span class="typing"></span></div>
      // <script src="https://code.jquery.com/jquery-3.5.1.min.js">





    </script>
  </body>
</html>
