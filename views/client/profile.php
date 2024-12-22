<?php
require './../../utils/db.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location: ./../../index.php');
}

$sql = 'SELECT u.*, l.* FROM user u, lawyer_details l WHERE u.id = l.id_lawyer AND u.id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$lawyer = $result->fetch_assoc();
if(!$lawyer){
    header('Location: ./../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lawyer['fname'].' '.$lawyer['lname'] ?></title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
</head>
<body>
<section class="w-full overflow-hidden dark:bg-gray-900">
    <div class="flex flex-col">
        <!-- Cover Image -->
        <img src="https://plus.unsplash.com/premium_photo-1694476607276-41276bc573e5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="lawyer Cover"
                class="w-full xl:h-[20rem] lg:h-[18rem] md:h-[16rem] sm:h-[14rem] xs:h-[11rem] object-cover" />

        <!-- Profile Image -->
        <div class="sm:w-[80%] xs:w-[90%] mx-auto flex">
            <img src="<?php echo $lawyer['photo'] ? $lawyer['photo'] : 'https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg'?>" alt="Lawyer Profile"
                    class="rounded-md lg:w-[12rem] lg:h-[12rem] md:w-[10rem] md:h-[10rem] sm:w-[8rem] sm:h-[8rem] xs:w-[7rem] xs:h-[7rem] outline outline-2 outline-offset-2 outline-blue-500 relative lg:bottom-[5rem] sm:bottom-[4rem] xs:bottom-[3rem]" />

            <!-- FullName -->
            <h1
                class="w-full text-left my-4 sm:mx-4 xs:pl-4 text-gray-800 dark:text-white lg:text-4xl md:text-3xl sm:text-3xl xs:text-xl font-serif">
                <?php echo $lawyer['fname'].' '.$lawyer['lname'] ?></h1>

        </div>

        <div
            class="xl:w-[80%] lg:w-[90%] md:w-[90%] sm:w-[92%] xs:w-[90%] mx-auto flex flex-col gap-4 items-center relative lg:-top-8 md:-top-6 sm:-top-4 xs:-top-4">
            <!-- Description -->
            <p class="w-fit text-gray-700 dark:text-gray-400 text-md"><?php echo $lawyer['biographie'] ?></p>


            <!-- Detail -->
            <div class="w-full my-auto py-6 flex flex-col justify-center gap-2">
                <div class="w-full flex sm:flex-row xs:flex-col gap-2 justify-center">
                    <div class="w-full">
                        <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">First Name</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['fname'] ?></dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Last Name</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['lname'] ?></dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Speciality</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['spcialite'] ?></dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Experience</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['experience'] ?></dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Number of cases</dt>
                                <dd class="text-lg font-semibold hover:text-blue-500"><?php echo $lawyer['casecount'] ?></dd>
                            </div>
                        </dl>
                    </div>
                    <div class="w-full">
                        <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Address</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['address'].', '.$lawyer['city'].', '.$lawyer['country'] ?></dd>
                            </div>

                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Phone Number</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['phone'] ?></dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                                <dd class="text-lg font-semibold"><?php echo $lawyer['email'] ?></dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Hourly rate</dt>
                                <dd class="text-lg font-semibold hover:text-blue-500"><?php echo $lawyer['hourly_rate'].'$' ?></dd>
                            </div>
                            <div class="flex flex-col pt-3 mt-6">
                                <button class="px-4 py-2 bg-black text-white text-sm hover:bg-gray-800">Book Now</button>
                            </div>
                        </dl>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section>
</body>
</html>