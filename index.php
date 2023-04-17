<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dark filter</title>
    <!-- jquery ui css -->
    <link
      rel="stylesheet"
      href="./assets/jquery-ui-1.13.2.custom/jquery-ui.css"
    />
    <!-- selectareas css -->
    <link
      href="./assets/jquery-select-image-area-plugin/resources/jquery.selectareas.css"
      media="screen"
      rel="stylesheet"
      type="text/css"
    />
    <!--[if lte IE 8
      ]><link
        href="./assets/jquery-select-image-area-plugin/resources/jquery.selectareas.ie8.css"
        media="screen"
        rel="stylesheet"
        type="text/css"
      />
    <![endif]-->

    <link rel="stylesheet" href="./assets/css/custom.css" />
  </head>

  <body>
    <!-- dark filter section -->
    <section class="dark-filter-sec">
      <div class="container">
        <div class="heading text-center">
          <h2>Dark Filter Plugin</h2>
          <p>Drag your mouse to select the area for apply the filter</p>
        </div>
        <div class="filter-area">
          <div class="filter-image hide-inner">
            <div class="img-box image-decorators">
              <img
                src="./assets/img/driveway.jpg"
                alt="driveway"
                class="drivewayImg"
              />
            </div>
          </div>
          <div class="filter-options">
            <form id="filterForm">
              <div class="input-file">
                <label for="fileToUpload">
                  <input type="file" id="fileToUpload" name="fileToUpload"/>
                  <button>
                    <i>
                      <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="upload"
                        class="svg-inline--fa fa-upload fa-w-16"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                      >
                        <path
                          fill="currentColor"
                          d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                        ></path>
                      </svg>
                    </i>
                    <span class="text">Upload Image</span>
                  </button>
                  <span class="path">No file selected</span>
                </label>
              </div>
              <div class="submit-wrap">
                <input type="submit" value="Preview" class="primary-btn">
              </div>
            </form>
            <div class="range-option">
              <div class="range-slider"></div>
            </div>
            <div class="option-btns">
              <button class="primary-btn" id="btnNew">Add</button>
              <button class="primary-btn" id="btnReset">Reset</button>
              <button class="primary-btn" id="downloadBtn">Download</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- scripts -->
    <!-- jquery-3.6.4 -->
    <script src="./assets/jquery/jquery-3.6.4.min.js"></script>
    <!-- jquery-ui-1.13.2 -->
    <script src="./assets/jquery-ui-1.13.2.custom/jquery-ui.min.js"></script>
    <!-- capture div as a image -->
    <script src="./assets/js/capture-div-as-image.js"></script>
    <!-- jquery-selectareas -->
    <script src="./assets/jquery-select-image-area-plugin/jquery.selectareas.min.js"></script>
    <!-- jquery-selectareas custom -->
    <script src="./assets/js/seleact-area-custom.js"></script>
  </body>
</html>