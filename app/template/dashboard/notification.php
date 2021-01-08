<?php
if (isset($_SESSION['msg']))
{
    echo '<div class="alert alert-'.(($_SESSION['msg']['status'] === true)? 'info':'danger').'" role="alert" style="transition:all 1s ease-in-out;position:fixed; top:0; z-index:9999; left:20%;width:60%;">
                '.$_SESSION['msg']['message'].'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script >
            var alertVar = document.querySelector(".alert");

            if (alertVar != null)
            {
                setTimeout(function (){
                    var top = parseInt(alertVar.style.top);
                    top -= 100;
                    alertVar.style.top = top+"px";
                },7000);
                setTimeout(function (){
                    alertVar.parentElement.removeChild(alertVar);
                },8000);
            }
        </script>';
    unset($_SESSION['msg']);
}
?>
