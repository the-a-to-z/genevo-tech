<div id="{{ $moduleName }}">
    <div id="map"></div>

    <div class="page-content">

        <div class="container">

            <div class="heading-title-alt  text-center ">
                #46, Street 558, Boeng Kork I, Khan Toulkork, Phnom Penh, Cambodia <br>
                023 555 31 38 <br>
                info@genevotech.com
            </div>

            <div class="heading-title  text-center ">
                <h3 class="text-uppercase">Contact us</h3>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    {{ Form::open(array('url' => '/contact-us', 'method' => 'POST', 'class'=>'contact-comments')) }}

                        <input type="hidden" name="form_page_url" value="{{ url()->current() }}">
                        <input type="hidden" name="module_id" value="{{ $data->module_id }}">

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
                                    <textarea name="message" id="text" class="cmnt-text form-control" placeholder="Message"
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