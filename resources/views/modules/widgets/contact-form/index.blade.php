@define($widget = $data['widget'])
@define($module = $data['module'])

<div id="{{ $module->name }}" class="contact-form">
    <div id="map"></div>

    <div class="page-content">

        <div class="container">

            <div class="heading-title-alt  text-center ">
                {{ getSettingValue('company-address', $settings) }} <br>
                {{ getSettingValue('company-contact-number', $settings) }} <br>
                {{ getSettingValue('company-contact-email', $settings) }}
            </div>

            <div class="heading-title  text-center ">
                <h3 class="text-uppercase">Contact us</h3>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    {{ Form::open(array('url' => '/contact-us', 'method' => 'POST', 'class'=>'contact-comments')) }}

                    <input type="hidden" name="form_page_url" value="{{ url()->current() }}">
                    <input type="hidden" name="module_id" value="{{ $widget->module_id }}">

                    <div class="row">

                        <div class="col-md-6 ">

                            <div class="form-group">
                                <input type="text" name="name" id="name" class=" form-control" placeholder="Name *"
                                       maxlength="100" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class=" form-control"
                                       placeholder="Email *" maxlength="100" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class=" form-control" placeholder="Phone"
                                       maxlength="100">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <div class="form-group">
                                    <textarea name="message" id="text" class="cmnt-text form-control"
                                              placeholder="Message"
                                              maxlength="400"></textarea>
                            </div>
                            <div class="form-group full-width">
                                <button type="submit" class="btn btn-small btn-dark-solid ">
                                    Send Message
                                </button>
                            </div>
                        </div>

                    </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>

    </div>
</div>

@section('style')
    @parent
    <link href="{{ url('css/modules/contact-form/frontend.css') }}" rel="stylesheet">
@endsection

@section('script')
    @parent

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGYQW8u7lAmK5qkcxL8hyBcJQj8h1XZ9w&callback=initMap"
            async
            defer></script>

    <script type="text/javascript">
        <?php
        $googleMap = getSettingValue('company-map-coordination', $settings);
        $googleMapCor = explode(', ', $googleMap);
        $googleMapLat = (isset($googleMapCor[0]) ? $googleMapCor[0] : null);
        $googleMapLng = (isset($googleMapCor[1]) ? $googleMapCor[1] : null);
        ?>
        /**
         * Google map
         */
        function initMap() {
            var lat = {{ $googleMapLat }};
            var lng = {{ $googleMapLng }};
            var genevoLocation = {lat: lat, lng: lng};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: genevoLocation,
                scrollwheel: false,
            });

            var marker = new google.maps.Marker({
                position: genevoLocation,
                map: map,
                title: 'GeneVo Technology'
            });
        }
    </script>
@endsection