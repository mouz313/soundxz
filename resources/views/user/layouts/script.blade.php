<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
  <script src="{{asset('libs/tether/dist/js/tether.min.js')}}"></script>
  <script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- core -->
  <script src="{{asset('libs/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
  <script src="{{asset('libs/jquery.stellar/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('libs/jscroll/jquery.jscroll.min.js')}}"></script>
  <script src="{{asset('libs/PACE/pace.min.js')}}"></script>
  <script src="{{asset('libs/jquery-pjax/jquery.pjax.js')}}"></script>

<script src="{{asset('libs/mediaelement/build/mediaelement-and-player.min.js')}}"></script>
  <script src="{{asset('libs/mediaelement/build/mep.js')}}"></script>
  <script src="{{asset('scripts/player.js')}}"></script>


  <script src="{{asset('scripts/config.lazyload.js')}}"></script>
  <script src="{{asset('scripts/ui-load.js')}}"></script>
  <script src="{{asset('scripts/ui-jp.js')}}"></script>
  <script src="{{asset('scripts/ui-include.js')}}"></script>
  <script src="{{asset('scripts/ui-device.js')}}"></script>
  <script src="{{asset('scripts/ui-form.js')}}"></script>
  <!-- <script src="scripts/ui-nav.js"></script> -->
  <script src="{{asset('scripts/ui-screenfull.js')}}"></script>
  <script src="{{asset('scripts/ui-scroll-to.js')}}"></script>
  <script src="{{asset('scripts/ui-toggle-class.js')}}"></script>
  <script src="{{asset('scripts/ui-taburl.js')}}"></script>
  <script src="{{asset('scripts/app.js')}}"></script>
  <script src="{{asset('scripts/site.js')}}"></script>
  <script src="{{asset('scripts/ajax.js')}}"></script>
<!-- endbuild -->


   @include('user.layouts.newscript')
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



</body>
</html>