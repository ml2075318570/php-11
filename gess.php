<?php

if (empty($_COOKIE['num']) || empty($_GET['num'])) {

  $num = rand(0,100);
  
  setcookie('num',$num);

} else {

  $count = empty($_COOKIE['count']) ? 0 : (int)$_COOKIE['count'];

 
  if ($count < 10) {
    
    // setcookie('tip',25);
    // $tip = $_COOKIE['tip'];    

    $result = (int)$_GET['num'] - (int)$_COOKIE['num'];

    $_COOKIE['tip'] = empty($_COOKIE['tip']) ? '' : $_COOKIE['tip'] . ' ' . $_GET['num'];

    // $set = (int)$_GET['num'];
    // setcookie('tip',$set);
    // echo $_COOKIE['tip'];
    if ($result == 0) {

      $message = '猜对了';

      setcookie('num');
      setcookie('count');
      setcookie('tip');
    } elseif ($result > 0) {

      $message = '太大了';

    } elseif ($result < 0) {

      $message = '太小了';
    } 
    setcookie('count',$count+1);

  } else {

    $message = 'looooooooooooooooooooow!';

    setcookie('num');
    setcookie('count');
    setcookie('tip');
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个 0 - 100 的数字，你需要在仅有的 10 机会之内猜对它。</p>
  <?php if (isset($message)): ?>
  <p><?php echo $message; ?></p>
  <?php endif ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜" id="num">
    <?php if (isset($_COOKIE['tip'])): ?>
      <p><?php echo $_COOKIE['tip']; ?></p>
    <?php endif ?>
    <button type="submit" id="btn">试一试</button>
  </form>
</body>
</html>
