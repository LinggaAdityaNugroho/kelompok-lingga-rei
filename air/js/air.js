$(document).ready(function () {
  uri = window.location.href;
  e.uri.split("=");
  console.log("URI :" + uri);

  if (e[1] == "user" || e[1] == "user_edit&nik") {
    if (e[1] == "user") {
      $("#summary, #chart, #user_add").hide();
    } else if (e[1] == "user_edit&nik") {
      $("#summary, #chart, #user_list").hide();
      $("#user_add").show();
    }
  }
  $(".datatable-dropdown").append(
    '<button type=button class="btn btn-sm btn-outline-primary me-2">Ubah</button>'
  );
  $(".datatable-dropdown button").click(function () {
    $("#user_list").hide();
    $("#user_add").show();
  });
});
