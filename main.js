jQuery(document).ready(function () {
  //upload logo
  jQuery("#admin_login_logo").click(function (e) {
    e.preventDefault();
    var imageUploader = wp.media({
      title: "Upload logo",
      multiple: false,
    });

    imageUploader.on("select", function () {
      var attachment = imageUploader.state().get("selection").first().toJSON();
      jQuery("#admin_login_logo_hidden").val(attachment.url);
      jQuery("#image_preview_login_logo").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
      jQuery(".pre-upload-logo").append("<img src=" + attachment.url + ">");
    });

    imageUploader.open();
  });

  // upload background image
  jQuery("#admin_login_background_imge").click(function (e) {
    e.preventDefault();
    var imageUploader = wp.media({
      title: "Upload image",
      multiple: false,
    });

    imageUploader.on("select", function () {
      var attachment = imageUploader.state().get("selection").first().toJSON();
      jQuery("#admin_login_bg_image_hidden").val(attachment.url);
      jQuery("#mobile_image_preview_login_bg").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
      jQuery(".pre-upload-bg-image").append("<img src=" + attachment.url + ">");
    });

    imageUploader.open();
  });

  // delete background image
  jQuery("#delete_admin_login_background_imge").click(function (e) {
    e.preventDefault();
    jQuery("#admin_login_bg_image_hidden").val("");
    jQuery("#mobile_image_preview_login_bg").css("background-image", "url('')");
  });

  //delete logo
  jQuery("#delete_admin_login_logo").click(function (e) {
    e.preventDefault();

    jQuery("#admin_login_logo_hidden").val("");
    jQuery("#image_preview_login_logo").css("background-image", "url('')");
  });

  //color code
  jQuery("#wl-form input[type='color']").on("input", function () {
    var color_code = this.value;
    jQuery(this).closest(".wl-login").find(".color-code").text(color_code);
  });
  //copy color code
  jQuery(".color-code").on("click", function () {
    var color_code= jQuery(this);
    var copied_msg = jQuery(this).closest(".wrapper").find("span.copied-message");
    console.time("time");
    console.log(copied_msg);
    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(this).first().text()).select();
    document.execCommand("copy");
    temp.remove();
    jQuery(this).addClass("copied");
    copied_msg.addClass("active");
    copied_msg.text('Copied!!');
    setInterval(function () {
      jQuery(color_code).removeClass("copied");
      jQuery(copied_msg).removeClass("active");
    }, 6000);
    console.timeEnd("time");
  });

  //range
  jQuery(".bg-blur").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".bg-blur-range").text(value + "px");
  });
  //width
  jQuery(".logo-width").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".logo-width-range").text(value + "px");
  });
  //height
  jQuery(".logo-height").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".logo-height-range").text(value + "px");
  });
  //font size
  jQuery(".font-size").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".font-size-range").text(value + "px");
  });
  //link font size
  jQuery(".link-font-size").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".link-font-size-range").text(value + "px");
  });
  //message box width
  jQuery(".message-box-width").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".message-box-width-range").text(value + "%");
  });
  //login btn font size
  jQuery(".login-btn-font-size").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".login-btn-font-size-range").text(value + "px");
  });
  //message box width
  jQuery(".form-container-width").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".form-container-width-range").text(value + "px");
  });
  // //bg-blur range
  // jQuery(".bg-blur").on("input", function () {
  //   var value = jQuery(this).val();
  //   jQuery(this).css('background',`linear-gradient(to right, #82CFD0 0%, #82CFD0 ${value}%, #fff ${value}%, white 100%)`);
  // });

  // //logo-width range
  // jQuery(".logo-width").on("input", function () {
  //   var value = jQuery(this).val();
  //   jQuery(this).css('background',`linear-gradient(to right, #82CFD0 0%, #82CFD0 ${value}/2%, #fff ${value}/2%, white 100%)`);
  // });
});

// function copy(this) {
//   console.time("time123");
//   console.log(this.text());
//   var temp = jQuery("<input>");
//   jQuery("body").append(temp);
//   temp.val(jQuery("#copyText1").text()).select();
//   document.execCommand("copy");
//   temp.remove();
//   console.timeEnd("time111");
// }
jQuery(document).ready(function () {
  //upload logo
  jQuery("#admin_login_logo").click(function (e) {
    e.preventDefault();
    var imageUploader = wp.media({
      title: "Upload logo",
      multiple: false,
    });

    imageUploader.on("select", function () {
      var attachment = imageUploader.state().get("selection").first().toJSON();
      jQuery("#admin_login_logo_hidden").val(attachment.url);
      jQuery("#image_preview_login_logo").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
      jQuery(".pre-upload-logo").append("<img src=" + attachment.url + ">");
    });

    imageUploader.open();
  });

  // upload background image
  jQuery("#admin_login_background_imge").click(function (e) {
    e.preventDefault();
    var imageUploader = wp.media({
      title: "Upload image",
      multiple: false,
    });

    imageUploader.on("select", function () {
      var attachment = imageUploader.state().get("selection").first().toJSON();
      jQuery("#admin_login_bg_image_hidden").val(attachment.url);
      jQuery("#mobile_image_preview_login_bg").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
      jQuery(".pre-upload-bg-image").append("<img src=" + attachment.url + ">");
    });

    imageUploader.open();
  });

  // delete background image
  jQuery("#delete_admin_login_background_imge").click(function (e) {
    e.preventDefault();
    jQuery("#admin_login_bg_image_hidden").val("");
    jQuery("#mobile_image_preview_login_bg").css("background-image", "url('')");
  });

  //delete logo
  jQuery("#delete_admin_login_logo").click(function (e) {
    e.preventDefault();

    jQuery("#admin_login_logo_hidden").val("");
    jQuery("#image_preview_login_logo").css("background-image", "url('')");
  });

  //color code
  jQuery("#wl-form input[type='color']").on("input", function () {
    var color_code = this.value;
    jQuery(this).closest(".wl-login").find(".color-code").text(color_code);
  });
  //copy color code
  jQuery(".color-code").on("click", function () {
    var color_code= jQuery(this);
    var copied_msg = jQuery(this).closest(".wrapper").find("span.copied-message");
    console.time("time");
    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(this).first().text()).select();
    document.execCommand("copy");
    temp.remove();
    jQuery(this).addClass("copied");
    copied_msg.addClass("active");
    copied_msg.text('Copied!!');
    setInterval(function () {
      jQuery(color_code).removeClass("copied");
      jQuery(copied_msg).removeClass("active");
    }, 6000);
    console.timeEnd("time");
  });

  //range
  jQuery(".bg-blur").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".bg-blur-range").text(value + "px");
  });
  //width
  jQuery(".logo-width").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".logo-width-range").text(value + "px");
  });
  //height
  jQuery(".logo-height").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".logo-height-range").text(value + "px");
  });
  //font size
  jQuery(".font-size").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".font-size-range").text(value + "px");
  });
  //link font size
  jQuery(".link-font-size").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".link-font-size-range").text(value + "px");
  });
  //message box width
  jQuery(".message-box-width").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".message-box-width-range").text(value + "%");
  });
  //login btn font size
  jQuery(".login-btn-font-size").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".login-btn-font-size-range").text(value + "px");
  });
  //message box width
  jQuery(".form-container-width").on("input", function () {
    var value = jQuery(this).val();
    jQuery(".form-container-width-range").text(value + "px");
  });
  // //bg-blur range
  // jQuery(".bg-blur").on("input", function () {
  //   var value = jQuery(this).val();
  //   jQuery(this).css('background',`linear-gradient(to right, #82CFD0 0%, #82CFD0 ${value}%, #fff ${value}%, white 100%)`);
  // });

  // //logo-width range
  // jQuery(".logo-width").on("input", function () {
  //   var value = jQuery(this).val();
  //   jQuery(this).css('background',`linear-gradient(to right, #82CFD0 0%, #82CFD0 ${value}/2%, #fff ${value}/2%, white 100%)`);
  // });
});

// function copy(this) {
//   console.time("time123");
//   console.log(this.text());
//   var temp = jQuery("<input>");
//   jQuery("body").append(temp);
//   temp.val(jQuery("#copyText1").text()).select();
//   document.execCommand("copy");
//   temp.remove();
//   console.timeEnd("time111");
// }
