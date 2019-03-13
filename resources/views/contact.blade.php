<!DOCTYPE html>
<html lang="en" ng-app="GuestBook">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://drvic10k.github.io/bootstrap-sortable/Contents/bootstrap-sortable.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.js"></script>

  <script src="https://drvic10k.github.io/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>


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
  


                <form class="form-horizontal" action="/insert" method="post">
                  <div class="form-group error">
                    <label for="messageName" class="col-sm-3 control-label">Ваше имя</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control has-error" id="name" name="name" placeholder="Ваше имя" value="" 
                      ng-model="message.name" ng-required="true">
                      <span class="help-inline" 
                      ng-show="GBM.text.$invalid && GBM.text.$touched">Это поле обязательное</span>
                    </div>
                  </div>
                  <div class="form-group error">
                    <label for="messageEmail" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control has-error" id="email" name="email" placeholder="Э-почта" value="" 
                      ng-model="message.email" ng-required="true">
                      <span class="help-inline" 
                      ng-show="GBM.email.$invalid && GBM.email.$touched">Это поле обязательное</span>
                    </div>
                  </div>
                  <div class="form-group error">
                    <label for="messageLink" class="col-sm-3 control-label">Сайт</label>
                    <div class="col-sm-9">
                      <input class="form-control" rows="3" class="form-control has-error" id="web" name="web" placeholder="Ссылка на ваш сайт" value="" ng-model="message.web" ng-required="false" >
                    </div>                    
                  </div>

                  <div class="form-group error">
                    <label for="messageText" class="col-sm-3 control-label">Сообщение</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="3" class="form-control has-error" id="comment" name="comment" placeholder="Текст сообщения" value="" ng-model="message.comment" ng-required="true" ></textarea> 
                      <span class="help-inline" 
                      ng-show="GBM.comment.$invalid && GBM.comment.$touched">Это поле обязательное</span>
                    </div>                    
                  </div>

                    {!! csrf_field() !!}
                    <!-- recaptcha -->
                    {{Request::is('contactd')}}
                    <div class="form-group">

                        <div class="col-md-9">
                            <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-9 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" name="send" class="btn btn-primary btn-lg btn-block">Добавить новое сообщение <span class="fa fa-paper-plane-o"></span></button>
                        </div>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
        <!-- this is where content will be injected -->
        <table class="table  table-bordered sortable" id="Table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Ссылка</th>
                <th>Текст</th>
                <th>Дата добавления</th>
                <th>ИП</th>
                <th>Браузер</th>
                
              </tr>
              </thead>
              <tbody >
              @foreach($data as $value)
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->web}}</td>
                <td>{{$value->comment}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->ip}}</td>
                <td>{{$value->browser}}</td>
              </tr>
              @endforeach
            
            

            </tbody>
          </table> 
<div class="row justify-content-center">
                            <div class="col-xs-5" align="center">
                               {!! $data->links() !!}
                              </div>
                          </div>
        <div ng-view></div>
    </div>
    <script src="<?= asset('js/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('js/angular/angular-route.min.js') ?>"></script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    

    <script src="<?= asset('app/app.module.js') ?>"></script>
  
        
        

  </body>
</html>

</div>