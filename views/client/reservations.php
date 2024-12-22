<?php 
require './../../utils/db.php';
require './../../guards/authGuard.php';

if(!isAuth('client')){
  header('Location: ./../auth/login.php');
}

$sql = 'SELECT r.*, l.*, r.id AS id_res FROM reservation r, user u, user l WHERE r.id_client = u.id AND r.id_lawyer = l.id AND u.id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_COOKIE['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$reservations = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = 'UPDATE reservation SET status = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $_POST['action'], $_POST['id']);
    if($stmt->execute()){
      header('Location: '.$_SERVER['PHP_SELF']);
      $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations List</title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Reservations</h1>
            <p class="text-sm text-gray-600">Manage your upcoming bookings</p>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lawyer Name
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lawyer phone
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lawyer email
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Reservation date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach($reservations as $reservation): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="<?php echo $reservation['photo'] ?>" alt="Avatar" class="w-8 h-8 rounded-full">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $reservation['fname'].' '.$reservation['lname'] ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo $reservation['phone'] ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo $reservation['email'] ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo $reservation['date_reservation'] ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php 
                                    if($reservation['status'] == 'confirmed'){
                                        echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">'.$reservation['status'].'</span>';
                                    }else if($reservation['status'] == 'waiting'){
                                        echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">'.$reservation['status'].'</span>';
                                    }else{
                                        echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">'.$reservation['status'].'</span>';
                                    }
                                ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $reservation['id_res'] ?>">
                                    <?php 
                                        if($reservation['status'] == 'confirmed' || $reservation['status'] == 'waiting'){
                                            echo '<button type="submit" name="action" value="canceled" class="text-red-600 hover:text-red-900">Cancel</button>';
                                        }
                                    ?>
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