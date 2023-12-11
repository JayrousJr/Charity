<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row d-flex flex-column justify-content-center">
            <ul class="footer-menu">
                <li><a href="{{route('home')}}#home">Home</a></li>
                <li><a href="{{route('home')}}#project">Projects</a></li>
                <li><a href="{{route('home')}}#about">About</a></li>
                <li><a href="{{route('home')}}#volunteer">Volunteer</a></li>
                <li> <a href="{{route('contact.index')}}">Contact</a></li>
            </ul>
            <div class="footer-social">
                @foreach($social as $key => $data)
                <a href="{{$data->link}}"><i class="fa fa-{{$data->icon}}"></i></a>
                @endforeach
            </div>
            <p class="footer-text m-0">
                Copyright &copy;<script>
                document.write(new Date().getFullYear());
                </script> Developed By <a href="https://cloudstechn.com" target="_blank">TechClouds Team</a>
            </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->


<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/cdnjs.cloudflare.com_ajax_libs_moment.js_2.29.1_moment.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/main.js"></script>

<script>
$(document).ready(function() {
    function updateTimestamps() {
        $('.timestamp').each(function() {
            var timestamp = $(this).data('timestamp');
            var formattedTime = moment(timestamp).fromNow();
            $(this).text(formattedTime);
        });
    }

    // Initially update timestamps
    updateTimestamps();

    // Update timestamps every 30 seconds (adjust this interval as needed)
    setInterval(updateTimestamps, 3000);
});
</script>


<!-- <script>
$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#notification").fadeOut('slow');
    }, 3000);
});
</script>
<script>
$(document).ready(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getPagination(url);
    });

    function getPagination(url) {
        $.ajax({
            url: url,
            success: function(data) {
                $('.container').html(data);
            },
        });
    }
});
</script> -->
</body>

</html>