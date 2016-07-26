<div class="widget-social-link circle social-small">
    <a href="http://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}&title={{ $title }}"
       target="_blank"
    >
        <i class="fa fa-facebook"></i>
    </a>
    <a href="https://plus.google.com/share?url={{ Request::url() }}"
       target="_blank"
    >
        <i class="fa fa-google-plus"></i>
    </a>
    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ $title }}&source={{ getSettingValue('company-name', $settings) }}"
       target="_blank"
    >
        <i class="fa fa-linkedin"></i>
    </a>
</div>