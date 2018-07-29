// 更改状态
function changeDataStatus(id,status) {
  let hint = '';
  hint  = status == 1 ? '禁用' : '启用';
  state = status == 1 ? -1 : 1;

  let postData = {
    'id' : id,
    'status' : state
  };
  swal({
      title: '确定'+hint+'?',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
  }).then(function(result) {
      $.get('changeStatus', postData, function (data) {
        console.log(data);
        if (data.error_code > 0)
        {
          swal({
                  title: data.msg,
                  timer: 2000,
                  showConfirmButton: false
              });
          return false;
        }

        if (data.error_code == 0)
        {
          swal({
                  title: data.msg,
                  buttonsStyling: false,
                  confirmButtonClass: "btn btn-success",
                  type: "success"
              }).then(function() {
                window.location.href="index";
              })
        }
      });
      return true;
  }).catch(swal.noop)
  return false;
};

//删除按钮
function del(id) {
  let apiUrl = 'delete/'+$('#evane-del-'+id).data('id');
   swal({
      title: '确定删除?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      confirmButtonText: '是的, 删除它!',
      cancelButtonText: '取消',
      buttonsStyling: false
  }).then(function() {
    
    console.log(apiUrl);
    $.get(apiUrl, '', function (data) {
        console.log(data);
        if (data.error_code > 0)
        {
          swal({
                  title: data.msg,
                  timer: 2000,
                  showConfirmButton: false
              });
        }

        if (data.error_code == 0)
        {
          swal({
                  title: data.msg,
                  buttonsStyling: false,
                  confirmButtonClass: "btn btn-success",
                  type: "success"
              }).then(function() {
                location.reload();
              })
        }
      });
  }).catch(swal.noop)
};