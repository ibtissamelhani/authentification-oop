<?php
include '../../Controller/auth/user.php';
$c_user = new controllerUser();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $profile = $_FILES['profile']['name'];
    $tempfile = $_FILES['profile']['tmp_name'];
    $folder = "../../assets/imgs" . $profile;
    
    $c_user->registration($first_name,$last_name,$email,$password,$profile,$repeatPassword);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    <title>Document</title>
</head>
<body>
    

<form method="post" enctype="multipart/form-data"  class="max-w-md mx-auto mt-8" >
  <div class="relative z-0 w-full mb-5 group">
      <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['email'])){echo $_POST['email'];}?>'  />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['emailError'] )) { echo $_SESSION['emailError']; $_SESSION['emailError']="";} ?></span></p>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['password'])){echo $_POST['password'];}?>'  />
      <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['passwordError'] )) { echo $_SESSION['passwordError'];$_SESSION['passwordError']=""; } ?></span></p>

  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['repeat_password'])){echo $_POST['repeat_password'];}?>'  />
      <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['confirm_password_Error'] )) { echo $_SESSION['confirm_password_Error']; $_SESSION['confirm_password_Error']=""; } ?></span></p>

  </div>
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];}?>'  />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['f_namError'] )) { echo $_SESSION['f_namError'];$_SESSION['f_namError']=""; } ?></span></p>

    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];}?>'  />
        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['l_namError'] )) { echo $_SESSION['l_namError'];$_SESSION['l_namError']=""; } ?></span></p>

    </div>
  </div>
  
  <div class="relative z-0 w-full mb-5 group">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">profile picture</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" accept="image/*" name="profile" >
  </div>

  <button type="submit" name="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</body>
</html>