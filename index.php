<?php
require './utils/db.php';

$sql = "SELECT 
            user.*, 
            lawyer_details.*, 
            CONCAT(user.fname, ' ', user.lname) AS full_name 
        FROM 
            user 
        JOIN 
            lawyer_details 
        ON 
            user.id = lawyer_details.id_lawyer 
        WHERE 
            user.role = 'lawyer'";
$params = [];
$types = "";

if (!empty($_GET['name'])) {
    $sql .= " AND CONCAT(user.fname, ' ', user.lname) LIKE ?";
    $params[] = "%" . $conn->real_escape_string($_GET['name']) . "%";
    $types .= "s";
}

if (!empty($_GET['location'])) {
    $sql .= " AND lawyer_details.city LIKE ?";
    $params[] = "%" . $conn->real_escape_string($_GET['location']) . "%";
    $types .= "s";
}

if (!empty($_GET['speciality'])) {
    $sql .= " AND lawyer_details.spcialite LIKE ?";
    $params[] = "%" . $conn->real_escape_string($_GET['speciality']) . "%";
    $types .= "s";
}

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$lawyers = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/output.css">
</head>
<body class="font-poppins">
    <header class="relative">
        <nav class="flex items-center justify-between py-4 sm:px-6 md:px-14">
            <h1 class="font-semibold cursor-pointer">LawyerConnect</h1>
            <ul class="space-x-4 text-sm sm:hidden md:flex">
                <li><a href="#">Home</a></li>
                <li><a href="#">Find lawyer</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="sm:hidden md:flex items-center space-x-4 text-sm">
                <a href="#">Login</a>
                <a href="#" class="text-white bg-black px-4 py-2">Sign up</a>
            </div>
            <img class="sm:block md:hidden cursor-pointer" src="./assets/icons/menu.svg" alt="menu icon">
        </nav>

        <div class="hidden fixed w-[400px] h-screen bg-black text-white top-0 right-0 px-6 py-4">
            <img class="block ml-auto size-8 cursor-pointer" src="./assets/icons/x.svg" alt="x mark">
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6 mt-[80px]">Home</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Find lawyer</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">About</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Contact</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Login</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Sign up</a>
        </div>

        <div class="h-[600px] px-6 flex items-center justify-center bg-cover bg-blend-multiply bg-[#00000092] bg-[url('https://images.pexels.com/photos/8112199/pexels-photo-8112199.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2')]">
            <div class="w-fit text-center mx-auto text-white">
                <h1 class="text-4xl mt-4">Trusted legl solutionfor the real world.</h1>
                <p class="mt-4 text-xs">Connect with top lawyers near you and book your consultation with ease—legal help is just a click away!</p>
            </div>
        </div>
    </header>
    <section class="px-6 md:px-14 py-8 bg-gray-50">
        <section class="px-6 md:px-14 py-12">
<section class="px-6 md:px-14 py-12">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
    <div class="mx-auto mb-8">
        <div class="relative">
            <input name="name" type="text" 
                   placeholder="Search by name ..." 
                   class="w-full px-6 py-4 bg-gray-50 border-none rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-black/5 shadow-sm">
        </div>
    </div>

    <div class="max-w-6xl mx-auto mb-12">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex flex-wrap items-center gap-3">
                <select name="speciality" class="appearance-none px-6 py-2.5 bg-gray-50 border-none rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-black/5 cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="">Specialization</option>
                    <option value="corporate">Corporate</option>
                    <option value="intellectual-property">Intellectual Property</option>
                    <option value="employment">Employment</option>
                    <option value="contract">Contract</option>
                    <option value="tax">Tax</option>
                    <option value="securities">Securities</option>
                    <option value="criminal-defense">Criminal Defense</option>
                    <option value="prosecutor">Prosecutor</option>
                    <option value="white-collar-crime">White-Collar Crime</option>
                    <option value="personal-injury">Personal Injury</option>
                    <option value="family">Family</option>
                    <option value="estate-planning">Estate Planning</option>
                    <option value="real-estate">Real Estate</option>
                    <option value="consumer-protection">Consumer Protection</option>
                    <option value="environmental">Environmental</option>
                    <option value="human-rights">Human Rights</option>
                    <option value="immigration">Immigration</option>
                    <option value="public-interest">Public Interest</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="technology">Technology</option>
                    <option value="sports">Sports</option>
                    <option value="entertainment">Entertainment</option>
                    <option value="maritime">Maritime</option>
                    <option value="bankruptcy">Bankruptcy</option>
                    <option value="civil-litigation">Civil Litigation</option>
                    <option value="arbitration">Arbitration</option>
                    <option value="administrative">Administrative</option>
                    <option value="constitutional">Constitutional</option>
                    <option value="military">Military</option>
                </select>

                <select name="location" class="appearance-none px-6 py-2.5 bg-gray-50 border-none rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-black/5 cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="">Location</option>
                    <option value="casablanca">Casablanca</option>
                    <option value="rabat">Rabat</option>
                    <option value="marrakech">Marrakech</option>
                    <option value="fes">Fes</option>
                    <option value="tangier">Tangier</option>
                    <option value="agadir">Agadir</option>
                    <option value="meknes">Meknes</option>
                    <option value="oujda">Oujda</option>
                    <option value="kenitra">Kenitra</option>
                    <option value="tetouan">Tetouan</option>
                    <option value="safi">Safi</option>
                    <option value="el-jadida">El Jadida</option>
                    <option value="nador">Nador</option>
                    <option value="khouribga">Khouribga</option>
                    <option value="beni-mellal">Beni Mellal</option>
                    <option value="taza">Taza</option>
                    <option value="mohammedia">Mohammedia</option>
                    <option value="laayoune">Laayoune</option>
                    <option value="inezgane">Inezgane</option>
                    <option value="khemisset">Khemisset</option>
                    <option value="settat">Settat</option>
                    <option value="ouarzazate">Ouarzazate</option>
                    <option value="berkane">Berkane</option>
                    <option value="al-hoceima">Al Hoceima</option>
                    <option value="taroudant">Taroudant</option>
                    <option value="errachidia">Errachidia</option>
                    <option value="guelmim">Guelmim</option>
                    <option value="ksar-el-kebir">Ksar El Kebir</option>
                    <option value="tan-tan">Tan-Tan</option>
                    <option value="asilah">Asilah</option>
                </select>
            </div>
        </div>
        
    </div>
    <button type="submit" class="w-full bg-black text-white px-6 py-2 text-sm hover:bg-black/90 transition-colors mb-12 rounded-lg">Search</button>
    </form>    
    <!-- Lawyers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($lawyers as $lawyer): ?>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.pexels.com/photos/5668869/pexels-photo-5668869.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Lawyer" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold"><?php echo $lawyer['full_name'] ?></h3>
                    <p class="text-sm text-gray-600 mt-1"><?php echo $lawyer['spcialite'] ?></p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium">$<?php echo $lawyer['hourly_rate'] ?>/hour</span>
                        <a href="./views/client/profile.php?id=<?php echo $lawyer['id_lawyer'] ?>" class="px-4 py-2 bg-black text-white text-sm rounded-lg hover:bg-gray-800">View profile</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    </section>
    </section>
    <footer class="mt-[100px] bg-black sm:px-[4rem] md:px-[4rem] lg:px-[5rem] pt-[3rem] pb-[1rem]">
        <div class="md:flex md:gap-x-[80px] lg:gap-x-[100px] sm:w-fit mx-auto md:w-full">
            <div class="md:w-[25%]">
                <h1 class="text-white font-semibold text-xl">LawyerConnect</h1>
                <p class="text-[#D7D7D7] mt-2 text-xs">Offers modern, affordable clothing for Men, Women, and Kids, perfect for everyday wear</p>
            </div>
            <div class="md:w-[75%] grid md:grid-cols-4 gap-y-6 sm:mt-6 md:mt-0">
                <div>
                    <h1 class="text-white font-medium text-base mb-3">Pages</h1>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="./views/catalog.html">All products</a>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="./views/catalog.html">Men</a>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="./views/catalog.html">Women</a>
                </div>
                <div>
                    <h1 class="text-white font-medium text-base mb-3">Pages</h1>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="./views/About.html">About us</a>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="#">Contact</a>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="#">Affiliates</a>
                </div>
                <div>
                    <h1 class="text-white font-medium text-base mb-3">Support</h1>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="#">FAQs</a>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="#">Cookie Policy</a>
                    <a class="w-fit text-[#D7D7D7] block text-[13px] mb-1" href="#">Terms of Use</a>
                </div>
                <div>
                    <h1 class="text-white font-medium text-base mb-2">Payment</h1>
                    <div class="flex items-center gap-x-1">
                        <img class="bg-cover h-fit" src="./assets/icon/icmastercard.png" alt="mastercard icon">
                        <img class="bg-cover h-fit" src="./assets/icon/icvisa.png" alt="visa icon">
                        <img class="bg-cover h-fit" src="./assets/icon/icpaypal.png" alt="paypal icon">
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-10 mb-4">
        <p class="text-center text-[#D7D7D7] text-xs">Copyright ©2024. All right reserved</p>
    </footer>
</body>
</html>