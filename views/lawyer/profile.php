<?php
require './../../utils/db.php';
require './../../guards/authGuard.php';

if(!isAuth('lawyer')){
  header('Location: ./../auth/login.php');
}

$sql = 'SELECT * FROM user WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_COOKIE['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();

$sql = 'SELECT * FROM lawyer_details WHERE id_lawyer = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_COOKIE['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$lawyer = $result->fetch_assoc();

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

  $speciality = htmlspecialchars($_POST['speciality']);
  $experience = htmlspecialchars($_POST['experience']);
  $hourlyrate = htmlspecialchars($_POST['hourlyrate']);
  $casecount = htmlspecialchars($_POST['casecount']);
  $country = htmlspecialchars($_POST['country']);
  $city = htmlspecialchars($_POST['city']);
  $address = htmlspecialchars($_POST['address']);
  $biographie = htmlspecialchars($_POST['biographie']);

  $sql = "UPDATE user SET fname = ?, lname = ?, email = ?, phone = ?, photo = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssssi', $fname, $lname, $email, $phone, $picName, $_COOKIE['user_id']);
  $stmt->execute();

  $stmt->close();

  if($lawyer){
    $sql = "UPDATE lawyer_details SET spcialite = ?, experience = ?, biographie = ?, country = ?, city = ?, address = ?, casecount = ?, hourly_rate = ? WHERE id_lawyer = ?";
  }else{
    $sql = "INSERT INTO lawyer_details(id_lawyer, spcialite, experience, biographie, country, city, address, casecount, hourly_rate) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
  }
  $stmt = $conn->prepare($sql);
  if($lawyer){
    $stmt->bind_param('sissssidi', $speciality, $experience, $biographie, $country, $city, $address, $casecount, $hourlyrate, $_COOKIE['user_id']);
  }else{
    $stmt->bind_param('isissssid', $_COOKIE['user_id'], $speciality, $experience, $biographie, $country, $city, $address, $casecount, $hourlyrate);
  }

  if($stmt->execute()){
    echo "<script>alert('updated successfully')</script>";
  }

  $stmt->close();
  $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body>
<div class="flex min-h-screen bg-gray-50">
  <!-- Sidebar -->
  <div class="w-64 bg-indigo-600 text-white">
    <!-- Logo Section -->
    <div class="flex items-center h-16 px-4">
      <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
      <span class="ml-2 text-xl font-bold">Dashboard</span>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-8 px-4 space-y-2">
      <a href="#" class="flex items-center px-4 py-2.5 bg-indigo-700 rounded-lg text-white group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="ml-3">Dashboard</span>
      </a>

      <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span class="ml-3">Users</span>
      </a>

      <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        <span class="ml-3">Analytics</span>
      </a>

      <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors group">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
        </svg>
        <span class="ml-3">Documents</span>
      </a>
    </nav>

    <!-- Teams Section -->
    <div class="mt-8 px-4">
      <h3 class="px-4 text-xs font-semibold text-indigo-200 uppercase tracking-wider">Teams</h3>
      <div class="mt-4 space-y-2">
        <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors">
          <span class="w-8 h-8 rounded-lg bg-indigo-800 flex items-center justify-center text-sm font-medium">D</span>
          <span class="ml-3">Design Team</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors">
          <span class="w-8 h-8 rounded-lg bg-indigo-800 flex items-center justify-center text-sm font-medium">E</span>
          <span class="ml-3">Engineering</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-white hover:bg-indigo-700 rounded-lg transition-colors">
          <span class="w-8 h-8 rounded-lg bg-indigo-800 flex items-center justify-center text-sm font-medium">M</span>
          <span class="ml-3">Marketing</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="flex-1">
    <!-- Top Navigation -->
    <div class="bg-white shadow">
      <div class="px-8 h-16 flex items-center justify-between">
        <div class="relative"></div>
        
        <div class="flex items-center space-x-4">
          <button class="p-2 text-gray-400 hover:text-gray-500">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
          <div class="flex items-center">
            <img src="<?php echo $user['photo'] ? $user['photo'] : 'https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg'?>" alt="Profile" class="w-8 h-8 rounded-full">
            <span class="ml-3 font-medium text-gray-700"><?php echo $user['fname'].' '.$user['lname'] ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Content -->
    <div class="p-8">
      <div class=" mx-auto bg-white rounded-xl shadow-sm">
        <div class="px-8 py-6 border-b border-gray-200">
          <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
          <p class="mt-1 text-sm text-gray-500">Update your personal information and profile photo.</p>
        </div>
        
        <div class="px-8 py-6">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" class="space-y-6">
            <!-- Profile Photo -->
            <div class="flex items-center space-x-6">
              <div class="shrink-0">
                <img id="image" src="<?php echo $user['photo'] ? $user['photo'] : 'https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg'?>" alt="Profile photo" class="h-24 w-24 rounded-full object-cover ring-4 ring-gray-100">
              </div>
              <label class="block">
                <span class="sr-only">Choose profile photo</span>
                <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100" accept="image/*"/>
              </label>
            </div>

            <!-- Form Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" required name="fname" value="<?php echo $user ? $user['fname'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" required name="lname" value="<?php echo $user ? $user['lname'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <input type="email" required name="email" value="<?php echo $user ? $user['email'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
              <input type="tel" required name="phone" value="<?php echo $user ? $user['phone'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Speciality</label>
              <input type="text" required name="speciality" value="<?php echo $lawyer ? $lawyer['spcialite'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Experience</label>
              <input type="number" required min="0" name="experience" value="<?php echo $lawyer ? $lawyer['experience'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Hourly rate</label>
              <input type="number" required min="0" name="hourlyrate" value="<?php echo $lawyer ? $lawyer['hourly_rate'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Number of cases</label>
              <input type="number" required min="0" name="casecount" value="<?php echo $lawyer ? $lawyer['casecount'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
              <input type="text" required name="country" value="<?php echo $lawyer ? $lawyer['country'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
              <input type="text" required name="city" value="<?php echo $lawyer ? $lawyer['city'] : '' ?>" class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
              <textarea name="address" required class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"><?php echo $lawyer ? $lawyer['address'] : '' ?></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
              <textarea name="biographie" required class="px-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"><?php echo $lawyer ? $lawyer['biographie'] : '' ?></textarea>
            </div>

            <div class="border-t border-gray-200 pt-6">
              <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save Changes
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="./../../assets/js/profileEdit.js"></script>
</body>
</html>