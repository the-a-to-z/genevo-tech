<footer id="footer" class="orange text-center footer-1">
    <div class="container">
        <a href="index.html" class="footer-logo wow zoomIn">
            @if(AppSetting::valueOf('company-logo'))
                @if(AppSetting::valueOf('company-logo-image-type') == 'svg-code')
                    {!! AppSetting::valueOf('company-logo') !!}
                @else
                    <img src="{{ url('/' . AppSetting::valueOf('company-logo')) }}" alt="AppSetting::valueOf('company-name')">
                @endif
            @else
                <h1>{!! AppSetting::valueOf('company-name') !!}</h1>
            @endif
        </a>
        <div class="copyright-container">
            <div class="copyright">
                &copy; {{ $companyName }} 2016.
            </div>
            <div class="copyright-sub-title">
                {{ $companyAddress }} <br>
                {!! $companyContactNumber !!} <br>
                {!! $companyContactEmail !!}
            </div>
        </div>

        <div class="social-link widget-social-link circle social-large">
            <a href="#" class="facebook">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="linkedin">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="#" class="google-plus">
                <i class="fa fa-google-plus"></i>
            </a>
        </div>
    </div>
</footer>