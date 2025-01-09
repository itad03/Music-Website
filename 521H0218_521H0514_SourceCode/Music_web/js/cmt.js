// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("cmt");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks the button, open the modal
// btn.onclick = function () {
//     modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function () {
//     modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }

// Lấy modal và button mở modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("cmt");

// Lấy button đóng modal và content của modal
var span = document.getElementById("closeComment");
var modalContent = document.querySelector(".modal-content");
var cmtContent = document.querySelector(".content-cmt");
// Khi người dùng nhấn nút mở modal
btn.onclick = function () {
  var songID = JSON.parse(window.localStorage.getItem("songID"));
  var comments = JSON.parse(window.localStorage.getItem("comments"));
  let row = "";
  for (var i in comments) {
    if (comments[i].SongID == songID) {
      row +=
        "<div><div class='text-justify darker mt-4 float-right'><img src = 'https://i.imgur.com/CFpa3nK.jpg' class='rounded-circle' width='40' height='40'>";
      row += "<h4>user1</h4>"; // + comments[i].SongID + "</h4>";
      row += "<span>" + comments[i].CommentDate + "</span>";
      row += "<br><p>" + comments[i].CommentText + "</p>";
      row += "</div>";
    }
  }
  document.getElementById("card_comment").innerHTML = row;
  modal.style.display = "block";
};

// Khi người dùng nhấn nút đóng modal
span.onclick = function () {
  modal.style.display = "none";
};

// Khi người dùng click nút Gửi bình luận
var btnCmt = document.querySelector(".btn-cmt");
btnCmt.onclick = function () {
  // Lấy nội dung bình luận từ ô input
  var contentCmt = document.querySelector(".input-cmt").value;

  // Nếu ô input không trống
  if (contentCmt.trim() != "") {
    // Gửi dữ liệu bình luận đến server để lưu vào cơ sở dữ liệu
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "post_comment.php", true);
    xhr.onload = function () {
      console.log(this.responseText);
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("function="+contentCmt);
    window.location.reload();
  }
};
