<?php
include '../../Controller/auth/user.php';
$c_user = new controllerUser();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $c_user->login($email,$password);
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
    

<form method="post"  class="max-w-md mx-auto mt-8" >
  <div class="relative z-0 w-full mb-5 group">
      <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['email'])){echo $_POST['email'];}?>' required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['emailErr'] )) { echo $_SESSION['emailErr']; $_SESSION['emailErr']=""; } ?></span></p>

  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value='<?php if(isset($_POST['password'])){echo $_POST['password'];}?>' required />
      <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"><?php if(!empty($_SESSION['passwordErr'] )) { echo $_SESSION['passwordErr'];$_SESSION['passwordErr']=""; } ?></span></p>

  </div>
  <button type="submit" name="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">login</button>

</form>
<div class="max-w-md mx-auto mt-8">
    
    <p class="text-gray-500 dark:text-gray-400">you don't have an account yet ?       <a href="register.php" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
    register now ...
    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
    </svg>
    </a></p>

      </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</body>
</html>