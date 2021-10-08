
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title>Опрос</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    </head>
    <body class="text-center">
        <div id=app>
        <div style="background-color:#eeeee7">
            <div class="col align-self-center mb-5 mt-5">
            <div class="row justify-content-center">
              <h1 class="h3 mt-2 mb-5 font-weight-normal">Пожалуйста заполните форму</h1>
              <div class="col col-lg">
              </div>
                <div class="col sizeMobile" >
                        <form class="form-signin flex-grow" action="" method="post">
                             <label for="name"  class="sr-only">Введите Имя</label>
                             <input type="text" id="name" name="name" class="form-control mt-2" placeholder="Имя" required="" autofocus="">
                             <label for="family" class="sr-only">Введите Фамилию</label>
                             <input type="text" id="family" name="family" class="form-control mt-2" placeholder="Фамилия" required="" autofocus="">
                             <label for="Otch" class="sr-only">Введите Отчество</label>
                             <input type="text" id="Otch" name="Otch" class="form-control mt-2" placeholder="Отчество" required="" autofocus="">
                             <label for="email" class="sr-only">Введите E-Mail</label>
                             <input type="email" onkeydown="this.style.width = ((this.value.length + 5) * 8) + 'px';" style="min-width: 100%;" id="email" name="email" class="form-control mt-2" placeholder="Email" required="" autofocus="">
                             <label for="Phone" class="sr-only">Введите номер телефона</label>
                             <input type="tel"  id="Phone" name="Phone" class="form-control mt-2" placeholder="Телефон" required="">
                            <div v-if="!isShow1">
                             <button class="btn btn-lg btn-success btn-block mt-2 mb-3">Отправить</button></br>
                             </div>
                            </form>

                           <button class="btn btn-success"><a href="main.php">Далее</a></button>  
                        
<a href="opros.php"> ssss</a>
                            
                      </div>
                      <div class="col col-lg">
                      </div>
                </div>
            </div>
                <hr/>
              </div>
             </div>
             </div>
                </body>


        <script src="https://unpkg.com/vue@next"></script>  
        <script src="app.js"></script>     
    </body>

</html>