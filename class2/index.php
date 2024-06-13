<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDC VCEW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style type="text/css">
.css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}
.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}

</style>
</head>
<body>
    <div class="container-fluid text-center">
        <form id="formAction">
        <div class="row">
            <div class="col-4 m-auto">
                <div class="row">
                    <div class="col-md-12">
                        <label>Student Name</label>
                        <input type="text" name="studentName" id="studentName" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mt-3">
                          <span class="input-group-text" id="basic-addon3">Username</span>
                          <input type="text" class="form-control" id="username" name="username" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-info m-3" type="button" id="save">Save</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="row">
        <div class="col-8  m-auto">
            <table class="table table-bordered css-serial">
                <thead class="text-center bg-success text-white">
                    <tr>
                        <th>S.No</th>
                        <th>Student Name</th>
                        <th>Username</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="tableData">
                    
                </tbody>
            </table>
        </div>
    </div>
<div class="modal fade" tabindex="-1" id="editData">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Data Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formActionEdit">
                <div class="row">
                    <div class="col-md-12">
                        <label>Student Name</label>
                        <input type="text" name="studentNameEdit" id="studentNameEdit" class="form-control">
                        <input type="hidden" name="studentId" id="studentId" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mt-3">
                          <span class="input-group-text" id="basic-addon3">Username</span>
                          <input type="text" class="form-control" id="usernameEdit" name="usernameEdit" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-info m-3" type="button" id="update">Update</button>
                    </div>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function functionDelete(e){
        var id=$(e).data('id');
        $.ajax({
            type:"GET",
            url:"deleteData.php",
            dataType:"json",
            data:{"id":id},
            success:function(res) {
                if(res.status=="Done"){
                    alert(res.status);
                    $("#row"+id).remove();
                }else{
                    alert(res.status);
                }
            }
        })
    }
    function getStoredData(){
        $.ajax({
            type:"POST",
            url:"read.php",
            dataType:"json",
            success:function(res){
                 $("#tableData").html(res.data);
            }
        })
    }
    function functionEdit(e){
        var id=$(e).data('id');
        $.ajax({
            type:"POST",
            url:"showIdData.php",
            dataType:"json",
            data:{"id":id},
            success:function(res){
                $("#editData").modal("show");
                $("#studentNameEdit").val(res.student_name)
                $("#usernameEdit").val(res.username)
                $("#studentId").val(res.id)
            }
        })

    }
    $(document).ready(function(){
        getStoredData();
        $("#studentName").keydown(function(){
            var studentname=$(this).val();
            var sname=studentname.toUpperCase()
            $(this).val(sname);
        })
        // alert("hi");
        $("#save").click(function(){
            if($("#studentName").val()==""){
                $("#studentName").css("border","1px solid red");
                $("#studentName").focus();
                return false;
            }else{
                 $("#studentName").css("border","1px solid green");
            }
            if($("#username").val()==""){
                $("#username").css("border","1px solid red");
                $("#username").focus();
                return false;
            }else{
                 $("#username").css("border","1px solid green");
            }
            var studentname=$("#studentName").val();
            var username=$("#username").val();
            $.ajax({
                type:"POST",
                url:"save.php",
                dataType:"json",
                data:{"studentname":studentname,"username":username},
                success:function(res){
                    if(res.status=="Done"){
                        $("#tableData").append(res.data);
                    }
                }
            })
        })
        $("#update").click(function(){
            var id=$("#studentId").val();
            if($("#studentNameEdit").val()==""){
                $("#studentNameEdit").css("border","1px solid red");
                $("#studentNameEdit").focus();
                return false;
            }else{
                $("#studentNameEdit").css("border","1px solid green");
            }
            if($("#usernameEdit").val()==""){
                $("#usernameEdit").css("border","1px solid red");
                $("#usernameEdit").focus();
                return false;
            }else{
                $("#usernameEdit").css("border","1px solid green");
            }
            $.ajax({
                type:"POST",
                url:"update.php",
                dataType:"json",
                data:$("#formActionEdit").serialize(),
                success:function(res){
                    if(res.status=="Done"){
                        $("#row"+id).html(res.data);
                        $("#editData").modal("hide");
                    }
                }
            })
        })
    })
</script>