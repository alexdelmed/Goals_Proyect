<?php
    require __DIR__.'/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/goals-proyect-firebase-adminsdk-ea2q2-2f9d5fdb86.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://goals-proyect.firebaseio.com/')
        ->create('');

    $database = $firebase->getDatabase();

?>
