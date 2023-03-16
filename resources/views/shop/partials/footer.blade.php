<div class="container-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <h3>About Us</h3>
                Nguyễn Văn Tâm <br>
                Lâm Trường Đạt<br>
                Nguyễn Trang Anh Huy<br>
                Phạm Nhật An<br>
                Trần Thanh Duy<br>
                
            </div>
            <div class="col-lg-4 col-sm-12">
                <h3>Newsletter</h3>
                <p>Stay update with our latest</p>
                <form action="#">
                    <div class="input-group mb3">
                        <input type="text" class="form-control" id="email" placeholder="Enter email">
                        <label for="email"></label>
                        <button class="btn btn-warning"><i class="fa fa-long-arrow-right text-white" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-sm-12">
                <h3>Facebook Feed</h3>
                <div class="pt-3">
                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FDHCNSG%2Fposts%2F6131825460174272&show_text=true&width=500" width="500" height="779" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-black">
    <p class="text-center pb-5 mb-0">Copyright &reg; 2023 All rights</p>
</div>





{{--  <script>
        window.onscroll = function () {
            myFunction()
        };

        var navbar = document.getElementById("navBar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }

    </script> --}}

<script>
    function searchVisible() {
        document.getElementById("search_input_box").removeAttribute("class", "visible_hidden");
    }

</script>
<script>
    function searchHidden() {
        document.getElementById("search_input_box").setAttribute("class", "visible_hidden");
    }

</script>
@include('sweetalert::alert')
<!--Cart-->
<script src="{{ asset('FrontEnd/js/cart-bag.js') }}"></script>
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
<script>
    /*  $('.dropdown.keep-open').on({
     //fires after dropdown is shown instance method is called (if you click anywhere else)
     "shown.bs.dropdown": function() { this.close= true; },
    //when dropdown is clicked
    "click": function() { this.close= false; },
    //when close event is triggered
    "hide.bs.dropdown":  function() { return this.close; }
});
 */
    document.getElementById("keep-open").addEventListener('click', function () {
        event.stopPropagation();
    });

</script>
<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100556532443552");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
