function tcontroller($scope) {
  $scope.todos = [];
  $scope.markAll = false;
    
  $scope.addTodo = function() {
      if(event.keyCode == 13 && $scope.title){
          $scope.todos.push({text:$scope.title, done:false});
          $scope.title = '';
      }
  };

  $scope.toggleEdit = function(){
  		$(event.target).parents('li').toggleClass('editing');
  };
  
  $scope.editDone = function(todo){
      if(event.keyCode == 13 && todo.text){
          $scope.toggleEdit();
      }
  };

  $scope.deleteOne = function(todo){
  		$scope.todos.splice( $scope.todos.indexOf(todo), 1 );
  };
    
}


