<?php
session_start();
if(!$_SESSION['user']){
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#cd433f">
  <meta name="description" content="Photo Editor Application"> 
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="./css/styleLogin.css">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/range-input.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
  <link rel="manifest" href="/manifest.json" />
  <title>Quick photo Editor | Edit your photo Quickly</title>
</head>

<body>
  <div id="banner">
 <!--    <div class="logo">
      <img src="./assets/logo/ukraine-ukraine-flag.gif" alt="logo" width="100px" />
    </div> -->
    <div class="download-button">
      <button class="download" class="download-img">
        <a href="#" class="save-now" id="save-now">
          <span class="Download"><img src="./assets/svg/download.svg" alt="download-icon" /></span>
          Завантажити</a>
      </button>

      <div class="contr contr2">
        <form class="forma">
          <img class="wdth" src="<?= $_SESSION['user']['avatar'] ?>" alt="">
          <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
          <a href="#"><?= $_SESSION['user']['email'] ?></a>
          <a href="vendor/logout.php" class="logout">Выход</a>
        </form>
      </div>
    </div>
  </div>
  <div id="left">
    <div id="tools">
      <div id="exposure">
        <h5>Яскравість</h5>
        <div class="exposure-box">
          <input style="background-color:transparent;" class="styled-slider slider-progress" type="range" id="range"
            min="0" max="200" />
        </div>
      </div>
      <div class="saturate-slider">
        <h5>Насиченість</h5>
        <div class="val" id="saturate"></div>
        <input class="styled-slider slider-progress" id="saturate-slider" type="range" min="0" max="200" value="100">
      </div>
      <div class="hue-slider">
        <h5>Обертання відтінку</h5>
        <div class="val" id="hue"></div>
        <input class="styled-slider slider-progress" id="hue-slider" type="range" min="0" max="360" value="0">
      </div>
      <div class="blur-slider">
        <h5>Розмиття</h5>
        <div class="val" id="blur"></div>
        <input class="styled-slider slider-progress" id="blur-slider" type="range" min="0" max="20" value="0">
      </div>
      <div class="opacity-slider">
        <h5>Непрозорість</h5>
        <div class="val" id="opacity"></div>
        <input class="styled-slider slider-progress" id="opacity-slider" type="range" min="0" max="100" value="0">
      </div>
      <div id="tool">
        <h4>Інструменти</h4>
        <button id="crop-button" class="action-tool" title="Crop">
          <i class="fas fa-crop"></i>
        </button>
   <!--      <button class="action-tool" title="LightBulb">
          <i class="fas fa-lightbulb"></i>
        </button> -->
       
     <!--    <button class="action-tool" title="Icicles">
          <i class="fas fa-icicles"></i>
        </button> -->

        <button class="action-tool" onclick="rotate()" title="Rotate">
          <i class="fas fa-rotate"></i>
        </button>
        <button id="start-button" class="action-tool"><i class="fas fa-eye-dropper"></i></button> <span id="result"></span>
      </div>
      <div id="resize">
        <h5>Змінити розмір</h5>
        <div id="resize-button" class="resize">
          <div class="dropup-content">
            <div class="dimensions">
              <div class="input">
                <input type="text" id="input_width" class="resizer__input--width"
                  style="background-color: rgb(255, 255, 255);width: 50px;height: 125%;" value="0" />
                <span>x</span>
                <input type="text" id="input_height" class="resizer__input--height"
                  style="background-color: rgb(255, 255, 255); width: 50px;height: 125%;" value="0" />
              </div>
              <div class="aspect">
                <label>
                  <input type="checkbox" id="check_aspect-ratio" class="resizer__aspect" checked />
                  <span>&nbsp;Keep Aspect Ratio</span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="middle">
    <div class="canvas">
      <canvas class="img-box" id="img-box"> </canvas>
      <div class="uploaded-img-container">
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Файл ще не завантажено!</p>
      </div>
    </div>
    <div id="upload">
      <button class="upload-img">
        <input type="file" id="input-field" accept="image/png, image/jpeg" hidden />
        <a href="#" id="upload" class="upload" onclick="uploadbtnActive()"><i
            class="fas fa-upload"style="margin:5px;;" ></i><span>Вибрати зображення</span></a>
      </button>
    </div>
    <div id="dos">
      <button class="action-tool undo" onclick="unDo()">
        <i id="undo-btn" class="fas fa-undo disabled"></i>
        <p>Крок назад</p>
      </button>
      <!-- <div id="Clear"> -->
      <button class="Clear" onclick="applyFilter('remove')">
        <input type="file" id="input-field" accept="image/png, image/jpeg" hidden />
        <a href="#" id="upload" class="upload" onclick="uploadbtnActive()"> <i id="delete" id="close-btn"
            class="fas fa-close"></i></i><span class="clear5">&nbsp; Скинути</span></a>
      </button>
      <!-- </div> -->
      <button class="action-tool redo" onclick="reDo()">
        <i id="redo-btn" class="fas fa-redo disabled"></i>
        <p>Крок вперед</p>
      </button>
    </div>
  </div>
  <div id="right">
    <h4>Фільтри</h4><br>
    <div id="tools">
    
      <button class="action-tool color-btn">
        <div id="grey-scale" onclick="applyFilter('grey')">Відтінки сірого</div>
      </button>
      <button class="action-tool color-btn">
        <div id="sepia" onclick="applyFilter('sepia')">Cепія</div>
      </button>
      <button class="action-tool color-btn">
        <div id="amaro" onclick="applyFilter('amaro')">Амаро</div>
      </button>
      <button class="action-tool color-btn">
        <div id="lark" onclick="applyFilter('lark')">Lark</div>
      </button>
      <button class="action-tool color-btn">
        <div id="flip" onclick="applyFilter('flip')">Flip</div>
      </button>
      <button class="action-tool color-btn">
        <div id="rainbow" onclick="applyFilter('rainbow')">Веселка</div>
      </button>
      <button class="action-tool color-btn">
        <div id="crumble" onclick="applyFilter('crumble')">Кришитися</div>
      </button>
      <button class="action-tool color-btn">
        <div id="sunset" onclick="applyFilter('sunset')">Захід сонця</div>
      </button>
      <button class="action-tool color-btn">
        <div id="prison" onclick="applyFilter('prison')">В'язниця</div>
      </button>
    </div>
  </div>
  <script src="./js/app.js"></script>
  <script>
    for (let e of document.querySelectorAll(
      'input[type="range"].slider-progress'
    )) {
      e.style.setProperty("--value", e.value);
      e.style.setProperty("--min", e.min == "" ? "0" : e.min);
      e.style.setProperty("--max", e.max == "" ? "100" : e.max);
      e.addEventListener("input", () =>
        e.style.setProperty("--value", e.value)
      );
    }
  </script>

  <script>
    if('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('./serviceworker.js')
          .then((reg) => console.log('Success: ', reg.scope))
          .catch((err) => console.log('Failure: ', err))
      })
    }
  </script>
</body>

</html>