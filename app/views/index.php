<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title></title>
        <link rel="stylesheet" type="text/css" href="/assets/css/app.css"/>
    </head>
    <body>

<div ng-app>
  <div id="todophp-app" ng-controller="tcontroller">
    <header>
        <h1>Todos app with angular+php</h1>
        <input id="new-todo" type="text" ng-model="title" placeholder="new todo item" ng-keyup="addTodo()"/>
    </header>

    <section id="main" style="display: block;">
        
        <ul id="todo-list" class="unstyled">
          <li ng-repeat="todo in todos" ng-dblclick="toggleEdit()">
            <div class="view" ng-keyup="editTodo()">
              <input type="checkbox" ng-model="todo.done"/>
              <span class="done-{{todo.done}}" >{{todo.text}}</span>
                <a href="#" ng-click="deleteOne(todo)">x</a>
            </div>
            <input class="edit" type="text" ng-model="todo.text" ng-keyup="editDone(todo)"/>
          </li>
        </ul>
    </section>
    
  </div>
</div>

        <script src="/assets/vendor/angular/angular.min.js"></script>
        <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="/assets/js/app.js"></script>
    </body>
</html>

