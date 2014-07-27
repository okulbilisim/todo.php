<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>To Do List</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">

</head>

<body>

<div class="container" id="main">
    <div class="div-header">
        <img class="img-header" src="images/To-do.png"/>
    </div>
    <div>
        <form class="form-horizontal" role="form" id="form">
            <div class="well">
                <div class="form-group form-group-lg" >
                    <div class="col-sm-12">
                        <input class="form-control" type="text" id="formGroupInputLarge" placeholder="What do you need to do ?">
                        <span  class="help-block" id="helper">Eg. Say "I love you" to mom. :)</span>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <label class="checkbox">
        <input type="checkbox" value="">
        Mark all as complete
    </label>

    <div id="todoContainer">
        <div class="well" id="todoTemplate" style="display: none;">
            <span class="items">[TODO_TITLE]</span>

            <img class="icons deleteLink" title="Delete" src="images/delete.png"/>
            <img class="icons editLink" title="Edit" src="images/edit.png"/>
            <img class="icons doneLink" title="Done" src="images/done.png" />
        </div>
    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.icons').tooltip();

    var input = $('#formGroupInputLarge');
    var template = $('#todoTemplate');
    var todoContainer = $('#todoContainer');
    $('#form').bind('keyup keypress', function(e)
    {
        if (e.keyCode == 13)
        {
            e.preventDefault();
        }
    });

    input.keydown(function(e)
    {
        // enter tusu
        if (e.keyCode == 13)
        {
            e.preventDefault();

            if (input.val().length == 0)
            {
                alert('You should enter at least 1 character.');
                return;
            }

            var newTodo = $('<div class="well"></div>');

            var val = input.val().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g, "&quot;");
            newTodo.html(template.html().replace('[TODO_TITLE]', val));
            todoContainer.append(newTodo);

            // clear input and focus
            input.val('');
            input.focus();

            newTodo.find('img.deleteLink').click(function(e)
            {
                console.log("Found");
                e.preventDefault();
                setTimeout(function() { newTodo.remove(); }, 0);
            })

            newTodo.find('img.doneLink').click(function(e)
            {
                console.log("Found");
                e.preventDefault();

                var itemTitle = newTodo.find('span.items');
                console.log("Found element", itemTitle.length);
                itemTitle.toggleClass('item-done');
            });

            newTodo.find('img.editLink').click(function(e)
            {
                e.preventDefault();
                var row = newTodo.find('span.items');
                if (row.find('input').length === 0)
                {
                    var editInput = $('<input type="text" />');
                    editInput.val(row.html());

                    row.html('');
                    row.append(editInput);

                    editInput.keydown(function(e)
                    {
                        if (e.keyCode == 13)
                        {
                            e.preventDefault();
                            var value = editInput.val();
                            if (value.length < 1)
                            {
                                alert('You should enter at least 1 character.');
                                return;
                            }

                            row.html(value);
                        }
                    });
                }
            });
            $('.icons').tooltip();
        }
    });

</script>
</body>
</html>
