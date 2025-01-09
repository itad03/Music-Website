<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "music_database";


$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<?php
// Lấy dữ liệu bình luận từ database
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

// Hiển thị dữ liệu lên trang web
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "<div class='comment'>" . $row["username"] . ": " . $row["comment"] . "</div>";
//     }
// }
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $comment = $_POST["comment"];

    // Thêm bình luận mới vào database
    $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
    if ($conn->query($sql) === TRUE) {
        echo "Bình luận của bạn đã được thêm thành công.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php


if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['comment'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];
    $time = date('H:i d/m/y');
    file_put_contents('comments.txt', "$name;$type;$comment;$time\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Music</title>
    <link rel="stylesheet" href="music.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .navbar-nav {
            width: 100%;
        }

        @media(min-width:568px) {
            .end {
                margin-left: auto;
            }
        }

        @media(max-width:768px) {
            #post {
                width: 100%;
            }
        }

        #clicked {
            padding-top: 1px;
            padding-bottom: 1px;
            text-align: center;
            width: 100%;
            background-color: #ecb21f;
            border-color: #a88734 #9c7e31 #846a29;
            color: black;
            border-width: 1px;
            border-style: solid;
            border-radius: 13px;
        }

        #profile {
            background-color: unset;

        }

        #post {
            margin: 10px;
            padding: 6px;
            padding-top: 2px;
            padding-bottom: 2px;
            text-align: center;
            background-color: #ecb21f;
            border-color: #a88734 #9c7e31 #846a29;
            color: black;
            border-width: 1px;
            border-style: solid;
            border-radius: 13px;
            width: 50%;
        }

        .avatar {
            width: 100px;
            height: 100px;
        }

        body {
            background-color: black;
        }

        #nav-items li a,
        #profile {
            text-decoration: none;
            color: rgb(224, 219, 219);
            background-color: black;
        }


        .comments {
            margin-top: 5%;
            margin-left: 20px;
        }

        .darker {
            border: 1px solid #ecb21f;
            background-color: black;
            float: right;
            border-radius: 5px;
            padding-left: 40px;
            padding-right: 30px;
            padding-top: 10px;
        }

        .comment {
            border: 1px solid rgba(16, 46, 46, 1);
            background-color: rgba(16, 46, 46, 0.973);
            float: left;
            border-radius: 5px;
            padding-left: 40px;
            padding-right: 30px;
            padding-top: 10px;

        }

        .comment h4,
        .comment span,
        .darker h4,
        .darker span {
            display: inline;
        }

        .comment p,
        .comment span,
        .darker p,
        .darker span {
            color: rgb(184, 183, 183);
        }

        h1,
        h4 {
            color: white;
            font-weight: bold;
        }

        label {
            color: rgb(212, 208, 208);
        }

        #align-form {
            margin-top: 20px;
        }

        .form-group p a {
            color: white;
        }

        #checkbx {
            background-color: black;
        }

        #darker img {
            margin-right: 15px;
            position: static;
        }

        .form-group input,
        .form-group textarea {
            background-color: black;
            border: 1px solid rgba(16, 46, 46, 1);
            border-radius: 12px;
        }

        form {
            border: 1px solid rgba(16, 46, 46, 1);
            background-color: rgba(16, 46, 46, 0.973);
            border-radius: 5px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php
    include("php_set.php");
    $songs = new like();
    $sql = "select * from likes";
    $rows = $songs->fetch($sql);

    $songs2 = new songs();
    $sql2 = "select * from songs";
    $rows2 = $songs2->fetch($sql2);
    ?>
    <header>
        <div class="menu_side">
            <h1>PLAY MUSIC</h1>
            <div class="playlist">
                <h4 class="active">
                    <i class="ri-home-2-fill"></i>
                    <a href="playlist.php" style="color:white">
                        <p class="title">Home</p>
                    </a>
                </h4>
                <h4 class="active">
                    <i class="ri-heart-fill"></i>
                    <a href="like_song.php" style="color:white">
                        <p class="title">Likes Songs</p>
                    </a>
                </h4>
                <h4 class="active">
                    <i class="ri-disc-fill"></i>
                    <a href="my_play_list.php" style="color:white">
                        <p class="title">Playlist</p>
                    </a>
                </h4>
                <h4 class="active">
                    <i class="ri-play-list-line"></i>
                    <a href="library.php" style="color:white">
                        <p class="title">Library</p>
                    </a>
                </h4>
            </div>
            <div class="menu_song">
                <h1>TRENDING</h1>
                <li class="songItem">
                    <span>01</span>
                    <img src="img/honcayeu.jpg" alt="" />
                    <h5>
                        <br />
                        <div class="subtitle"></div>
                    </h5>
                    <i class="bi playlistplay ri-play-circle-fill" id="1"></i>
                </li>
                <li class="songItem">
                    <span>02</span>
                    <img src="img/tinhyeudensau.jpg" alt="" />
                    <h5>
                        <br />
                        <div class="subtitle"></div>
                    </h5>
                    <i class="bi playlistplay ri-play-circle-fill" id="2"></i>
                </li>
                <li class="songItem">
                    <span>03</span>
                    <img src="" alt="" />
                    <h5>
                        <br />
                        <div class="subtitle"></div>
                    </h5>
                    <i class="bi playlistplay ri-play-circle-fill" id="3"></i>
                </li>
                <li class="songItem">
                    <span>04</span>
                    <img src="img/4.png" alt="" />
                    <h5>
                        <br />
                        <div class="subtitle"></div>
                    </h5>
                    <i class="bi playlistplay ri-play-circle-fill" id="4"></i>
                </li>
                <li class="songItem">
                    <span>05</span>
                    <img src="" alt="" />
                    <h5>
                        <br />
                        <div class="subtitle"></div>
                    </h5>
                    <i class="bi playlistplay ri-play-circle-fill" id="5"></i>
                </li>

            </div>
        </div>

        <div class="song_side">
            <nav>
                <ul>
                    <li>DISCOVER<span></span></li>
                    <li>MY LIBRARY<span></span></li>
                    <li>RADIO<span></span></li>
                </ul>

                <div class="search">
                    <!-- <i class="ri-search-line"></i> -->
                    <i class="ri-search-line icon-search"></i>
                    <input type="text" placeholder="Search Music...">
                    <div class="search_results">
                        <!-- <a href="" class="card">
                            <img src="img/1.jpg" alt="">
                            <div class="content">
                                Nếu Lúc Đó
                                <div class="subtitle">Tlinh</div>
                            </div>
                        </a>
                        <a href="" class="card"></a> -->
                    </div>
                </div>


                <a class="logout" href="logout.php">LOG OUT</a>
            </nav>

            <div class="popular_song">
                <div class="h4">
                    <h4>My Like Songs</h4>
                    <div class="btn_song">
                        <i class="bi ri-arrow-left-line" id="pop_song_left"></i>
                        <i class="bi ri-arrow-right-line" id="pop_song_right"></i>
                    </div>
                </div>
                <div class="pop_song">
                    <?php foreach ($rows as $row) {
                        foreach ($rows2 as $row2) {
                            if ($row['songID'] === $row2['id']) {
                                ?>
                                <li class="songItem2">
                                    <div class="img_play">
                                        <img src=<?php echo $row2['poster']; ?> alt="" />
                                        <i class="bi playlistplay ri-play-circle-fill" id=<?php echo $row2['id']; ?>></i>
                                    </div>
                                    <h5>
                                        <?php echo $row2['songName']; ?><br>
                                        <div class="subtitle"></div>
                                    </h5>
                                </li>
                            <?php }
                        }
                    } ?>
                </div>
            </div>
            <!-- ---------------------------------------------------------------------------------- -->

        </div>

    </header>

    <div id="track">
        <!-- animation -->
        <div class="wave" id="wave">
            <div class="wavel"></div>
            <div class="wavel"></div>
            <div class="wavel"></div>
        </div>

        <div class="infomation-audio">
            <div class="image"><img src="img/3.jpg" alt="" id="circle-track" /></div>
            <h5 id="title" style="color: white; margin-top: auto; margin-bottom: auto">
                <span class="main-title"> Hơn cả yêu </span>
                <br />
                <span class="subtitle">Đức Phúc</span>
            </h5>
        </div>

        <div>
            <div class="audio-control">
                <i class="ri-shuffle-line" id="back" title="Bật phát ngẫu nhiên"></i>
                <i class="ri-skip-back-line" id="back"></i>
                <div class="iconplay"> <i class="ri-play-circle-line" id="iconplay"></i></div>
                <i class="ri-skip-forward-line" id="next"></i>
                <i class="ri-repeat-line" id="next" title="Bật phát lại"></i>
            </div>
            <div class="audio-range">
                <div id="currentStart">0:00</div>
                <input type="range" id="seek" min="0" max="100" />
                <div id="currentEnd">3:33</div>
            </div>
        </div>


        <!-- <div class="audio-control">
            <i class="ri-shuffle-fill"></i>
            <i class="ri-repeat-line"></i>
        </div> -->

        <div class="audio-control high">
            <i class="ri-volume-up-line" id="vol_icon"></i>
            <div class="audio-range">
                <input type="range" min="0" max="100" id="volume" />
                <div class="icon_back">
                    <i class="ri-heart-line" id="like"></i>
                    <i class="ri-chat-1-line" id="cmt"></i>
                    <i class="ri-file-list-line" id="lyric"></i>
                    <div id="lyricModal" class="modal">
                        <div class="modal-content">
                            <div class="header-modal">
                                <span>Lời bài hát</span>
                                <span class="close">&times;</span>
                            </div>
                            <div class="content-lyric" style="overflow:scroll;overflow-x: hidden;">
                                Em hay hỏi anh Rằng anh yêu em nhiều không? Anh không biết phải nói thế nào Để đúng với
                                cảm xúc trong lòng Khi anh nhìn em Là anh thấy cuộc đời anh Là quá khứ và cả tương lai
                                Là hiện tại không bao giờ phai Tình yêu trong anh vẫn luôn thầm lặng Nhưng không có
                                nghĩa không rộng lớn Chỉ là anh đôi khi khó nói nên lời Mong em hãy cảm nhận thôi Cao
                                hơn cả núi, dài hơn cả sông Rộng hơn cả đất, xanh hơn cả trời Anh yêu em, anh yêu em
                                nhiều thế thôi Vượt qua ngọn gió, vượt qua đại dương Vượt qua cả những áng mây thiên
                                đường Dẫu có nói bao điều Cảm giác trong anh bây giờ có lẽ hơn cả yêu Anh vẫn còn nhớ
                                Lần đầu tiên ta gặp nhau Chẳng biết trước lần đó sẽ là Lần cuối anh yêu một ai trên đời
                                Anh không còn mơ Gặp và yêu ai được nữa Giờ anh đã có em đây rồi Cùng em đi hết quãng
                                đường đời Tình yêu trong anh vẫn luôn thầm lặng Nhưng không có nghĩa không rộng lớn Chỉ
                                là anh đôi khi khó nói nên lời Mong em hãy cảm nhận thôi Cao hơn cả núi, dài hơn cả sông
                                Rộng hơn cả đất, xanh hơn cả trời Anh yêu em, anh yêu em nhiều thế thôi Vượt qua ngọn
                                gió, vượt qua đại dương Vượt qua cả những áng mây thiên đường Dẫu có nói bao điều Cảm
                                giác trong anh bây giờ có lẽ hơn cả yêu Cao hơn cả núi, dài hơn cả sông Rộng hơn cả đất,
                                xanh hơn cả trời Anh yêu em, anh yêu em nhiều thế thôi Vượt qua ngọn gió, vượt qua đại
                                dương Vượt qua cả những áng mây thiên đường Dẫu có nói bao nhiêu Cảm giác trong anh bây
                                giờ có lẽ hơn cả yêu Cảm giác trong anh bây giờ Có lẽ hơn cả yêu
                            </div>
                        </div>
                    </div>
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <div class="header-modal">
                                <span>Bình Luận</span>
                                <span class="close" id="closeComment">&times;</span>
                            </div>
                            <div class="content-cmt" id="card_comment">
                                <?php
                                $comment = new comments();
                                $sql = "select * from comments";
                                $rows = $comment->fetch($sql);
                                ?>
                                <script>
                                    var comments = <?php echo json_encode($rows); ?>;
                                    window.localStorage.setItem("comments", JSON.stringify(comments));
                                </script>
                            </div>
                            <div class="footer-modal">
                                <div class="footer-container">
                                    <input class="input-cmt" type="text" placeholder="Nhập bình luận của bạn" />
                                    <button class="btn-cmt">Gửi</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- <i class="ri shuffle ri-music-line"></i> -->
                    <a href="" download id="download_music"><i class="ri-download-line high"></i></a>
                </div>
            </div>


        </div>

        <audio src=""></audio>

    </div>
    <script src="js/app.js"></script>
    <script src="js/button/back_next.js"></script>
    <script src="js/button/left_right.js"></script>
    <script src="js/button/pause_continute.js"></script>
    <script src="js/button/shuffle.js"></script>
    <script src="js/button/volume.js"></script>
    <script src="js/show/show_info.js"></script>
    <script src="js/show/show_time.js"></script>
    <script src="js/search.js"></script>
    <script src="js/cmt.js"></script>
    <script src="js/lyric.js"></script>
</body>

</html>