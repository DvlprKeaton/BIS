<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script>
    window.addEventListener('load', function(){
        //Swal.fire("Login Success!", "Redirect to the dashboard", "success");
         //Swal.fire("Login Failed!", "Please Check your username & password", "error");

         Swal.fire({
          icon: 'error',
          title: 'Login Failed!',
          text: 'Please Check your username & password',
        }).then(function(){
            window.location = "login.php";
        })

    });
</script>