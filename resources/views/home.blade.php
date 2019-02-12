@extends('layouts.app')
@section('style')
<style>
    *{
        margin:0;
        padding: 0;
    }

    ::placeholder{
        font-size: 16px;
        color:#aaadb2;
    }

    a{
    pointer:cursor; 
    text-decoration:none;
    color:inherit;
    }

    body{
        background: #e0e0e0;
        font-family: 'Hind Madurai', sans-serif;
    }

    p{
        margin:0;
        padding: 0;
    }

    .highlight{
        color: red !important;
    }

    .selected{
        display: block !important;
    }

    .flyer-feed-container{
        width: 100%;
        margin-top: 40px;
    }

    .feed-post{
        width: 100%;
        margin-top: 10px;
    }

    .feed-header{
        width: 100%;
        height:55px;
        display: flex;
        background: #f4f4f4;
    }

    .feed-header-avatar{
        width: 40px;
        height: 40px;
        padding:8px 6px;
    }

    .feed-header-avatar img{
        width: 100%;
        height:100%;
        border-radius:50%;
    }

    .feed-header-username{
        display:flex;
        flex-direction: column;
        width: 75%;
        padding:8px 6px;
    }

    .feed-header-username--name{
        font-size: 16px;
        color: black;
        font-weight: bold;
    }

    .feed-header-username--commname{
        font-size: 12px;
        color: blue;
        font-weight: bold;
        margin-top: 1%;
    }

    .feed-header-option{
        position: relative;
        color: grey;
        width :35px;
        font-size: 20px;
        text-align:center;
        margin: 15px 0px 15px auto;
    }

    .header-option-div{
        display: none;
        position: absolute;
        top: 40px;
        right: 0;
        width: 200px;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 3px;
        box-shadow: 0 3px 40px rgba(0, 0, 0, .3);
    }

    .header-option-div-item{
    text-align:left;
    font-size:15px;
    color:black;
    padding:10px 10px;
    }
    .header-option-arrow{
        display: none;
        border-bottom: 8px solid #fff;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        content: '';
        position: absolute;
        top: 33px;
        margin: 0px 0px 0px -8px;
        left: 50%;
    }
    .feed-body{
        width: 100%;
    }

    .feed-body--image{
        width: 100%;
    }
    .feed-footer{
        width: 100%;
        background: white;
    }

    .feed-likes-view{
        padding:3% 0%;
        width:96%;
        margin: 0 auto;
        font-size: 12px;
        color: #a7abb0;
        border-bottom: 1px solid #e8e8e8;
    }

    .feed-likes-views--likes{
        padding: 0% 3%;
    }

    .feed-likes-views--comments{

    }

    .feed-caption-section{
        padding: 3% 4%;
        border-bottom: 1px solid #e8e8e8;
    }

    .feed-caption-section--text{
        display: flex;
        font-size: 12px;
        word-wrap: break-word;
        line-height: 19px;
    }

    .feed-likes-section{
        display: flex;
    }
    .feed-like{
        width: 33.3333%;
        font-size: 14px;
        font-weight: bold;
        padding: 3%;
        text-align: center;
        color: #aaadb2;
    }

    .show{
        display:flex;
    }

    .feed-view-comments{
        
    }

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height *//* Enable scroll if needed */ /* Black w/ opacity */
        -webkit-animation-name: fadeIn; /* Fade in the background */
        -webkit-animation-duration: 0.4s;
        animation-name: fadeIn;
        animation-duration: 0.4s
    }
    
    /* Modal Content */
    .modal-content {
        position: absolute;
        background-color: #fefefe;
        width: 100%;
        height: 90%;
        margin: auto;
        bottom: 0;
        left: 0;
        right: 0;
        border-radius: 5px;
        box-shadow: 0 0px 60px rgba(0, 0, 0, .3);
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 0.4s;
        animation-name: slideIn;
        animation-duration: 0.4s;
    }
    
    /* The Close Button */
    .close {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10;
        padding: 10px 10px;
        font-size: 16px;
        font-weight: bold;
    }

    @-webkit-keyframes slideIn {
        from {bottom: -300px; opacity: 0} 
        to {bottom: 0; opacity: 1}
    }
    
    @keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 0; opacity: 1}
    }
    
    @-webkit-keyframes fadeIn {
        from {opacity: 0} 
        to {opacity: 1}
    }
    
    @keyframes fadeIn {
        from {opacity: 0} 
        to {opacity: 1}
    }
    .modal-heading{
        position: absolute;
        width: 100%;
        height:18px;
        padding: 10px 40px;
        top: 0;
        font-weight: bold;
        font-size: 16px;
        border-bottom: 1px solid #c8c3c3;
    }
    .modal-writecomment{
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        padding: 45px 1%;
    }

    .modal-writecomment-avatar{
        width: 40px;
        height: 40px;
    }
    .modal-writecomment-avatar img{
        height: 100%;
        width: 100%;
        border-radius: 50%;
    }
    .modal-writecomment-input{
        width: 80%;
        padding: 1% 2%;
        margin-left: 2%;
        border-bottom: 1px solid #c8c3c3;
    }

    .modal-writecomment-input--input{
        padding: 2% 0% 0% 0%;
        width: 100%;
        font-size: 16px;
        outline: none;
        border: none;
    }
</style>
@endsection
@section('content')
@foreach ($Posts as $post)
<div id="mycommentModal" class="modal">
        <div class="modal-content">
            <span class="close"><i class="fas fa-arrow-left"></i></span>
            <div class="modal-heading">
                <p>Comments</p>
            </div>
            <div class="modal-writecomment">
                <div class="modal-writecomment-avatar">
                    <img src="https://dummyimage.com/600x400/000/fff">
                </div>
                <div class="modal-writecomment-input">
                    <input type="text" class="modal-writecomment-input--input" placeholder="Write a comment">
                </div>
            </div>
        </div>
    </div>
    <div class="flyer-feed-container">
            <div class="feed-post">
                <div class="feed-header">
                    <div class="feed-header-avatar">
                        <img src="https://dummyimage.com/600x400/000/fff">
                    </div>
                    <div class="feed-header-username">
                        <p class="feed-header-username--name">{{ $post->name }}</p>
                        <p class="feed-header-username--commname">community</p>
                    </div>
                    <div class="feed-header-option">
                        <i class="fas fa-ellipsis-v"></i>
                        <div class="header-option-div">

                        </div>
                        <div class="header-option-arrow">

                        </div>
                    </div>
                </div>
                <div class="feed-body">
                    <img src="{{ asset($post->posturl) }}" class="feed-body--image">
                </div>
                <div class="feed-footer">
                    <div class="feed-likes-view">
                        <span class="feed-likes-views--likes">0 likes</span>    
                        <span class="feed-likes-views--comments"> 0 comments</span>   
                    </div>
                    @if(!empty($post->caption))
                    <div class="feed-caption-section">                        
                        <p class="feed-caption-section--text">
                            {{ $post->caption }}
                        </p>
                    </div>
                    @endif
                    <div class="feed-likes-section">
                        <div class="feed-like feedlike">
                            Like
                        </div>
                        <div class="feed-like" id="myBtn">
                            Comment
                        </div>
                        <div class="feed-like">
                            Share
                        </div>
                    </div>
                </div>
            </div>
    </div>



@endforeach 
@endsection
@section('script')
<script>
    $( ".feedlike" ).click(function() {
        $( this ).toggleClass( "highlight");
    });

    $("body").delegate( '.feed-header-option', 'click', function (){ 
        var obj = $(this).children();
        if(obj.hasClass('selected')){
            var obj = $(this).children().removeClass('selected');
        }else{
            var obj = $(this).children().addClass('selected');
        }
    });
    

var modal = document.getElementById('mycommentModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
@endsection
