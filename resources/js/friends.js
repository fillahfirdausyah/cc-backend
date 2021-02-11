var posts = new Vue({
    el: "#posts",
    data: {
      comment: '',
    },

    methods: {
      filterFriends: function(id){

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
          }
        });

        $.ajax({
          url:'/member/teman/' + id,
          type: "POST",
          data: {
            region_id: id
          },

          success:function(response){
                this.$set('messages', messages);
          },
          error: function(error){
            toastr.error(error.error)
          }
        });
      }
    },
  });