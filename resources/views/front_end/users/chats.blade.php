<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Messenger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&;display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&;display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@50&;display=swap');

body {
  font-size: 14px;
  font-weight: 300;
  color: rgb(58, 65, 111);
  background-image: linear-gradient(to right, rgba(238, 240, 248, 0.5), rgb(238, 240, 248), rgba(238, 240, 248, 0.5));
  font-family: Poppins !important;
  margin: 0px;
}

html body a {
  color: rgb(0, 115, 152);
  cursor: pointer;
  transition: all 0.2s linear 0s;
}

.container {
  padding-right: 0;
  padding-left: 0;
}

@media (min-width: 1400px) {
  .container {
    max-width: 1320px !important;
  }
}

.card-stacked {
  display: flex;
  flex-flow: row wrap;
}
.page-content
{
  background-image: url('http://md-54.whb.tempwebhost.net/~democdyb/astrologer/public//front_img/back.png');
  background-size: contain;

}
.chat {
  position: relative;

}

.chat .chat-user-detail {
  position: absolute;
  left: 0px;
  width: 0px;
  opacity: 0;
  z-index: -4;
}

.chat .chat-header {
  border-bottom: 1px solid rgb(225, 225, 227);
  /* background: rgb(255, 255, 255); */
   background: #fe870a;
}

.margin-auto {
  margin-top: auto !important;
  margin-bottom: auto !important;
}

.btn.btn-light-light:not(:disabled):not(.disabled).active, .btn.btn-light-light:not(:disabled):not(.disabled):active, .btn.btn-light:not(:disabled):not(.disabled).active,
.btn.btn-light:not(:disabled):not(.disabled):active, .show>.btn.btn-light-light.dropdown-toggle, .show>.btn.btn-light.dropdown-toggle {
  color: rgb(126, 130, 153);
  background-color: rgb(238, 240, 249);
  border-color: rgb(238, 240, 249);
}

.feather {
  color: rgb(61, 81, 167);
  fill: rgba(108, 124, 195, 0.15);
}

.avatar-xxl {
  width: 110px;
  height: 110px;
}

.animate4 {
  animation: 3s cubic-bezier(0.1, 0.82, 0.25, 1) 0s 1 normal none running animate4;
}

.fw-300 {
  font-weight: 300 !important;
}

.h6, h6 {
  font-size: 1.175rem;
}

.btn.btn-icon.btn-sm {
  height: 30px;
  width: 30px;
}

.btn.btn-icon.btn-sm i {
  font-size: 1.2rem;
}

.btn.btn-icon i {
  font-size: 1.35rem;
}

a.btn i, button.btn i {
  font-size: 1rem;
  vertical-align: middle;
}

.btn.btn-light-skype {
  background-color: rgba(0, 175, 240, 0.125);
  color: rgb(0, 175, 240) !important;
}

.btn.btn-light-facebook {
  background-color: rgba(59, 89, 152, 0.125);
  color: rgb(59, 89, 152) !important;
}

.btn.btn-light-twitter {
  background-color: rgba(29, 161, 242, 0.125);
  color: rgb(29, 161, 242) !important;
}

.btn.btn-light-instagram {
  background-color: rgba(225, 48, 108, 0.125);
  color: rgb(225, 48, 108) !important;
}

.btn.btn-icon {
  height: calc(1.5em + 1.2rem);
  width: calc(1.5em + 1.2rem);
  color: rgb(255, 255, 255);
  display: inline-flex;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  cursor: pointer;
  padding: 0px;
}

.btn-circle, .flag-circle {
  border-radius: 50% !important;
}

.btn-shadow {
  box-shadow: rgba(50, 50, 93, 0.11) 0px 4px 6px, rgba(0, 0, 0, 0.08) 0px 1px 3px;
}

.btn-group-sm>.btn, .btn-sm {
  font-size: 0.725rem;
  line-height: 1.35;
  padding: 0.45rem 0.75rem;
  border-radius: 0.4rem;
}

.btn {
  font-size: 0.875rem;
  font-weight: 400 !important;
  border-radius: 0.4rem;
  border-width: 1px;
  border-style: solid;
  border-color: transparent;
  border-image: initial;
  padding: 0.5rem 1rem;
}

.chat .chat-profile-picture {
  cursor: pointer;
}

.chat-search {
  padding-top: 9px;
  padding-bottom: 9px;
  background: rgb(241, 242, 250);
  border-bottom: 1px solid rgb(225, 225, 227);
}

.chat-search .input-group {
  position: relative;
  box-shadow: rgb(242, 242, 246) 0px 0px 0px 2px !important;
  border-radius: 8px;
  background: rgb(238, 240, 249);
}

.form-control input, .form-group input, input {
  box-shadow: none;
  font-size: 0.9rem;
  font-weight: 300 !important;
  border-radius: 5px;
  border-width: 1px;
  border-style: solid;
  border-color: rgb(222, 226, 230);
  border-image: initial;
}

.avatar-sm {
  height: calc(1.5em + 1.2rem) !important;
  width: calc(1.5em + 1.2rem) !important;
}

.btn.btn-light:hover {
  color: rgb(63, 66, 84);
  background-color: rgb(228, 230, 239);
}

.btn.focus, .btn:focus, .form-control:focus, .form-group input:focus, .form-group:focus, input:focus {
  box-shadow: rgba(101, 118, 255, 0.1) 0px 0px 0px 3px;
  border-color: rgba(101, 118, 255, 0);
  outline: 0px;
}

.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, .125);
  border-radius: 0.25rem;
}

.chat-search .input-group-text i {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  cursor: pointer;
}

.drop-shadow {
  filter: drop-shadow(0 0 1px #504c4c54);
}

.fs-17 {
  font-size: 17px !important;
}

.chat-search .input-group-text {
  border-top-left-radius: 0 !important;
  border-bottom-left-radius: 0 !important;
  position: relative;
  padding-top: 0;
  padding-bottom: 0;
}

.input-group>.input-group-append>.btn, .input-group>.input-group-append>.input-group-text, .input-group>.input-group-prepend:first-child>.btn:not(:first-child), .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child), .input-group>.input-group-prepend:not(:first-child)>.btn, .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.chat-search .input-group-text, .chat-search input {
  font-size: 14px;
  box-shadow: unset !important;
  border-width: initial;
  border-style: initial;
  border-color: transparent;
  border-image: initial;
  background: rgb(255, 255, 255);
  border-radius: 8px;
}

.chat-search input {
  border-top-right-radius: 0px !important;
  border-bottom-right-radius: 0px !important;
}

.prepend-white .input-group-text {
  background-color: #fff;
}

.input-group-text {
  font-size: unset;
  font-weight: unset;
  background-color: #eef0fc;
}

.pr-2, .px-2 {
  padding-right: 0.5rem !important;
  overflow: hidden;
}

.input-group-text {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0.375rem 0.75rem;
  margin-bottom: 0;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  text-align: center;
  white-space: nowrap;
  background-color: #e9ecef;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}

.archived-messages {
  cursor: pointer;
}

.archived {
  background-image: url(https://user-images.githubusercontent.com/35243461/168796895-2fc5e22b-06db-46b5-9854-d517778cfe57.svg);
}

.svg15 {
  height: 15px;
  width: 15px;
}

.fw-400 {
  font-weight: 400 !important;
}

.text-dark-75 {
  color: #3f4254 !important;
}

.text-light-75 {
    color: white !important;
  }
.chat-user-panel {
  border-top: 1px solid #eef0f9;
  cursor: pointer;
}

.chat-user-scroll {
  max-height: 620px;
  position: relative;
}

.chat .chat-item {
  border-bottom-width: 1px;
  border-bottom-style: dashed;
  border-bottom-color: #e4e6ef;
}

img.shadow {
  box-shadow: 0 15px 35px rgba(50, 50, 93, .15), 0 5px 15px rgba(0, 0, 0, .15) !important;
}

.double-check {
  background-image: url(https://user-images.githubusercontent.com/35243461/168796897-1db3c9e8-c8e4-47b5-8399-9ee230bcd35f.svg);
}

.chat .chat-item .message-shortcut {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
}

.fs-13 {
  font-size: 15px !important;
}

.fs-15 {
  font-size: 15px !important;
}

.pinned {
  background-image: url(https://user-images.githubusercontent.com/35243461/168796901-94490a54-e25d-4094-a91d-38f357898ad6.svg);
}

.svg18 {
  height: 18px;
  width: 18px;
}

.chat .chat-item.active, .chat .chat-item:hover {
  background-color: #f5f8fa;
}

.badge.round {
  border-radius: 1.5rem;
}

.badge-light-success {
  background-color: rgba(10, 187, 135, .1);
  color: #0abb87;
}

.badge {
  font-weight: 500;
  display: inline-block;
  padding: 0.4em 1.2em;
  font-size: 80% !important;
  text-align: center;
  vertical-align: baseline;
  border-radius: 0.25rem;
  transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.single-check {
  background-image: url(https://user-images.githubusercontent.com/35243461/168796902-03e56437-61b1-48a5-a55e-3dcc41a09deb.svg);
}

.double-check-blue {
  background-image: url(https://user-images.githubusercontent.com/35243461/168796899-499f66ce-ed05-404d-8f37-063165788b31.svg);
}

::-webkit-input-placeholder {
  font-size: .8rem
}

::-moz-placeholder {
  font-size: .8rem
}

:-ms-input-placeholder {
  font-size: .8rem
}

.shadow-line {
  box-shadow: rgba(62, 57, 107, 0.07) 0px 1px 15px 1px;
  border-width: 1px;
  border-style: solid;
  border-color: rgba(211, 218, 230, 0.43);
  border-image: initial;
}

.text-small {
  font-size: 12px !important;
}

.chat-panel-scroll {
  max-height: 680px;
  position: relative;
}

.horizontal-margin-auto {
  margin-right: auto !important;
  margin-left: auto !important;
}

.loader-animate3 {
  background-image: url(https://user-images.githubusercontent.com/35243461/168796900-207c2e2a-4a21-4ef0-9dc7-fd82e3e20073.svg);
}

.svg36 {
  height: 36px;
  width: 36px;
}

.letter-space {
  letter-spacing: 1.5px;
}

.fs-12 {
  font-size: 12px !important;
}

.chat.chat-panel .left-chat-message, .chat.chat-panel .right-chat-message {
  padding: 0.5rem 1rem;
  max-width: 47%;
  margin-left: 2rem;
  margin-right: 2rem;
  font-size: 15px;
}

.left-chat-message {
  position: relative;
  margin: 0 0 0 10px;
  background: #fff;
  width: fit-content;
  max-width: 60%;
  padding: 0.7rem 1rem;
  border-radius: 0.357rem;
  -webkit-box-shadow: 0 4px 8px 0 rgb(34 41 47 / 3%);
  box-shadow: 0 4px 8px 0 rgb(34 41 47 / 3%);
}

.chat.chat-panel .message-arrow, .chat.chat-panel .message-time {
  position: absolute;
  right: 5px;
  bottom: 5px;
  padding: 2px 6px;
  font-size: 11px;
  color: #6c757d;
  cursor: pointer;
}

.chat.chat-panel .message-arrow, .chat.chat-panel .message-time {
  position: absolute;
  right: 5px;
  bottom: 5px;
  padding: 2px 6px;
  font-size: 11px;
  color: #6c757d;
  cursor: pointer;
}

.chat.chat-panel .message-arrow {
  transform: scale(0);
}

.chat.chat-panel {
  background: linear-gradient(to bottom, #e9e4f07d, #d3cce34f);
}

.chat {
  position: relative;
}

.chat.chat-panel .left-chat-message, .chat.chat-panel .right-chat-message {
  padding: 0.5rem 1rem;
  max-width: 47%;
}

.chat.chat-panel .left-chat-message, .chat.chat-panel .right-chat-message {
  padding: 0.5rem 1rem;
  max-width: 47%;
}

.right-chat-message {
  position: relative;
  margin: 0 10px 0 0;
  background: linear-gradient(to right, #ffbb72, #fe870a);
  color: #fff;
  width: fit-content;
  max-width: 60%;
  padding: 0.7rem 1rem;
  border-radius: 0.357rem;
  -webkit-box-shadow: 0 4px 8px 0 rgb(34 41 47 / 12%);
  box-shadow: 0 4px 8px 0 rgb(34 41 47 / 12%);
}

.chat.chat-panel .message-options.dark .message-arrow i, .chat.chat-panel .message-options.dark .message-time {
  color: #fff !important;
}

.chat.chat-panel .chat-upload-trigger {
  position: relative;
}

.chat.chat-panel .chat-upload.active {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  transform: scale(1);
  bottom: 50px;
}

.chat.chat-panel .chat-upload {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  transform: scale(0);
  position: absolute;
  left: -5px;
  bottom: -50px;
}

.btn.btn-light-secondary.btn-blushing, .btn.btn-secondary.btn-blushing {
  box-shadow: 1px 1px 1px 1px rgb(117 106 208 / 40%);
}

.btn.btn-secondary {
  color: #fff;
  background-color: #8950fc;
  border: 0;
}

.btn.btn-danger.btn-blushing, .btn.btn-light-danger.btn-blushing {
  box-shadow: 1px 1px 1px 1px #fd397a5c;
}

.btn.btn-light-warning.btn-blushing, .btn.btn-warning.btn-blushing {
  box-shadow: 1px 1px 1px 1px rgb(255 184 34 / 40%);
}

.btn.btn-light-success.btn-blushing, .btn.btn-success.btn-blushing {
  box-shadow: 1px 1px 1px 1px rgb(10 187 135 / 40%);
}

.btn.btn-light-secondary.btn-blushing, .btn.btn-secondary.btn-blushing {
  box-shadow: 1px 1px 1px 1px rgb(117 106 208 / 40%);
}

.chat-search .input-group-text i {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  cursor: pointer;
}

.chat-search .input-group-text i:hover {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  -webkit-transform: translateY(-2px) scale(1);
  transform: translateY(-2px) scale(1);
}

.fs-19 {
  font-size: 19px !important;
}

.chat.chat-panel .left-chat-message, .chat.chat-panel .right-chat-message {
  padding: .5rem 1rem;
  max-width: 47%
}

.chat.chat-panel .message-arrow {
  transform: scale(0);
}

.chat.chat-panel .left-chat-message:hover .message-time, .chat.chat-panel .right-chat-message:hover .message-time {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  transform: scale(0);
}

.chat.chat-panel .left-chat-message:hover .message-arrow, .chat.chat-panel .right-chat-message:hover .message-arrow {
  -webkit-transition: all .25s ease 0s;
  transition: all .25s ease 0s;
  transform: scale(1);
}

.chat .chat-user-detail {
  position: absolute;
  left: 0;
  width: 0;
  opacity: 0;
  z-index: -4;
}

.chat .chat-user-detail.active {
  -webkit-transition: all .25s ease 0s;
  transition: all .4s cubic-bezier(1, .04, 0, .93) 0s;
  height: 100%;
  width: 100%;
  background: #f1f2fa;
  z-index: 1;
  opacity: 1;
}

.card {
  margin-bottom: 1.875rem;
  border: none;
  box-shadow: 0 1px 2px #00000030;
  border-radius: 0.45rem;
  width: 100%;
}

.btn.btn-light-skype.focus, .btn.btn-light-skype:focus, .btn.btn-light-skype:hover:not(:disabled):not(.disabled) {
  color: #fff !important;
  background-color: #00aff0;
  border-color: #00aff0;
}

.btn.btn-light-facebook.focus, .btn.btn-light-facebook:focus, .btn.btn-light-facebook:hover:not(:disabled):not(.disabled) {
  color: #fff !important;
  background-color: #3b5998;
  border-color: #3b5998;
}

.btn.btn-light-twitter.focus, .btn.btn-light-twitter:focus, .btn.btn-light-twitter:hover:not(:disabled):not(.disabled) {
  color: #fff !important;
  background-color: #1da1f2;
  border-color: #1da1f2;
}

.btn.btn-light-instagram.focus, .btn.btn-light-instagram:focus, .btn.btn-light-instagram:hover:not(:disabled):not(.disabled) {
  color: #fff !important;
  background-color: #e1306c;
  border-color: #e1306c;
}

/*perfect scrollbar*/
.ps-container {
  -ms-touch-action: none;
  touch-action: none;
  overflow: hidden !important;
  -ms-overflow-style: none
}

@supports (-ms-overflow-style:none) {
  .ps-container {
    overflow: auto !important
  }
}

@media screen and (-ms-high-contrast:active), (-ms-high-contrast:none) {
  .ps-container {
    overflow: auto !important
  }
}

.ps-container.ps-active-x>.ps-scrollbar-x-rail, .ps-container.ps-active-y>.ps-scrollbar-y-rail {
  display: block;
  background-color: transparent
}

.ps-container.ps-in-scrolling {
  pointer-events: none
}

.ps-container.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail {
  background-color: #eee;
  opacity: .9
}

.ps-container.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail>.ps-scrollbar-x {
  background-color: #999
}

.ps-container.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail {
  background-color: #eee;
  opacity: .9
}

.ps-container.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail>.ps-scrollbar-y {
  background-color: #999
}

.ps-container>.ps-scrollbar-x-rail {
  display: none;
  position: absolute;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  opacity: 0;
  bottom: 3px;
  height: 8px
}

.ps-container>.ps-scrollbar-x-rail>.ps-scrollbar-x {
  position: absolute;
  background-color: #aaa;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  bottom: 0;
  height: 4px
}

.ps-container>.ps-scrollbar-y-rail {
  display: none;
  position: absolute;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  opacity: 0;
  right: 3px;
  width: 4px
}

.ps-container>.ps-scrollbar-y-rail>.ps-scrollbar-y {
  position: absolute;
  background-color: #a2adb7;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  right: 0;
  width: 4px
}

.ps-container:hover.ps-in-scrolling {
  pointer-events: none
}

.ps-container:hover.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail {
  background-color: #eee;
  opacity: .9
}

.ps-container:hover.ps-in-scrolling.ps-x>.ps-scrollbar-x-rail>.ps-scrollbar-x {
  background-color: #a2adb7
}

.ps-container:hover.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail {
  background-color: #eee;
  opacity: .9
}

.ps-container:hover.ps-in-scrolling.ps-y>.ps-scrollbar-y-rail>.ps-scrollbar-y {
  background-color: #a2adb7
}

.ps-container:hover>.ps-scrollbar-x-rail, .ps-container:hover>.ps-scrollbar-y-rail {
  opacity: .6
}

.ps-container:hover>.ps-scrollbar-x-rail:hover {
  background-color: #eee;
  opacity: .9
}

.ps-container:hover>.ps-scrollbar-x-rail:hover>.ps-scrollbar-x {
  background-color: #a2adb7
}

.ps-container:hover>.ps-scrollbar-y-rail:hover {
  background-color: #eee;
  opacity: .9
}

.ps-container:hover>.ps-scrollbar-y-rail:hover>.ps-scrollbar-y {
  background-color: #a2adb7
}
</style>

<body style="overflow:hidden !important;">
    <div class="main-wrapper">
        <div class="container">
            <div class="page-content">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-12 card-stacked">
                            <div class="card shadow-line mb-3 chat chat-panel">
                                <div class="p-3 chat-header">
                                    <div class="d-flex">
                                        <div class="w-100 d-flex pl-0">
                                            <img class="rounded-circle shadow avatar-sm mr-3 chat-profile-picture"
                                            <?php  if( $to_user->profile_image != NULL){?> src="{{url('/')}}/images/profile_image{{$to_user->profile_image}}" <?php }else{?> src="{{ asset('public/astrology_assets/images/user.jpg')}}"<?php } ?> >
                                            <div class="mr-3">
                                                <a href="!#">
                                                    <p class="fw-400 mb-0 text-light-75">{{$to_user->name}}</p>
                                                </a>
                                                <p class="sub-caption text-muted text-small mb-0"><i
                                                        class="la  mr-1"></i>Time left: <span id="timer"></span> </p>
                                                <p class="sub-caption text-muted text-small mb-0" id="typing"><i
                                                        class="la  mr-1"></i>Chat in progress</p>
                                                        
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 margin-auto">
                                    
                                            <a href="#" class="btn btn-icon btn-light text-dark-75 active text-dark ml-2 p-3" onclick="end_chat()">
                                                End
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="chat_area"
                                    class="d-flex flex-row mb-3 navigation-mobile scrollable-chat-panel"
                                    style="height:75vh;max-height:75vh;overflow:scroll;">
                                    <div class="w-100 p-3">
                                        

                                        <div id="chat"></div>

                                    </div>
                                </div>

                                <div class="chat-search pl-3 pr-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Write a message"
                                            id="message_area" value="">
                                        <div class="input-group-append prepend-white">
                                            <span class="input-group-text pl-2 pr-2">
                                                <i
                                                    class="chat-upload-trigger fs-19 bi bi-file-earmark-plus ml-2 mr-2"></i>
                                                <i class="fs-19 bi bi-emoji-smile ml-2 mr-2"></i>
                                                <i class="fs-19 bi bi-camera ml-2 mr-2"></i>
                                                <i onlick="" id="send_button" onclick="send_chat_message()"
                                                    class="fs-19 bi bi-cursor ml-2 mr-2"></i>
                                                <div class="chat-upload">
                                                    <div class="d-flex flex-column">
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-secondary btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-camera"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-success btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-file-earmark-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-warning btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-person"></i>
                                                            </button>
                                                        </div>
                                                        <div class="p-2">
                                                            <button type="button"
                                                                class="btn btn-danger btn-md btn-icon btn-circle btn-blushing">
                                                                <i class="fs-15 bi bi-card-image"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.6.0/socket.io.js" integrity="sha512-rwu37NnL8piEGiFhe2c5j4GahN+gFsIn9k/0hkRY44iz0pc81tBNaUN56qF8X4fy+5pgAAgYi2C9FXdetne5sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script>

var urlString='http://134.209.229.112:8090';   

var socket = io(urlString, {secure: false});


if(localStorage.getItem('save_count') == 'undefined' || localStorage.getItem('save_count') ==null )
{
    localStorage.setItem('save_count', 00 + ":" + 00);

}

if(localStorage.getItem('amount') == 'undefined' || localStorage.getItem('amount') ==null)
{
    localStorage.setItem('amount', 0);
}

console.log('new',localStorage.getItem('save_count'))
console.log('new amount',localStorage.getItem('amount'))

socket.on('connect', function() {
  console.log("Connected to WS server");

  var user_data = {from_user_id:from_user_id,to_user_id:to_user_id,socket_id:socket.id}
  socket.emit("user_data",user_data) 
  socket.emit("chat_history",user_data)

});



var from_user_id = {{$from_user->id}};
var to_user_id = {{$to_user->id}};
var user_type = {{$from_user->user_type}};
var astro_charge ={{$astro_charge}}
var chat_id ={{$chat_id}}
var wallet_amount ={{$wallet_amount->wallet_amount}}
var charge=0;
var max_time={{$max_time}};

console.log('astro_charge',max_time)

socket.on('user_status', function(data) {

console.log('my user data status',data[0].user_status)
clearInterval(startTimer);

startTimer()
});


socket.on('chat_data', function(datas) {
if(datas.from_user_id ==from_user_id && datas.to_user_id==to_user_id)
 {   var data =datas.data
      var html=''  

//   if(data.length >0 )    {
    for (var count = 0; count < data.length; count++) {


if (data[count].message_status == 'Not Send') {
                            icon_style = `<div  id="chat_status_`+data[count].id+`" ><div class="svg15 double-check"></div></div>`
                        }
                        if (data[count].message_status == 'Send') {
                            icon_style = `<div  id="chat_status_`+data[count].id+`" ><div class="svg15 double-check"></div></div>`
                        }

                        if (data[count].message_status == 'Read') {
                            icon_style = `<div  id="chat_status_`+data[count].id+`" ><div class="svg15 double-check-blue"></div></div>`
                        }

            if (data[count].from_user_id == from_user_id) {


                html += `<div class="d-flex flex-row-reverse mb-2">
                                            <div class="right-chat-message fs-13 mb-2">
                                                <div class="mb-0 mr-3 pr-4">
                                                    <div class="d-flex flex-row">
                                                        <div class="pr-2">` + data[count].chat_message + `</div>
                                                        <div class="pr-4"></div>
                                                    </div>
                                                </div>
                                                <div class="message-options dark">
                                                    <div class="message-time">
                                                        <div class="d-flex flex-row">
                                                            <div class="mr-2">`+data[count].message_time+`</div>`+icon_style+`
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="message-arrow"><i
                                                            class="text-muted la la-angle-down fs-17"></i></div>
                                                </div>
                                            </div>
                                        </div>`;
            }else{

                
    var status={id:data[count].id,action:'Read'}
   
    
    socket.emit('update_message_status',status)

                html += `<div class="left-chat-message fs-13 mb-2">
                                            <p class="mb-0 mr-3 pr-4">` + data[count].chat_message + `</p>
                                            <div class="message-options">
                                                <div class="message-time">`+data[count].message_time+`</div>
                                                <div class="message-arrow"><i
                                                        class="text-muted la la-angle-down fs-17"></i></div>
                                            </div>
                                        </div>`;
            }

            
            $('#chat').append(html)
                ScrollToBottom()
    }
//   }else{
   
 

//   }

}
});



var send_button = document.getElementById("message_area");

send_button.addEventListener("keydown", function (e) {
    if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
        send_chat_message();
    }
});

function end_chat()
{

  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, End it!'
}).then((result) => {
  if (result.isConfirmed) {
    clearInterval(startTimer);
   
     localStorage.setItem('save_count',00 + ":" + 00);
     localStorage.setItem('save_count',00 + ":" + 00);
     localStorage.setItem('amount',0);
     localStorage.setItem('amount',0);
     document.getElementById('timer').innerHTML =0 + ":" + 00;
     document.getElementById('timer').innerHTML =0 + ":" + 00;
     document.getElementById('timer').innerHTML =0 + ":" + 00;

     localStorage.setItem('save_count',00 + ":" + 00);
     localStorage.setItem('save_count',00 + ":" + 00);

     clearInterval(startTimer);
     var data ={end_id:to_user_id,from_user_id:from_user_id,user_type:user_type}
     socket.emit('endchat',data);
     
     localStorage.setItem('save_count',00 + ":" + 00);
     localStorage.setItem('save_count',00 + ":" + 00);


    location.href = 'https://collabdoor.com/user/wallets';

  }
})

}

socket.on('end_chat_datas', function(data) {
console.log('end_chat_data',data)
    clearInterval(startTimer);
    
    if(data.end_id == from_user_id )
    {
      var msg='Chat is ended by'+'{{$to_user->name}}'
    Swal.fire(msg)
        
    clearInterval(startTimer);
    localStorage.setItem('save_count',00 + ":" + 00);
    localStorage.setItem('amount', 0);
    localStorage.setItem('amount', 0);
       
    document.getElementById('timer').innerHTML =0 + ":" + 00;
    document.getElementById('timer').innerHTML =0 + ":" + 00;
    document.getElementById('timer').innerHTML =0 + ":" + 00;
    // if(user_type == 1)
    // {
    // var data={user_id:from_user_id,astro_charge:astro_charge,astro_id:to_user_id,charge:charge,chat_id:chat_id}
    // console.log(data)
    // socket.emit("deduct_amount",data)
    // }  
    clearInterval(startTimer);

    var datas ={end_id:data.end_id,from_user_id:from_user_id,user_type:user_type}

    socket.emit('endchat',datas);   
    

    location.href = 'https://collabdoor.com/user/wallets';
    }


 })

function send_chat_message() {
    $('#send_button').disabled = true;
var message = $('#message_area').val().trim();
if(message !=''){
var messages={from_user_id:from_user_id,to_user_id:to_user_id,message:message};
socket.emit("message",messages)


html = `<div class="d-flex flex-row-reverse mb-2">
                                            <div class="right-chat-message fs-13 mb-2">
                                                <div class="mb-0 mr-3 pr-4">
                                                    <div class="d-flex flex-row">
                                                        <div class="pr-2">` + message + `</div>
                                                        <div class="pr-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="message-options dark">
                                                    <div class="message-time">
                                                        <div class="d-flex flex-row">
                                                            <div class="mr-2">`+getCurrentTime()+`</div>
                                                            <div ><div class="svg15 double-check"></div></div>
                                                        </div>
                                                    </div>
                                                    <div class="message-arrow"><i
                                                            class="text-muted la la-angle-down fs-17"></i></div>
                                                </div>
                                            </div>
                                        </div>`;

                if (html != '') {
                var previous_chat_element = document.querySelector("#chat");
                var chat_history_element = document.querySelector("#chat");

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html
                ScrollToBottom()

            }                              

document.querySelector('#message_area').value = '';
document.querySelector('#send_button').disabled = false;
}

    }

 socket.on('message_data', function(data) {
 
    
 if(data.from_user_id ==to_user_id && data.to_user_id==from_user_id)
 {
var html=''
 html = `<div class="left-chat-message fs-13 mb-2">
                                            <p class="mb-0 mr-3 pr-4">` + data.message + `</p>
                                            <div class="message-options">
                                                <div class="message-time">`+data.message_time+`</div>
                                                <div class="message-arrow"><i
                                                        class="text-muted la la-angle-down fs-17"></i></div>
                                            </div>
                                        </div>`;

                                        if (html != '') {
                var previous_chat_element = document.querySelector("#chat");
                var chat_history_element = document.querySelector("#chat");

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html
                ScrollToBottom()
                                        }

            }                                             


    var status={id:data.id,action:'Read'}
    socket.emit('update_message_status',status)
//   $('#chat').append(data)
 });   


//  socket.on('typingResponse', function(data) {
//     if(data.from_user_id ==to_user_id && data.to_user_id==from_user_id)
//     {
      
   
//     if(data.is_type==1)
//     {
//         document.getElementById('typing').innerHTML ='typing....'; 

//     }
//     if(data.is_type==0)
//     {
        
//         document.getElementById('typing').innerHTML ='Chat in progress'; 
//     }

//     }

    
//  })


// $("#message_area").on('keyup', function() {    
//     var status={from_user_id:from_user_id,to_user_id:to_user_id,is_type:1};
//     socket.emit('typing',status)
// })

// $("#message_area").on('keydown', function() {

    
// var status={from_user_id:from_user_id,to_user_id:to_user_id,is_type:0};

// socket.emit('typing',status)
// })
 function ScrollToBottom() {
        var d = document.getElementById("chat_area");
        d.scrollTop = d.scrollHeight;
    }

    function getCurrentTime() {

//let parsedDate =  new Date()
//const formattedDate = `${parsedDate.getHours()}:${parsedDate.getMinutes()}`

const nDate = new Date().toLocaleString('en-US', {
    timeZone: 'Asia/Calcutta'
});

var formattedDate = nDate.split(', ')[1].split(':')[0] + ':' + nDate.split(', ')[1].split(':')[1];

return formattedDate
}


function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec > 59) {sec = "0"};
  return sec;
}



function startTimer() {
  var presentTime = localStorage.getItem('save_count');
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond(parseInt(timeArray[1])+1);
  
   if(s==3)
   {
    //  charge = parseInt(astro_charge)*(parseInt(m)+parseInt(1))

    if(user_type == 1)
    {
    var data={user_id:from_user_id,astro_charge:astro_charge,astro_id:to_user_id,chat_id:chat_id}
    console.log(data)
    socket.emit("deduct_amount",data)
    // socket.emit("astro_amount",data)
    }   

   }
  if(s==59){
    m=parseInt(m)+1}
    if(user_type==1 && m==max_time-1)
   {
    document.getElementById('timer').style.color = 'red';
   }
   if(user_type==1 && m==max_time)
   {
    clearInterval(startTimer);
   
   localStorage.setItem('save_count',00 + ":" + 00);
   localStorage.setItem('save_count',00 + ":" + 00);
   localStorage.setItem('amount',0);
   localStorage.setItem('amount',0);
   clearInterval(startTimer);
   document.getElementById('timer').innerHTML =0 + ":" + 00;
   document.getElementById('timer').innerHTML =0 + ":" + 00;
   document.getElementById('timer').innerHTML =0 + ":" + 00;

   localStorage.setItem('save_count',00 + ":" + 00);
   localStorage.setItem('save_count',00 + ":" + 00);

   clearInterval(startTimer);
   var data ={end_id:to_user_id,from_user_id:from_user_id,user_type:user_type}
   socket.emit('endchat',data);
   
   localStorage.setItem('save_count',00 + ":" + 00);
   localStorage.setItem('save_count',00 + ":" + 00);


  location.href = 'https://collabdoor.com/user/wallets';

   }
  if(m<0){
    clearInterval(startTimer);
    localStorage.setItem('save_count', 00 + ":" + 00);
    localStorage.setItem('amount', 0);

    location.href = 'https://collabdoor.com';
    return
  }
  
  console.log(m + ":" + s) 
  console.log('new amount 1',localStorage.getItem('amount'))

  localStorage.setItem('save_count',m + ":" + s);
  document.getElementById('timer').innerHTML =m + ":" + s; 
  setTimeout(startTimer, 1000);
  
}



</script>

</body>

</html>