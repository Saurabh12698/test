<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: Roboto, 'Droid Sans', Helvetica, sans-serif;
    }

    .image_post_form .ipf_top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
        /*   height:50px; */
    }

    .image_post_form .ipf_top a .lft {
        padding: 10px 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .image_post_form .ipf_top .mid {
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .image_post_form .ipf_top .rft {
        /*   margin-left:auto;  */
        /*   margin-right:5px; */
    }

    #chide {
        padding: 10px 10px;
        font-size: 16px;
        font-weight: bold;
    }

    .image_post_form .ipf_top .rft button {
        font-size: 16px;
        background: #0ebeff;
        padding: 10px 12px;
        color: white;
        border: 0;
        /*     border-radius: 5px; */

    }

    .image_post_form .ipf_middel {
        border: 1px solid;
        height: 100vh;
        weight: 100vh;
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        background: white;
    }

    .image_post_form .ipf_bottom {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 40px;
        padding: 0 0px;
        display: flex;
        flex-direction: column;
    }

    .image_post_form .ipf_bottom #editor {
        margin-top: 20px;

    }

    [contenteditable]:focus {
        outline: 0px solid transparent;
    }

    [contentEditable=true]:empty:not(:focus):before {
        content: attr(data-text);
        color: gray;
    }

    .image_post_form .ipf_bottom .upload_image_input {
        width: 50px;
        height: 50px;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 30px;
        display: flex;
        border: 1px solid;
        box-sizing: border-box;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 2px solid gray;
    }

    .image_post_form .ipf_bottom .upload_image_input input {
        display: none;
    }

    .image_post_form .ipf_bottom .upload_image_input img {

        width: 30px;
    }

    .ipf_bottom button {
        width: 130px;
        padding: 8px;
        margin: 0 auto;
        border-radius: 5px;
        border: none;
        background: tomato;
        color: white;
    }

    /*  */

    .flyr-upload-community-list-item {
        display: flex;
        border-bottom: 1px solid #eae8e8;
    }

    .flyr-upload-community-image {
        height: 45px;
        width: 45px;
        margin-left: 17px;
    }

    .flyr-upload-community-image img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
    }

    .flyr-upload-community-name {
        padding: 3% 2% 2% 2%;
        width: 80%;
        color: #888491;
        font-size: 16px;
    }

    /*...................label..................*/
    .flyermob-checkbox-container {
        display: flex;
        width: 100%;
        padding: 3% 0%;
        position: relative;
        margin-top: 0px;
        cursor: pointer;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .flyermob-checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .flyermob-checkbox-checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        display: none;
        width: 12px;
        background-color: #eee;
    }

    /* When the checkbox is checked, add a blue background */
    .flyermob-checkbox-container input:checked~.flyermob-checkbox-checkmark {
        display: flex;
        background-color: #2196F3;
    }

    /* Style the checkmark/indicator */
    .flyermob-checkbox-container .flyermob-checkbox-checkmark:after {
        left: -9999px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .selected {
        background: #eeeeee;
    }

    .ipf_middel .search {
        display: flex;
        width: 100%;
        margin: auto;
        padding: 8px 5px;
        border-bottom: 1px solid #c3c3c3;
    }

    .ipf_middel .search #query_input {
        width: 100%;
        padding: 5px 6px;
        border: 0;
        outline: none;
        font-size: 15px;
    }

    .ipf_middel .search button {
        width: 30px;
        background: none;
        border: 0;
        font-size: 15px;
    }
</style>

<body>

    <div class="image_post_form">
        <div class="ipf_top">
            <a href="" onclick="goback()">
                <div class="lft"><i class="fas fa-arrow-left"></i></div>
            </a>
            <div class="mid">
                <div>Upload Image</div>
            </div>
            <div class="rft"><button class="postbtn">  Post </button></div>
        </div>
        <div class="ipf_middel">
            <div class="ipf_top">
                <div id="chide"><i class="fas fa-arrow-left"></i></div></a>
                <div class="mid">
                    <div>Send To</div>
                </div>
                <div class="rft"><button class="postbtn">Post</button></div>
            </div>
            <div class="search">
                <input type="text" name="" id="query_input" placeholder="Search communities">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div style="display:flex; flex-direction: column;">

                <form action="/new/post/img" method="post" id="uploadingimg" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="caption" id="caption">
                    <input type="file" name="img" id="upload_trigger_btn" accept="image/*" onchange="loadFile(event)"
                        style="display:none">
                    <div class="flyr-upload-community-list">
                    @foreach ($communities as $community)
                        <div class="flyr-upload-community-list-item">
                            <label class="flyermob-checkbox-container">
                                <input type="checkbox" class="checkbox" name="cmty[]" value="{{ $community->cid }}">
                                <span class="flyermob-checkbox-checkmark"></span>
                                <div class="flyr-upload-community-image">
                                    <img src="{{ asset($community->url) }}">
                                </div>
                                <div class="flyr-upload-community-name">
                                    <p>{{ $community->name }}</p>
                                </div>
                            </label>
                        </div>
                    @endforeach
                    <button>submit</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="ipf_bottom">
            <img id="output" style="margin: 0 auto">
            <div contenteditable="true" id="editor" style="display: inline-block; padding: 0px 10px"
                data-text="Lovely day to share"></div>
            <div class="upload_image_input">
                <img src="https://img.icons8.com/ios/50/000000/screenshot.png" id="add_files_btn">
            </div>
            <button id="view">Send To</button>
        </div>
    </div>

    <script>
        function goback() {
            window.history.back();
        }

        $("#add_files_btn").bind("click", function () {
            $("#upload_trigger_btn").trigger("click");
        });

        $("#view").bind("click", function () {
            $(".ipf_middel").css({ "display": "block", "z-index": "2" });
        });

        $("#chide").bind("click", function () {
            $(".ipf_middel").css({ "display": "none", "z-index": "2" });
        });

        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.style.height = "180px";
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        $("body").delegate('.checkbox', 'click', function () {
            var obj = $(this).parent().parent();
            if (obj.hasClass('selected')) {
                var obj = $(this).parent().parent().removeClass('selected');
            } else {
                var obj = $(this).parent().parent().addClass('selected');
            }
        });

        $('body').delegate('.postbtn', 'click', function () {
            $('#caption').val($('#editor').text());
            $('#uploadingimg').submit();
        });
        
    </script>
</body>

</html>