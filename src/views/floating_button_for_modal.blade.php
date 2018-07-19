<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<style>


    .floating-menu {
        border-radius: 100px;
        z-index: 999;
        padding-top: 10px;
        padding-bottom: 10px;
        right: 0;
        position: fixed;
        display: inline-block;
        top: 80%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    .main-menu {
        margin: 0;
        padding-left: 0;
        list-style: none
    }

    .main-menu li a {
        display: block;
        padding: 20px;
        color: #fff;
        border-radius: 50px;
        position: relative;
        -webkit-transition: none;
        -o-transition: none;
        transition: none
    }


    .menu-bg {
        background-repeat: repeat-x;
        background-color: #167699;
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50px;
        z-index: -1;
        top: 0;
        left: 0;
        -webkit-transition: .1s;
        -o-transition: .1s;
        transition: .1s
    }

    .ripple {
        position: relative;
        overflow: hidden;
        transform: translate3d(0, 0, 0)
    }

    .ripple:after {
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        background-image: radial-gradient(circle, #000 10%, transparent 10.01%);
        background-repeat: no-repeat;
        background-position: 50%;
        transform: scale(10, 10);
        opacity: 0;
        transition: transform .5s, opacity 1s
    }

    .ripple:active:after {
        transform: scale(0, 0);
        opacity: .2;
        transition: 0s
    }


</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
      integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
      crossorigin="anonymous">

<nav class="floating-menu ">
    <ul class="main-menu">
        <li>
            <a href="javascript:;" class="ripple" onclick="contactifyModalShow()">
                <i class="fa {{config('contactify.font-awesome-icon', 'fa-bomb')}} fa-lg"></i>
            </a>
        </li>
    </ul>
</nav>


<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a href="javascript:;" onclick="contactifyModalShow()">
                    <i class="fa {{config('contactify.font-awesome-icon', 'fa-bomb')}} fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

<div class="modal" id="contactifyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{  config('contactify.form-title', "Contactify Form")}}</h5>

            </div>
            <div class="modal-body">
                @include('contactify::partials.main_contactify_form',['dont_show_contactify_submit_btn' => true,'dont_show_contactify_form_title' => true] )
            </div>
            <div class="modal-footer">
                <button type="button" onclick="sendContactifyContentToServer()" id="urlActionConfirmer"
                        class="btn btn-primary">
                    Submit
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function contactifyModalShow() {
        $('#contactifyModal').modal('show');
    }
    function sendContactifyContentToServer() {
        $('#hiddenSubmitForForm').trigger('click');
    }
</script>
