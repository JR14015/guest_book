<!DOCTYPE html>
<html lang="en" ng-app="GuestBook">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="GuestBook">

    <title>Гостевая книга</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    
    <!-- custom CSS for the page -->
    <link href="<?= asset('css/messages.css') ?>" rel="stylesheet">


        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
    
  </head>

  <body>
 <div class="content">
                <div class="title m-b-md">
                    Гостевая книга
                </div>
              </div>

    <!-- MAIN CONTENT AND INJECTED VIEWS -->
    <div id="main">
      <!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-lg " data-toggle="modal" data-target="#exampleModal">
  Добавить новое сообщение
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить новое сообщение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="frmAddMessage" class="form-horizontal" novalidate="" method="post">

                  <div class="form-group error">
                    <label for="messageName" class="col-sm-3 control-label">Ваше имя</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control has-error" id="name" name="name" placeholder="Ваше имя" value="" 
                      ng-model="message.name" ng-required="true">
                      <span class="help-inline" 
                      ng-show="frmAddBurger.text.$invalid && frmAddBurger.text.$touched">Это поле обязательное</span>
                    </div>
                  </div>
                  <div class="form-group error">
                    <label for="messageEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control has-error" id="email" name="email" placeholder="Э-почта" value="" 
                      ng-model="message.email" ng-required="true">
                      <span class="help-inline" 
                      ng-show="frmAddBurger.email.$invalid && frmAddBurger.email.$touched">Это поле обязательное</span>
                    </div>
                  </div>
                  <div class="form-group error">
                    <label for="messageLink" class="col-sm-3 control-label">Сайт</label>
                    <div class="col-sm-9">
                      <input class="form-control" rows="3" class="form-control has-error" id="link" name="link" placeholder="Ссылка на ваш сайт" value="" ng-model="message.link" ng-required="false" >
                    </div>                    
                  </div>

                  <div class="form-group error">
                    <label for="messageText" class="col-sm-3 control-label">Сообщение</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" class="form-control has-error" id="text" name="text" placeholder="Текст сообщения" value="" ng-model="message.text" ng-required="true" ></textarea> 
                    </div>                    
                  </div>



                     <div class="col-sm-9 col-sm-offset-3">
                    {!! csrf_field() !!}
                    <!-- recaptcha -->
                    {{Request::is('contactd')}}
                            <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>                     
                    <!-- Button -->
    </div>
<button type="submit" name="send" class="btn btn-primary btn-lg btn-block">Добавить новое сообщение  <span class="fa fa-paper-plane-o"></span></button>
                       

      
                </form>
      </div>
    </div>
  </div>
</div>
        <!-- this is where content will be injected -->
        <div ng-view></div>
    </div>

    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="<?= asset('js/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('js/angular/angular-route.min.js') ?>"></script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    
    <!-- AngularJS Application Scripts -->
    <script src="<?= asset('app/app.module.js') ?>"></script>
    <script src="<?= asset('app/messages/messages.controller.js') ?>"></script>
    <script src="<?= asset('app/hamburger/hamburger.controller.js') ?>"></script>

  <script type="text/javascript">
    
    function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
  </script>
        
        

  </body>
</html>
