<?php
require './../../utils/db.php';

$errors = [
    'fname' => '',
    'lname' => '',
    'email' => '',
    'password' => '',
    'role' => '',
    'phone' => '',
];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['fname'])  && !empty($_POST['fname'])){
        $errors['fname'] = '';
    }else{
        $errors['fname'] = 'First name is required !';
    }

    if(isset($_POST['lname'])  && !empty($_POST['lname'])){
        $errors['lname'] = '';
    }else{
        $errors['lname'] = 'Last name is required !';
    }

    if(isset($_POST['phone'])  && !empty($_POST['phone'])){
        $errors['phone'] = '';
    }else{
        $errors['phone'] = 'Phone is required !';
    }

    if(isset($_POST['email'])  && !empty($_POST['email'])){
        $errors['email'] = '';
    }else{
        $errors['email'] = 'Email is required !';
    }

    if(isset($_POST['password'])  && !empty($_POST['password'])){
        $errors['password'] = '';
    }else{
        $errors['password'] = 'Password is required !';
    }

    if(isset($_POST['role'])  && !empty($_POST['role'])){
        $errors['role'] = '';
    }else{
        $errors['role'] = 'Role is required !';
    }

    $isValid = true;
    foreach($errors as $error){
        if($error != '')
            $isValid = false;
    }

    if($isValid){
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $role = htmlspecialchars($_POST['role']);
        $sql = "INSERT INTO user(fname, lname, email, phone, password, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $fname, $lname, $email, $phone, md5($password), $role);
        if($stmt->execute()){
            header('Location: ./login.php');
        }

        $stmt->close();
        $conn->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body>
    <div class="bg-gray-50">
        <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="text-center sm:mx-auto sm:w-full sm:max-w-md">
                <h1 class="text-3xl font-extrabold text-gray-900">
                    Sign up
                </h1>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="space-y-6">
                        <div>
                            <label for="fname" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="mt-1">
                                <input id="fname" type="text"
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>">
                                <span class="text-red-500 text-xs"><?php echo $errors['fname'] ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="lname" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input id="lname" type="text"
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    name="lname" required value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>">
                                <span class="text-red-500 text-xs"><?php echo $errors['lname'] ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <div class="mt-1">
                                <input id="phone" type="text" data-testid="username"
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    name="phone" required value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                                <span class="text-red-500 text-xs"><?php echo $errors['phone'] ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1">
                                <input id="email" type="email" data-testid="username"
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    name="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                                <span class="text-red-500 text-xs"><?php echo $errors['email'] ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="mt-1">
                                <input id="password" required name="password" type="password" data-testid="password"
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    >
                                <span class="text-red-500 text-xs"></span>
                            </div>
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <div class="mt-1">
                                <select id="role" name="role"
                                    required
                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    >
                                    <option value="client">Client</option>
                                    <option value="lawyer">Lawyer</option>
                                </select>
                                <span class="text-red-500 text-xs"></span>
                            </div>
                        </div>
                        <div>
                            <button data-testid="login" type="submit"
                                class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>