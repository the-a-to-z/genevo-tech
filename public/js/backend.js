type = ['','info','success','warning','danger'];
    	

backend = {
    initPickColor: function(){
        $('.pick-class-label').click(function(){
            var new_class = $(this).attr('new-class');  
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
            }
        });
    },
    
    initChartist: function(){    
        
        var dataSales = {
          labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
          series: [
             [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
            [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
            [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
          ]
        };
        
        var optionsSales = {
          lineSmooth: false,
          low: 0,
          high: 800,
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
          }),
          showLine: false,
          showPoint: false,
        };
        
        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
    
        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);
        
    
        var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
            [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695]
          ]
        };
        
        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };
        
        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
        
        Chartist.Bar('#chartActivity', data, options, responsiveOptions);
    
        var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };
        
        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };
    
        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);
        
        Chartist.Pie('#chartPreferences', {
          labels: ['62%','32%','6%'],
          series: [62, 32, 6]
        });   
    },
    
    initGoogleMaps: function(){
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
          zoom: 13,
          center: myLatlng,
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
          styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
    
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        
        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });
        
        // To add the marker to the map, call setMap();
        marker.setMap(map);
    },
    
	showNotification: function(from, align){
    	color = Math.floor((Math.random() * 4) + 1);
    	
    	$.notify({
        	icon: "pe-7s-gift",
        	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
        	
        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
	}
    
}

function iconList() {

    var icons = [
        'pe-7s-album',
        'pe-7s-arc',
        'pe-7s-back-2',
        'pe-7s-bandaid',
        'pe-7s-car',
        'pe-7s-diamond',
        'pe-7s-door-lock',
        'pe-7s-eyedropper',
        'pe-7s-female',
        'pe-7s-gym',
        'pe-7s-hammer',
        'pe-7s-headphones',
        'pe-7s-helm',
        'pe-7s-hourglass',
        'pe-7s-leaf',
        'pe-7s-magic-wand',
        'pe-7s-male',
        'pe-7s-map-2',
        'pe-7s-next-2',
        'pe-7s-paint-bucket',
        'pe-7s-pendrive',
        'pe-7s-photo',
        'pe-7s-piggy',
        'pe-7s-plugin',
        'pe-7s-refresh-2',
        'pe-7s-rocket',
        'pe-7s-settings',
        'pe-7s-shield',
        'pe-7s-smile',
        'pe-7s-usb',
        'pe-7s-vector',
        'pe-7s-wine',
        'pe-7s-cloud-upload',
        'pe-7s-cash',
        'pe-7s-close',
        'pe-7s-bluetooth',
        'pe-7s-cloud-download',
        'pe-7s-way',
        'pe-7s-close-circle',
        'pe-7s-id',
        'pe-7s-angle-up',
        'pe-7s-wristwatch',
        'pe-7s-angle-up-circle',
        'pe-7s-world',
        'pe-7s-angle-right',
        'pe-7s-volume',
        'pe-7s-angle-right-circle',
        'pe-7s-users',
        'pe-7s-angle-left',
        'pe-7s-user-female',
        'pe-7s-angle-left-circle',
        'pe-7s-up-arrow',
        'pe-7s-angle-down',
        'pe-7s-switch',
        'pe-7s-angle-down-circle',
        'pe-7s-scissors',
        'pe-7s-wallet',
        'pe-7s-safe',
        'pe-7s-volume2',
        'pe-7s-volume1',
        'pe-7s-voicemail',
        'pe-7s-video',
        'pe-7s-user',
        'pe-7s-upload',
        'pe-7s-unlock',
        'pe-7s-umbrella',
        'pe-7s-trash',
        'pe-7s-tools',
        'pe-7s-timer',
        'pe-7s-ticket',
        'pe-7s-target',
        'pe-7s-sun',
        'pe-7s-study',
        'pe-7s-stopwatch',
        'pe-7s-star',
        'pe-7s-speaker',
        'pe-7s-signal',
        'pe-7s-shuffle',
        'pe-7s-shopbag',
        'pe-7s-share',
        'pe-7s-server',
        'pe-7s-search',
        'pe-7s-film',
        'pe-7s-science',
        'pe-7s-disk',
        'pe-7s-ribbon',
        'pe-7s-repeat',
        'pe-7s-refresh',
        'pe-7s-add-user',
        'pe-7s-refresh-cloud',
        'pe-7s-paperclip',
        'pe-7s-radio',
        'pe-7s-note2',
        'pe-7s-print',
        'pe-7s-network',
        'pe-7s-prev',
        'pe-7s-mute',
        'pe-7s-power',
        'pe-7s-medal',
        'pe-7s-portfolio',
        'pe-7s-like2',
        'pe-7s-plus',
        'pe-7s-left-arrow',
        'pe-7s-play',
        'pe-7s-key',
        'pe-7s-plane',
        'pe-7s-joy',
        'pe-7s-photo-gallery',
        'pe-7s-pin',
        'pe-7s-phone',
        'pe-7s-plug',
        'pe-7s-pen',
        'pe-7s-right-arrow',
        'pe-7s-paper-plane',
        'pe-7s-delete-user',
        'pe-7s-paint',
        'pe-7s-bottom-arrow',
        'pe-7s-notebook',
        'pe-7s-note',
        'pe-7s-next',
        'pe-7s-news-paper',
        'pe-7s-musiclist',
        'pe-7s-music',
        'pe-7s-mouse',
        'pe-7s-more',
        'pe-7s-moon',
        'pe-7s-monitor',
        'pe-7s-micro',
        'pe-7s-menu',
        'pe-7s-map',
        'pe-7s-map-marker',
        'pe-7s-mail',
        'pe-7s-mail-open',
        'pe-7s-mail-open-file',
        'pe-7s-magnet',
        'pe-7s-loop',
        'pe-7s-look',
        'pe-7s-lock',
        'pe-7s-lintern',
        'pe-7s-link',
        'pe-7s-like',
        'pe-7s-light',
        'pe-7s-less',
        'pe-7s-keypad',
        'pe-7s-junk',
        'pe-7s-info',
        'pe-7s-home',
        'pe-7s-help2',
        'pe-7s-help1',
        'pe-7s-graph3',
        'pe-7s-graph2',
        'pe-7s-graph1',
        'pe-7s-graph',
        'pe-7s-global',
        'pe-7s-gleam',
        'pe-7s-glasses',
        'pe-7s-gift',
        'pe-7s-folder',
        'pe-7s-flag',
        'pe-7s-filter',
        'pe-7s-file',
        'pe-7s-expand1',
        'pe-7s-exapnd2',
        'pe-7s-edit',
        'pe-7s-drop',
        'pe-7s-drawer',
        'pe-7s-download',
        'pe-7s-display2',
        'pe-7s-display1',
        'pe-7s-diskette',
        'pe-7s-date',
        'pe-7s-cup',
        'pe-7s-culture',
        'pe-7s-crop',
        'pe-7s-credit',
        'pe-7s-copy-file',
        'pe-7s-config',
        'pe-7s-compass',
        'pe-7s-comment',
        'pe-7s-coffee',
        'pe-7s-cloud',
        'pe-7s-clock',
        'pe-7s-check',
        'pe-7s-chat',
        'pe-7s-cart',
        'pe-7s-camera',
        'pe-7s-call',
        'pe-7s-calculator',
        'pe-7s-browser',
        'pe-7s-box2',
        'pe-7s-box1',
        'pe-7s-bookmarks',
        'pe-7s-bicycle',
        'pe-7s-bell',
        'pe-7s-battery',
        'pe-7s-ball',
        'pe-7s-back',
        'pe-7s-attention',
        'pe-7s-anchor',
        'pe-7s-albums',
        'pe-7s-alarm',
        'pe-7s-airplay'
    ];

    var iconModal = '<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
    iconModal +='<div class="modal-dialog" role="document">';
    iconModal += '<div class="modal-content">';
    iconModal += '<div class="modal-header">';
    iconModal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    iconModal += '<h4 class="modal-title" id="gridSystemModalLabel">All available icons</h4>';
    iconModal += '</div>';
    iconModal += '<div class="modal-body">';

    iconModal += '<div class="content all-icons"><div class="row">';
    for(i=0; i<icons.length; i++) {
        iconModal += '<div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">';
        iconModal += '<div class="font-icon-detail"><i class="' + icons[i] + '"></i><p>' + icons[i] + '</p></div>';
        iconModal += '</div>';
    }

    iconModal += '</div></div>';
    iconModal += '</div>'; //modal-body
    iconModal += '</div>'; //modal-content
    iconModal += '</div>'; //modal-dialog
    iconModal += '</div>'; //modal

    return iconModal;
}

$(document).ready(function () {
   $('a[disabled]').click(function (e) {
       e.preventDefault();
       return false;
   });

    $(document).on('click', '.choose-icon', function () {
        if($('#iconModal').length == 0) {
            $('body').append(iconList());

            $('#iconModal').modal('show').data('target-input', $(this).closest('.icon-control').find('input[type="hidden"]'));
        }
    });

    $(document).on('click', '#iconModal .font-icon-detail', function () {
        var iconValue = $(this).find('p').text();
        var targetInput = $('#iconModal').data('target-input');

        $('#iconModal').modal('hide');

        targetInput.val(iconValue);
        targetInput.parent().find('button').html('<span class="icon ' + iconValue + '"></span><span>' + iconValue + '</span>');
    });

});

