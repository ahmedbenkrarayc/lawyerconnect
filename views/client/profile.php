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
$stmt->close();
if(!$lawyer){
    header('Location: ./../../index.php');
}

$sql = 'SELECT date_debut, date_fin FROM unavailable WHERE id_lawyer = ? AND date_fin >= CURDATE()';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$dates = $result->fetch_assoc();

$date_start = '';
$date_end = '';
if($dates){
    $date_start = $dates['date_debut'];
    $date_end = $dates['date_fin'];
}

$date_start_js = $date_start ? (new DateTime($date_start))->format('Y-m-d') : '';
$date_end_js = $date_end ? (new DateTime($date_end))->format('Y-m-d') : '';

$stmt->close();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_COOKIE['user_id'];
    $lawyer_id = $_GET['id'];
    $selected_date = $_POST['selected_date'];
    $status = 'waiting';

    $sql = 'INSERT INTO reservation(id_client, id_lawyer, date_reservation, status) VALUES(?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiss', $user_id, $lawyer_id, $selected_date, $status);
    $stmt->execute();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lawyer['fname'].' '.$lawyer['lname'] ?></title>
    <link rel="stylesheet" href="./../../assets/css/output.css">
    <style>
        #calendar {
        display: flex;
        flex-direction: column;
        width: 320px;
        margin: 20px auto;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        }
        #calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        #calendar-header button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
        }
        #calendar-header button:hover {
        background-color: #0056b3;
        }
        #calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        margin-top: 10px;
        }
        .day {
        text-align: center;
        padding: 10px;
        cursor: pointer;
        border: 1px solid #ddd;
        border-radius: 4px;
        }
        .day:hover {
        background-color: #f0f0f0;
        }
        .selected {
        background-color: #007bff;
        color: white;
        }
  </style>
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
    <div id="calendar">
    <div id="calendar-header">
      <button id="prev-month">←</button>
      <h3 id="month-year"></h3>
      <button id="next-month">→</button>
    </div>
    <div id="calendar-days"></div>
  </div>
  <form id="date-form" action="" method="POST" style="display: none;">
    <input type="hidden" name="selected_date" id="selected_date">
    <input type="submit" value="Submit Date">
  </form>
  <script>
    const calendarDays = document.getElementById('calendar-days');
    const monthYear = document.getElementById('month-year');
    const prevMonth = document.getElementById('prev-month');
    const nextMonth = document.getElementById('next-month');
    const dateForm = document.getElementById('date-form');
    const selectedDateInput = document.getElementById('selected_date');

    let currentDate = new Date();

    // Get the disabled date range from PHP
    const dateStart = '<?php echo $date_start_js; ?>';
    const dateEnd = '<?php echo $date_end_js; ?>';

    // Function to check if a date is within the range
    function isDateDisabled(date) {
      if (dateStart && dateEnd) {
        const startDate = new Date(dateStart);
        const endDate = new Date(dateEnd);
        return date >= startDate && date <= endDate;
      }
      return false; // If no range is set, no date is disabled
    }

    function renderCalendar(date) {
      const year = date.getFullYear();
      const month = date.getMonth();
      const firstDay = new Date(year, month, 1).getDay();
      const daysInMonth = new Date(year, month + 1, 0).getDate();

      calendarDays.innerHTML = '';
      monthYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;

      for (let i = 0; i < firstDay; i++) {
        const emptyDay = document.createElement('div');
        calendarDays.appendChild(emptyDay);
      }

      for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        const currentDay = new Date(year, month, day);
        dayElement.textContent = day;
        dayElement.classList.add('day');

        // Check if the date is disabled
        if (isDateDisabled(currentDay)) {
          dayElement.classList.add('disabled');
          dayElement.style.cursor = 'not-allowed';  // Disable clicking
        } else {
          dayElement.addEventListener('click', () => {
            document.querySelectorAll('.day').forEach(d => d.classList.remove('selected'));
            dayElement.classList.add('selected');
            
            // Set the selected date value in the hidden input field
            selectedDateInput.value = `${year}-${month + 1}-${day < 10 ? '0' + day : day}`;
            
            // Submit the form
            dateForm.submit();
          });
        }

        calendarDays.appendChild(dayElement);
      }
    }

    prevMonth.addEventListener('click', () => {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar(currentDate);
    });

    nextMonth.addEventListener('click', () => {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
  </script>
</section>
</body>
</html>