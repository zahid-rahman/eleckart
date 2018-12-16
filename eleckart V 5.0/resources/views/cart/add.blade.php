{{--<div class="jquery-script-ads" style="margin:-9px auto;">--}}
{{--<script type="text/javascript">--}}
{{--/* jQuery_demo */--}}
{{--google_ad_slot = "2780937993";--}}
{{--google_ad_width = 700;--}}
{{--google_ad_height = 0;--}}
{{--//-->--}}
{{--</script>--}}
{{--<script type="text/javascript"--}}
{{--src="http://pagead2.googlesyndication.com/pagead/show_ads.js">--}}
{{--</script></div>--}}
{{--<form class="form-inline">--}}

    {{--<div class="stepper-widget">--}}

  {{--<div style="height: 40px">--}}
   {{--<button type="button" class="js-qty-down btn btn-primary">-</button>--}}
  {{--<input type="text" class="mh-100" style="width: 45px; height: 32px" value="1" disabled>--}}
    {{--<button type="button" class="js-qty-up btn btn-danger">+</button>--}}
    {{--</div>--}}
{{--</div>--}}
    {{--</form>--}}
    {{--<script type="text/javascript">--}}

{{--var _gaq = _gaq || [];--}}
{{--_gaq.push(['_setAccount', 'UA-36251023-1']);--}}
{{--_gaq.push(['_setDomainName', 'jqueryscript.net']);--}}
{{--_gaq.push(['_trackPageview']);--}}

{{--(function() {--}}
{{--var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;--}}
{{--ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';--}}
{{--var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);--}}
{{--})();--}}

{{--</script>--}}


$idOne = str_shuffle(md5(rand(0,100000)));
$idTwo = str_shuffle(md5(rand(0,100000)));

$inc = $idOne;
$dec =$idTwo;

<button onclick="increment()" id="{{$inc}}">+</button>
<input type="text" id="p1" />
<button onclick="decrement()" id="{{$dec}}">-</button>