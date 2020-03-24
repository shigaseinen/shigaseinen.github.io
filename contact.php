<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        // POSTでのアクセスでない場合
        $name = '';
        $email = '';
        $subject ='';
        $message ='';
        $err_msg ='';
        $complete_msg ='';

  } else {
        // フォームがサブミットされた場合（POST処理）
        // 入力された値を取得する
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // エラーメッセージ・完了メッセージの用意
        $err_msg = '';
        $complete_msg = '';

        // 空チェック
        if ($name == '' || $email == '' || $subject == '' || $message == '') {
          $err_msg = '全ての項目を入力してください。';
        }

        // エラーなし（全ての項目が入力されている）
        if ($err_msg == '') {
            $to = 'chirotherapy8008@gmail.com'; //管理者のメールアドレスなど送信先を指定
            $headers = "From: " . $email . "\r\n";

            //本文の最後に名前を追加
            $message .= "\r\n\r\n" .$name;

            // メール送信
            mb_send_mail($to, $subject, $message, $headers);

            // 完了メッセージ
            $complete_msg = '送信されました！';

            // 全てクリア
            $name = '';
            $email = '';
            $subject = '';
            $message = '';
        }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>滋賀県青年団体連合会</title>
  <link rel="stylesheet" href="contact.css">
</head>
<body>
<!-- Contact -->
<section class="sec contact" id="contact">
  <div class="content">
    <div class="mxw800p">
      <h3>お問い合わせ</h3>
    </div>

    <?php if ($err_msg !=''): ?>
        <div class="alert alert-danger">
          <?php echo $err_msg; ?>
        </div>
    <?php endif; ?>

    <?php if ($complete_msg != ''): ?>
        <div class="alert alert-success">
          <?php echo $complete_msg; ?>
        </div>
    <?php endif; ?>
    
    <div class="contactForm">
      <form method="post">
        <div class="row100">
          <div class="inputBx50">
            <input type="text" name="" placeholder="Full Name">
          </div>
          <div class="inputBx50">
            <input type="text" name="" placeholder="Email Address">
          </div>
        </div>
        <div class="row100">
          <div class="inputBx100">
            <textarea placeholder="メッセージ"></textarea>
          </div>
        </div>
        <div class="row100">
          <div class="btn">
            <a href="" id="btn">Send your Message </a>
          </div>
        </div>
      </form>
    </div>
    <br><br><br>
    <div class="sci">
      <ul>
        <li><a href="https://www.facebook.com/shigakendan/"><img src="facebook.png"></a></li>
        <li><a href="#"><img src="twitter.png"></a></li>
      </ul>
    </div>
    <p class="copyright">〒520-0851<br>滋賀県大津市唐橋町23-2<br>アーブしが　滋賀県青年会館内<br><a href="#">滋賀県青年団体連合会</a></p>
  </div>
</section>
</body>
