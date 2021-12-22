"use strict";

$("[data-checkboxes]").each(function() {
  var me = $(this),
    group = me.data('checkboxes'),
    role = me.data('checkbox-role');

  me.change(function() {
    var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
      checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
      dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
      total = all.length,
      checked_length = checked.length;

    if(role == 'dad') {
      if(me.is(':checked')) {
        all.prop('checked', true);
      }else{
        all.prop('checked', false);
      }
    }else{
      if(checked_length >= total) {
        dad.prop('checked', true);
      }else{
        dad.prop('checked', false);
      }
    }
  });
});

// tabel buku
$("#table-buku").dataTable({
  "pageLength": 25,
  "columnDefs": [
    { "sortable": false, "targets": [6] }
  ],
});

// tabel users
$("#table-user").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [4] }
  ]
});

$("#table-pinjaman").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [5] }
  ]
});
