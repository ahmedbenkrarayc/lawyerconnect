<?php
require './../../utils/db.php';
require './../../guards/authGuard.php';

if(!isAuth('lawyer')){
  header('Location: ./../auth/login.php');
}

$sql = 'SELECT r.*,u.fname, u.lname, u.phone FROM reservation r, user u, user l WHERE r.id_client = u.id AND r.id_lawyer = l.id AND r.id_lawyer = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_COOKIE['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$reservations = $result->fetch_all(MYSQLI_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo $_POST['action'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body>
<div class="flex min-h-screen">
  <div class="w-64 bg-indigo-600 text-white p-4 flex flex-col">
    <div class="mb-8">
      <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </div>

    <nav class="space-y-1">
      <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-indigo-700">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span>Dashboard</span>
      </a>

    </nav>
    <div class="mt-auto">
      <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-indigo-700">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span>Settings</span>
      </a>
    </div>
  </div>

  <!-- Main Content Area -->
  <div class="flex-1 p-8">
    <!-- Top Navigation -->
    <div class="flex justify-between items-center mb-8">
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
          <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none">
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </span>
        <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 border rounded-lg w-64">
      </div>
      <div class="flex items-center space-x-4">
        <button class="text-gray-400 hover:text-gray-500">
          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>
        <button class="flex items-center space-x-2">
          <img src="/api/placeholder/40/40" alt="Profile" class="h-8 w-8 rounded-full">
          <span class="text-sm font-medium text-gray-700">Tom Cook</span>
        </button>
      </div>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach($reservations as $item): ?>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="">
                  <div class="text-sm font-medium text-gray-900"><?php echo $item['fname'].' '.$item['lname'] ?></div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900"><?php echo $item['phone'] ?></div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <?php 
                if($item['status'] == 'confirmed'){
                  echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">'.$item['status'].'</span>';
                }else if($item['status'] == 'waiting'){
                  echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">'.$item['status'].'</span>';
                }else{
                  echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">'.$item['status'].'</span>';
                }
              ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $item['date_reservation'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <button name="action" value="confirmed" class="bg-green-500 text-white px-3 py-1 rounded-md mr-2 hover:bg-green-600">Accepter</button>
                <button name="action" value="canceled" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Refuser</button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>