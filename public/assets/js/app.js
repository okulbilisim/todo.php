function tcontroller($scope) {
  $scope.todos = [];
  $scope.markAll = false;
    
  $scope.addTodo = function() {
      if(event.keyCode == 13 && $scope.title){
          $scope.todos.push({text:$scope.title, done:false});
          $scope.title = '';
      }
  };
    
}


