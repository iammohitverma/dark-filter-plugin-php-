$(document).ready(function () {
  $(".filter-area .drivewayImg").selectAreas({
    minSize: [10, 10],
    onChanged: selectAreaReady,
    width: 800,
    areas: [
      {
        x: 10,
        y: 20,
        width: 60,
        height: 100,
      },
    ],
    overlayOpacity: 0,
  });

  // reset button
  $("#btnReset").click(function () {
    output("reset");
    $(".filter-area .drivewayImg").selectAreas("reset");
  });

  // add new point button
  $("#btnNew").click(function () {
    var areaOptions = {
      x: Math.floor(Math.random() * 200),
      y: Math.floor(Math.random() * 200),
      width: Math.floor(Math.random() * 100) + 50,
      height: Math.floor(Math.random() * 100) + 20,
    };
    output("Add a new area: " + areaToString(areaOptions));
    $(".filter-area .drivewayImg").selectAreas("add", areaOptions);
  });

  function areaToString(area) {
    return (
      (typeof area.id === "undefined" ? "" : area.id + ": ") +
      area.x +
      ":" +
      area.y +
      " " +
      area.width +
      "x" +
      area.height +
      "<br />"
    );
  }

  function output(text) {
    $("#output").html(text);
  }

  // reset onload
  // output("reset");
  // $(".filter-area .drivewayImg").selectAreas("reset");

  // selectAreaReady run when area box added
  function selectAreaReady(event, id, areas) {
    areaPointClicked();
  }

  // add class when click on areas
  function areaPointClicked() {
    $(".filter-area .select-areas-background-area").click(function (e) {
      $(".filter-area .select-areas-background-area").removeClass("selected");
      $(this).addClass("selected");
      // set value of range slider
      let currClickedVal = $(this)
        .get(0)
        .style.getPropertyValue("--opacityPercent");
      if (currClickedVal) {
        $(".filter-area .range-slider").slider(
          "option",
          "value",
          currClickedVal
        );
      }
    });
  }

  // onPageLoad single jquery ui slider
  $(".filter-area .range-slider").slider(
    {
      change: function (event, ui) {
        let slideVal = ui.value;
        let selectedArea = $(
          ".filter-area .select-areas-background-area.selected"
        );
        if (selectedArea.length == 1) {
          $(".filter-area .select-areas-background-area.selected").css(
            "opacity",
            slideVal + "%"
          );
          $(".filter-area .select-areas-background-area.selected")
            .get(0)
            .style.setProperty("--opacityPercent", slideVal);
        }
      },
    },
    "option",
    "value",
    50
  );

  // upload image
  $(".filter-area #fileToUpload").change(function (e) {
    e.preventDefault();
    let currVal = $(this).val();
    var slashLastIndex = currVal.lastIndexOf("\\");
    var result = currVal.substring(slashLastIndex + 1);
    $(this).parent().find(".path").text(result);
  });

  // ajax form submit
  $("#filterForm").submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    // console.log(formData);
    $.ajax({
      url: "upload.php",
      type: "POST",
      data: formData,
      contentType: false, //multipart form data
      processData: false,
      dataType: "json",
      success: function (data) {
        if (data.uploadOk == "1") {
          console.log(data.msg);
          previewImage();
        } else {
          console.log(data.msg);
        }
      },
    });
  });

  function previewImage() {
    let currVal = $(".filter-area #fileToUpload").val();
    var slashLastIndex = currVal.lastIndexOf("\\");
    var result = currVal.substring(slashLastIndex + 1);
    var changedImgUrl = "./uploads/images/" + result;
    $(".filter-area .drivewayImg").attr("src", changedImgUrl);
  }
});

/*****************/
// pure javascript
/*****************/

// download btn functionality
let downloadBtn = document.querySelector(".filter-area #downloadBtn");
downloadBtn.addEventListener("click", downloadWork);
function downloadWork() {
  // hide all delete btn before ready canvas
  let deleteBtns = document.querySelectorAll(".delete-area");
  deleteBtns.forEach((btn) => {
    btn.style.visibility = "hidden";
  });

  // capture div as image
  let filteredImageArea = document.querySelector(
    ".filter-area .filter-image .img-box"
  );
  let createImg;
  domtoimage
    .toPng(filteredImageArea)
    .then(function (dataUrl) {
      //window.open(dataUrl);
      createImg = new Image();
      createImg.classList.add("d-none");
      createImg.src = dataUrl;
      document.body.appendChild(createImg);
    })
    .catch(function (error) {
      console.error("oops, something went wrong!", error);
    });

  // create download btn and click by js
  setTimeout(() => {
    let downloadBtnAnchor = document.createElement("a");
    downloadBtnAnchor.href = createImg.src;
    downloadBtnAnchor.setAttribute("download", "download");
    document.body.appendChild(downloadBtnAnchor);
    downloadBtnAnchor.click();
    createImg.remove();
    downloadBtnAnchor.remove();

    // hide all delete btn before ready canvas
    deleteBtns.forEach((btn) => {
      btn.style.visibility = "visible";
    });
  }, 3000);
}
