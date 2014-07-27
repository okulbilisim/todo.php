<?php
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', true);

$app = new \Slim\Slim(array('debug' => true, 'templates.path' => __DIR__ . '/../templates/'));
$db = new mysqli('127.0.0.1', 'root', '123456', 'todo');

$app->get('/', function() use ($app, $db)
{
    $result = $db->query("select * from todo order by id asc");
    $data = array();
    foreach ($result->fetch_all(MYSQLI_ASSOC) as $row)
    {
        $data[] = array('id' => $row['id'], 'todo' => $row['todo']);
    }

    $app->render('todo.php', array('data' => $data));
});

$app->post('/insert', function() use ($app, $db)
{
    $todo = $app->request->post('todo');
    if (empty($todo))
    {
        echo 'error:Todo should not be empty.';
        return;
    }

    $stmt = $db->prepare("insert into todo (todo) VALUES(?)");
    $stmt->bind_param('s', $todo);
    $stmt->execute();

    echo 'ok:' . $stmt->insert_id;
});

$app->post('/update/:id', function($id) use ($app, $db)
{
    $stmt = $db->prepare("select * from todo where id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row)
    {
        echo 'error:data bulunamadi';
        return;
    }

    $todo = $app->request->post('todo');
    if (empty($todo))
    {
        echo 'error:Todo should not be empty.';
        return;
    }

    $stmt = $db->prepare("update todo SET todo = ? where id = ?");
    $stmt->bind_param('si', $todo, $id);
    $stmt->execute();

    echo 'ok:' . $id;
});

$app->run();
$db->close();