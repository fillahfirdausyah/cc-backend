  function filter_nama(){
    // var region_id = $('#daerah').filter(':selected').val();
    var region_id = 4;

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url:'admin/keuangan/nama/{id}',
        type: 'GET',
        data: { id: region_id },
        success: function(response){
          $.('#pilihan_nama').html(response);
        }
      });
  }