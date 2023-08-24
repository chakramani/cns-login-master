jQuery(document).ready(function () {
  jQuery("#admin_login_logo").click(function (e) {
    e.preventDefault();
    var imageUploader = wp.media({
      title: "Upload logo",
      multiple: false,
    });

    imageUploader.on("select", function () {
      var attachment = imageUploader.state().get("selection").first().toJSON();
      jQuery("#admin_login_logo_hidden").val(attachment.url);
      jQuery("#image_preview_login_logo").css('background-image', 'url('+attachment.url+')');
    });

    imageUploader.open();
  });
});
jQuery(document).ready(function () {
  jQuery("#admin_login_background_imge").click(function (e) {
    e.preventDefault();
    var imageUploader = wp.media({
      title: "Upload image",
      multiple: false,
    });

    imageUploader.on("select", function () {
      var attachment = imageUploader.state().get("selection").first().toJSON();
      jQuery("#admin_login_bg_image_hidden").val(attachment.url);
      jQuery("#mobile_image_preview_login_bg").css('background-image', 'url('+attachment.url+')');
    });

    imageUploader.open();
  });

  //range
  jQuery('input[type=range]').on('input', function () {
    var value = jQuery(this).val();
    jQuery('.bg-blur-range').text(value+'px');
});
});

