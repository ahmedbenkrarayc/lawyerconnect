<?php
require './../../utils/db.php';
require './../../guards/authGuard.php';

if(!isAuth('client')){
  header('Location: ./../auth/login.php');
}

$sql = 'SELECT * FROM user WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_COOKIE['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
      $picName = 'image'.time().rand(1000, 9999).'.'.pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES['photo']['tmp_name'], './../../assets/upload/'.$picName);
      $picName = '/assets/upload/'.$picName;
    }else{
      $picName = $user['photo'];
    }

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
  
    $sql = "UPDATE user SET fname = ?, lname = ?, email = ?, phone = ?, photo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $fname, $lname, $email, $phone, $picName, $_COOKIE['user_id']);
    if($stmt->execute()){
        header('Location: '.$_SERVER['PHP_SELF']);
    }
  
    $stmt->close();
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen pb-12">
    <div class="max-w-3xl mx-auto px-4 mt-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Banner -->
            <div class="h-32 bg-gradient-to-r from-blue-500 to-purple-600"></div>
            
            <div class="px-8 pb-8">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" class="space-y-6">
                <!-- Profile Picture Section -->
                <div class="relative -mt-16 mb-8">
                    <div class="relative inline-block">
                        <img src="<?php echo $user['photo'] ? $user['photo'] : 'https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg'?>" alt="Profile picture" 
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        <label class="absolute bottom-2 right-2 bg-white p-2 rounded-full shadow-lg cursor-pointer 
                            hover:bg-gray-50 transition-colors duration-200 group">
                            <input type="file" name="photo" class="hidden" accept="image/*">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </label>
                    </div>
                </div>

                <!-- Form Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" name="fname" value="<?php echo $user['fname'] ?>" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" name="lname" value="<?php echo $user['lname'] ?>" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>

                        <!-- Email -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="<?php echo $user['email'] ?>" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>

                        <!-- Phone -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="tel" name="phone" value="<?php echo $user['phone'] ?>" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-md hover:shadow-lg">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>