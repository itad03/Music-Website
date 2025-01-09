<?php
class database
{
    protected $server = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "music_database";
    protected $link;

    public function __construct()
    {
        try {
            $this->link = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }
    public function fetch($query)
    {
        $row = null;
        if ($sql = $this->link->query($query)) {
            while ($data = mysqli_fetch_assoc($sql)) {
                $row[] = $data;
            }
        }
        return $row;
    }
}
class comments extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $name = $_POST['name_hot'];
        $anh = $_POST['img_hot'];
        $price = $_POST['price_hot'];
        $fromto = $_POST['fromto_hot'];
        $detail = $_POST['detail_hot'];
        $anh = $_FILES['img_hot']['name'];
        if ($anh != null) {
            $path = "images/";
            $tmp_name = $_FILES['img_hot']['tmp_name'];
            $anh = $_FILES['img_hot']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into tour_hot(name_hot,img_hot,price_hot,detail_hot,from_to_hot) value ('$name','$anh',$price,'$detail','$fromto')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin.php");
        }
    }
}

class songs extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $songName = $_POST['songName'];
        $lyric = $_POST['lyric'];
        $anh = $_FILES['poster']['name'];
        if ($anh != null) {
            $path = "img/";
            $tmp_name = $_FILES['poster']['tmp_name'];
            $anh = $_FILES['poster']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into songs(songName,poster,lyric) value ('$songName','$anh','$lyric')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin_song.php");
        }
    }
}

class playlist extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $songName = $_POST['songName'];
        $lyric = $_POST['lyric'];
        $anh = $_FILES['poster']['name'];
        if ($anh != null) {
            $path = "img/";
            $tmp_name = $_FILES['poster']['tmp_name'];
            $anh = $_FILES['poster']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into songs(songName,poster,lyric) value ('$songName','$anh','$lyric')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin_song.php");
        }
    }
}

class categories extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];
        $query = "insert into category(category_name,description) value ('$category_name','$description')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin_category.php");
        }
    }

}

class active_song extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $name = $_POST['name_hot'];
        $anh = $_POST['img_hot'];
        $price = $_POST['price_hot'];
        $fromto = $_POST['fromto_hot'];
        $detail = $_POST['detail_hot'];
        $anh = $_FILES['img_hot']['name'];
        if ($anh != null) {
            $path = "images/";
            $tmp_name = $_FILES['img_hot']['tmp_name'];
            $anh = $_FILES['img_hot']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into tour_hot(name_hot,img_hot,price_hot,detail_hot,from_to_hot) value ('$name','$anh',$price,'$detail','$fromto')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin.php");
        }
    }
}

class active extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $name = $_POST['name_hot'];
        $anh = $_POST['img_hot'];
        $price = $_POST['price_hot'];
        $fromto = $_POST['fromto_hot'];
        $detail = $_POST['detail_hot'];
        $anh = $_FILES['img_hot']['name'];
        if ($anh != null) {
            $path = "images/";
            $tmp_name = $_FILES['img_hot']['tmp_name'];
            $anh = $_FILES['img_hot']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into tour_hot(name_hot,img_hot,price_hot,detail_hot,from_to_hot) value ('$name','$anh',$price,'$detail','$fromto')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin.php");
        }
    }
}

class like extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $name = $_POST['name_hot'];
        $anh = $_POST['img_hot'];
        $price = $_POST['price_hot'];
        $fromto = $_POST['fromto_hot'];
        $detail = $_POST['detail_hot'];
        $anh = $_FILES['img_hot']['name'];
        if ($anh != null) {
            $path = "images/";
            $tmp_name = $_FILES['img_hot']['tmp_name'];
            $anh = $_FILES['img_hot']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into tour_hot(name_hot,img_hot,price_hot,detail_hot,from_to_hot) value ('$name','$anh',$price,'$detail','$fromto')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin.php");
        }
    }
}

class library extends database
{
    public function create()
    {
        ini_set('display_errors', 0);
        $name = $_POST['name_hot'];
        $anh = $_POST['img_hot'];
        $price = $_POST['price_hot'];
        $fromto = $_POST['fromto_hot'];
        $detail = $_POST['detail_hot'];
        $anh = $_FILES['img_hot']['name'];
        if ($anh != null) {
            $path = "images/";
            $tmp_name = $_FILES['img_hot']['tmp_name'];
            $anh = $_FILES['img_hot']['name'];
            move_uploaded_file($tmp_name, $path . $anh);
        }
        $query = "insert into tour_hot(name_hot,img_hot,price_hot,detail_hot,from_to_hot) value ('$name','$anh',$price,'$detail','$fromto')";
        if ($sql = $this->link->query($query)) {
            echo "<script>alert('SUCCESS')</script>";
            header("location: admin.php");
        }
    }
}