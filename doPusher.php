
<?php include('header.php');
include('includes/dbconfig.php');
session_start();
  require __DIR__ . '/vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $options = array(
    'cluster' => 'us2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '5e70a60587f7094afb3f',
    '64e320268ba0f1daa85b',
    '1011301',
    $options
  );

  $data['message'] = 'hello my friend, you have news';
  $pusher->trigger('my-channel', 'my-event', $data);

}
?>
<div>
	<img src="https://media1.tenor.com/images/784923250a0c8f9951c0694f98eeb5b0/tenor.gif?itemid=16137010" alt="this slowpoke moves"  width=250/>
	<img src="https://media1.tenor.com/images/784923250a0c8f9951c0694f98eeb5b0/tenor.gif?itemid=16137010" alt="this slowpoke moves"  width=250/>
	<img src="https://media1.tenor.com/images/784923250a0c8f9951c0694f98eeb5b0/tenor.gif?itemid=16137010" alt="this slowpoke moves"  width=250/>
	<img src="https://media1.tenor.com/images/784923250a0c8f9951c0694f98eeb5b0/tenor.gif?itemid=16137010" alt="this slowpoke moves"  width=250/>
	
</div>
<body>
  <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5e70a60587f7094afb3f', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</body>
