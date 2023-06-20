<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js'></script>
                                <style>body {
    background-color: #6F1667
}

.height-100 {
    height: 100vh
}

.card {
    width: 400px;
    border: none;
    height: 300px;
    box-shadow: 0px 5px 20px 0px #6F1667;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
}

.card h6 {
    color: #6F1667;
    font-size: 20px
}

.inputs input {
    width: 100px;
    height: 40px
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid #6F1667
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: #6F1667;
    border: 1px solid #6F1667;
    width: 100%
}

.content a {
    color: #D64F4F;
    transition: all 0.5s
}

.content a:hover {
    color: #6F1667
}</style>
                                </head>
                                <body oncontextmenu='return false' class='snippet-body'>
                                <div id="app">
    <div class="container height-100 d-flex justify-content-center align-items-center">
        <div class="position-relative">
            <div class="card p-2 text-center">
              <form action="verifyOTP.php" method="POST">
                <h6>Please enter the one time password <br> </h6>
                <div> <span> sent to</span> <small>your number</small> </div>
                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input class="m-2 text-center form-control rounded" type="text" id="vkey" name="vkey" /> 
                </div>
                <div class="mt-4"> <button type="submit"  class="btn btn-danger px-4 validate">Validate</button> </div>
            </div>
            </form>
        </div>
    </div>
</div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'>var app = new Vue({
el: '#app',
methods: {
inputenter(id) {

const inputs = document.querySelectorAll('#otp > *[id]');
for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } } });</script>
                                </body>
                            </html>