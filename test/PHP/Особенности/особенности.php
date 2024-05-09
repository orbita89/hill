<?php


//HTTP - аутентификация
//if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="My Realm"'); //вот-так можно указать header
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Текст, отправляемый в том случае,
//    если пользователь нажал кнопку Cancel';
//    exit;
//}
//
//echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
//echo "<p>Вы ввели пароль {$_SERVER['PHP_AUTH_PW']}.</p>";

//Загрузка файлов методом POST
?>

<?php
// Проверяем, был ли файл загружен
//if (isset($_FILES['file'])) {
//    $file = $_FILES['file'];
//
//    // Проверяем наличие ошибок при загрузке файла
//    if ($file['error'] === UPLOAD_ERR_OK) {
//        $fileName = $file['name'];
//        $fileTmpName = $file['tmp_name'];
//        $fileSize = $file['size'];
//        $fileType = $file['type'];
//
//        // Перемещаем файл из временной директории в желаемую директорию на сервере
//        move_uploaded_file($fileTmpName, 'uploads/' . $fileName);
//
//        echo 'File uploaded successfully!';
//    } else {
//        echo 'Error uploading file!';
//    }
//}
//


//$a = array( 'meaning' => 'life', 'number' => 42 );
//$a['life'] = $a['meaning'];
//unset( $a['meaning'], $a['number'] );
//xdebug_debug_zval( 'a' );

//$a = array( 'one' );
//$a[] =& $a;
//xdebug_debug_zval( 'a' );

//class Foo
//{
//    public $var = '3.14159265359';
//    public $self;
//}
//
//for ( $i = 0; $i <= 1000000; $i++ )
//{
//    $a = new Foo;
//    $a->self = $a;
//}
//
//echo memory_get_peak_usage(), "\n";
//

