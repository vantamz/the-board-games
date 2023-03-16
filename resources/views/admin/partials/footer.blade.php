{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });
    });
    </script> --}}
<script type="text/javascript">
const currentLocation = location.href;
const menuItem = document.querySelectorAll('.dot');
const menuLength = menuItem.length
for(let i=0;i<menuLength;i++){
    if(menuItem[i].href===currentLocation){
        menuItem[i].className="active_1"
    }
}
</script>
<script>
    var user= document.getElementById("user");
    var role= document.getElementById("role");
    var permission= document.getElementById("permission");
    var userMain=document.getElementById("collapseUser");
    if($(user).hasClass('active_1')||$(role).hasClass('active_1')||$(permission).hasClass('active_1'))
    {
        userMain.className="show"
    }

</script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
@include('sweetalert::alert')

