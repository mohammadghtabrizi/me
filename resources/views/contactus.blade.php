@extends('layouts.main')

@section('main-content')

	<div class="container padding-bottom-2x mb-2 " >
        <h3 class="margin-top-3x text-center mb-30" style="font-family:'b-yekan'">مشخصات و ادرس فروشگاههای ما</h3>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30">
              <div class="google-map" data-height="250" data-address="514 S. Magnolia St. Orlando, FL 32806, USA" data-zoom="15" data-disable-controls="true" data-scrollwheel="false" data-marker="img/map-marker.png" data-marker-title="We are here!" data-styles="[{&quot;featureType&quot;:&quot;administrative.country&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;},{&quot;hue&quot;:&quot;#ff0000&quot;}]}]"></div>
              <div class="card-body">
                <ul class="list-icon">
                  <li> <i class="icon-map"></i>تبریز - خیابان امام خمینی - میدان قطب پاساژ سبلان - طبقه همکف - پلاک 13</li>
                  <li class="dir-ltr"> <i class="icon-bell"></i>+98 41 33 36 48 19</li>
                  <li> <i class="icon-mail"></i><a class="navi-link" href="mailto:mohammad.gh.tabrizi@gmail.com">http://www.emdadit.com</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30">
              <div class="google-map" data-height="250" data-address="514 S. Magnolia St. Orlando, FL 32806, USA" data-zoom="15" data-disable-controls="true" data-scrollwheel="false" data-marker="img/map-marker.png" data-marker-title="We are here!" data-styles="[{&quot;featureType&quot;:&quot;administrative.country&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;},{&quot;hue&quot;:&quot;#ff0000&quot;}]}]"></div>
              <div class="card-body">
                <ul class="list-icon">
                  <li> <i class="icon-map"></i>تهران - خیابان شریعتی - خیابان پلیس - نبش کوچه صالحیان</li>
                  <li class="dir-ltr"> <i class="icon-bell"></i>+98 21 88 41 61 61</li>
                  <li> <i class="icon-mail"></i><a class="navi-link" href="mailto:mohammad.gh.tabrizi@gmail.com">http://www.emdadit.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
     </div>



@stop