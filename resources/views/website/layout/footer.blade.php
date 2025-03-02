
  




  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>

  {{-- <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. --> --}}
  <script src="{{ asset('website/js/vendor/all.js') }}"></script>

  {{-- <!-- Vendor Scripts Standalone Libraries -->
  <!-- <script src="js/vendor/core/all.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.js"></script> -->
  <!-- <script src="js/vendor/core/bootstrap.js"></script> -->
  <!-- <script src="js/vendor/core/breakpoints.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.nicescroll.js"></script> -->
  <!-- <script src="js/vendor/core/isotope.pkgd.js"></script> -->
  <!-- <script src="js/vendor/core/packery-mode.pkgd.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.grid-a-licious.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.cookie.js"></script> -->
  <!-- <script src="js/vendor/core/jquery-ui.custom.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="js/vendor/core/handlebars.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="js/vendor/core/load_image.js"></script> -->
  <!-- <script src="js/vendor/core/jquery.debouncedresize.js"></script> -->
  <!-- <script src="js/vendor/core/modernizr.js"></script> -->
  <!-- <script src="js/vendor/core/velocity.js"></script> -->
  <!-- <script src="js/vendor/tables/all.js"></script> -->
  <!-- <script src="js/vendor/forms/all.js"></script> -->
  <!-- <script src="js/vendor/media/slick.js"></script> -->
  <!-- <script src="js/vendor/charts/flot/all.js"></script> -->
  <!-- <script src="js/vendor/nestable/jquery.nestable.js"></script> -->
  <!-- <script src="js/vendor/countdown/all.js"></script> -->
  <!-- <script src="js/vendor/angular/all.js"></script> -->

  <!-- App Scripts Bundle
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. --> --}}
  <script src="{{ asset('website/js/app/app.js') }}"></script>
<script>
    
    // function initScripts() {
    //     var $scripts = [
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.js",
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.extensions.js",
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.services.js",
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.microdata.js",
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.microformat.js",
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.overlays.js",
    //         "js/vendor/maps/google/jquery-ui-map/ui/jquery.ui.map.rdfa.js",
    //         "js/vendor/maps/google/jquery-ui-map/addons/infobox_packed.js",
    //         "js/vendor/maps/google/jquery-ui-map/addons/markerclusterer.min.js"
    //     ];

    //     $.each($scripts, function (k, v) {
    //         if ($('[src="' + v + '"]').length) return true;
    //         var scriptNode = document.createElement('script');

    //         scriptNode.src = v;
    //         $('head').prepend($(scriptNode));
    //     });

    //     $.extend($.ui.gmap.prototype, {
    //         pagination: function (prop, mapData) {
    //             var source = $("#map-pagination").html();
    //             var template = Handlebars.compile(source);
    //             var $el = $(template());

    //             var self = this, i = 0;
    //             prop = prop || 'title';
    //             self.set('pagination', function (a, b) {
    //                 if (a) {
    //                     i = i + b;
    //                     var m = self.get('markers')[ i ];
    //                     mapData.iw.open(i, m.get('content'));
    //                     $el.find('.display').text(m[ prop ]);
    //                     self.get('map').panTo(m.getPosition());
    //                 }
    //             });
    //             self.get('pagination')(true, 0);
    //             $el.find('.back-btn').click(function (e) {
    //                 e.preventDefault();
    //                 self.get('pagination')((i > 0), - 1, this);
    //             });
    //             $el.find('.fwd-btn').click(function (e) {
    //                 e.preventDefault();
    //                 self.get('pagination')((i < self.get('markers').length - 1), 1, this);
    //             });
    //             self.addControl($el, google.maps.ControlPosition[ mapData.options.paginationPosition ]);
    //         }
    //     });
    // }

</script>
  {{-- <!-- App Scripts Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL the modules are 100% compatible -->

  <!-- <script src="js/app/essentials.js"></script> -->
  <!-- <script src="js/app/material.js"></script> -->
  <!-- <script src="js/app/layout.js"></script> -->
  <!-- <script src="js/app/sidebar.js"></script> -->
  <!-- <script src="js/app/media.js"></script> -->
  <!-- <script src="js/app/messages.js"></script> -->
  <!-- <script src="js/app/maps.js"></script> -->
  <!-- <script src="js/app/charts.js"></script> -->

  <!-- App Scripts CORE [html]:
        Includes the custom JavaScript for this theme/module;
        The file has to be loaded in addition to the UI modules above;
        app.js already includes main.js so this should be loaded
        ONLY when using the standalone modules; -->
  <!-- <script src="js/app/main.js"></script> --> --}}
  @stack('js')
</body>


<!-- Mirrored from learning.frontendmatter.com/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jun 2024 19:48:52 GMT -->
</html>