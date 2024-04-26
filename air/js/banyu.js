$(document).ready(function () {
  uri = window.location.href;
  e = uri.split("=");
  console.log("URI :" + e);

  if (e[1] == "user" || e[1] == "user_edit&nik") {
    if (e[1] == "user") $("#summary, #user_add").hide();
    else if (e[1] == "user_edit&nik") {
      $("#summary, #user_list").hide();
      $("#user_add").show();
    }
  }
  $(".datatable-dropdown").append(
    '<button type=button class="btn btn-sm btn-outline-primary me-2">Ubah</button>'
  );
  $(".datatable-dropdown").append(
    '<button type=button class="btn btn-outline-success float-start me-2">Tambah Data</button>'
  );
  $(".datatable-dropdown button").click(function () {
    $("#user_list").hide();
    $("#user_add").show();
  });
});
