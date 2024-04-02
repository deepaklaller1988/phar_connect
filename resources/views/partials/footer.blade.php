<footer>
      <div class="footerLinks">
        <ul>
          <li><b>Get Support</b></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Help Center</a></li>
          <li><a href="">Live Chat</a></li>
          <li><a href="">Check Status</a></li>
          <li><a href="">Reports</a></li>
        </ul>
        <ul>
          <li><b>Assurance</b></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Help Center</a></li>
          <li><a href="">Live Chat</a></li>
          <li><a href="">Check Status</a></li>
        </ul>
        <ul>
          <li><b>Source on PharmConnect</b></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Help Center</a></li>
          <li><a href="">Live Chat</a></li>
          <li><a href="">Check Status</a></li>
          <li><a href="">Reports</a></li>
        </ul>
        <ul>
          <li><b>Become Partner</b></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Help Center</a></li>
          <li><a href="">Live Chat</a></li>
          <li><a href="">Reports</a></li>
        </ul>
        <ul>
          <li><b>Get to Know us</b></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Help Center</a></li>
          <li><a href="">Live Chat</a></li>
          <li><a href="">Check Status</a></li>
          <li><a href="">Reports</a></li>
        </ul>
      </div>
      <div class="footerSocialPartner">
        <div class="socialApps">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-google"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-youtube"></a>
          <a href="#" class="fa fa-instagram"></a>
        </div>
        <div class="socialPartner">
          <ul>
            <li><a href="">Become a Partner</a></li> |
            <li><a href="">Become a Member</a></li>
          </ul>
          <a href="">Feedback <img src="{{asset('/assets/images/partner.png')}}" alt="partner" /></a>
        </div>
      </div>
      <div class="copyrighter">PharmConnect | ©copyright 2024</div>
    </footer>
    @push('js')
<script>
    function partnerFunction() {
      var element = document.getElementById("partnerOption");
      element.classList.toggle("openPartnerOption");
    }
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll > 300) {
        $("header").addClass("fixHeader");
    } 
    else {
        $("header").removeClass("fixHeader");
    }
});

  </script>

<script type="text/javascript">
    $(document).on('ready', function () {
      $(".regular").slick({
        dots: true,
        prevArrow: false,
        nextArrow: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
      });
      $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
      });
    });
  </script>
  
<script>
    $('.videos-slider-2').slick({
  autoplay: true,
  slidesToScroll: 1,
  slidesToShow: 1,
  arrows: false,
  dots: false,
  asNavFor: '.slider-nav-thumbnails',
});

$('.slider-nav-thumbnails').slick({
  autoplay: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.videos-slider-2',
  dots: false,
  focusOnSelect: true,
  variableWidth: true,
  arrows: false,
});

// Remove active class from all thumbnail slides
$('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

// Set active class to first thumbnail slides
$('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
$('.videos-slider-2').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  var mySlideNumber = nextSlide;
  $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
  $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
</script>
@endpush