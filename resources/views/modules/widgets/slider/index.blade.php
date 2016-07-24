@define($widget = $data['widget'])
@define($module = $data['module'])
@define($items = $widget->sliderItem())

<!--slider revolution start-->
<section class="slider-revolution-wrapper">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>

            @foreach($items->get() as $item)

                <!-- slide 1 start -->
                    <li class="" data-transition="fade" data-slotamount="7" data-masterspeed="500"
                        data-saveperformance="on" data-title="{{$item->title}}">

                        <img src="{{ url('uploads/slider/'.$item->image) }}" alt="" data-bgposition="center top"
                             data-bgfit="cover" data-bgrepeat="no-repeat">

                        @foreach($item->sliderDetails()->get() as $detail)

                        <!-- slide 1 end -->

                        <!-- LAYER NR. 1 -->
                        @define($animation = $detail->sliderAnimation()->first())

                            <div data-id="{{ $animation->id }}" class="{{ $animation->class_animation }}"
                                 data-x="{{ $animation->data_x }}"
                                 data-y="{{ $animation->data_y }}"
                                 data-speed="{{ $animation->data_speed }}"
                                 data-start="{{ $animation->data_start }}"
                                 data-customin = "{{ $animation->data_customin }}"
                                 data-customout = "{{ $animation->data_customout }}"
                                 data-easing="Back.easeOut"
                                 data-splitin=""
                                 data-splitout=""
                                 data-elementdelay="0.1"
                                 data-endelementdelay="0.1">
                                <span style="font-size: {{$detail->font_size}}px; color: {{$detail->color}}">{{$detail->text}}</span>
                            </div>
                    @endforeach

                    </li>

                @endforeach
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</section>
<!--slider revolution end-->