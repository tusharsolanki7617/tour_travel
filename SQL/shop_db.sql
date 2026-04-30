-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2025 at 08:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(33, 1, 1, 'Bali', 88048, 1, 'bali_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(9, 1, 'Yuvraj', 'yuvraj355@gmail.com', '1784920923', 'packege is high price');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 1, 'tushar solanki', '2789182778', 'Tushar633712@gmail.com', 'cash on delivery', 'flat no. rajkot, yy, rajkot, Gujarat, India - 360020', 'admin (11111 x 1) - ', 11111, '2025-03-16', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  `image_04` text NOT NULL,
  `image_05` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`, `image_04`, `image_05`) VALUES
(1, 'Bali', 'Bali – where the sunsets paint the sky, the beaches whisper serenity, and every moment feels like a dream. 🌴✨ From lush green rice terraces to vibrant cultural temples, this island is a perfect blend of adventure and tranquility. Whether you&#39;re chasing waterfalls, exploring hidden beaches, or indulging in local flavors, Bali&#39;s charm never fades. 🏝️🌅 Let the ocean breeze refresh your soul and the warm Balinese hospitality make you feel at home.  come and Every corner is a postcard, every experience a memory to cherish.        - With Flight - Sunday', 88048, 'bali_1.jpg', 'bali_2.jpg', 'bali_3.jpg', 'bali_4.jpg', 'bali_5.jpg'),
(2, 'Brazil', 'Brazil – a land of vibrant culture, stunning beaches, and endless adventure! 🇧🇷✨ From the iconic Christ the Redeemer in Rio to the breathtaking Amazon rainforest, every corner of this country is full of life. Dance to the rhythm of samba, savor delicious Brazilian cuisine, and soak up the sun on golden beaches like Copacabana. 🌴🌊 Whether it’s carnival vibes or nature’s wonders, Brazil never fails to amaze!.', 99996, 'brazil_1.jpg', 'brazil_2.jpg', 'brazil_3.jpg', 'brazil_4.jpg', 'brazil_5.jpg'),
(3, 'Dubai', 'Dubai – where modern marvels meet Arabian charm! 🌆✨ From the towering Burj Khalifa to the golden dunes of the desert, this city is a blend of luxury, adventure, and culture. Shop in world-class malls, cruise through Dubai Marina, or explore the historic souks. 🏝️🌇 Whether it&#39;s sky-high views, thrilling desert safaris, or lavish experiences, Dubai never stops dazzling! 🌟🏜️', 50999, 'dubai_1.jpg', 'dubai_2.jpg', 'dubai_3.jpg', 'dubai_4.jpg', 'dubai_5.jpg'),
(4, 'Easter island', 'Easter Island – a mysterious land of ancient wonders and breathtaking landscapes! 🌿🗿 Home to the iconic Moai statues, this remote island in the Pacific is rich in history, culture, and natural beauty. Explore volcanic craters, relax on pristine beaches, and uncover the secrets of the Rapa Nui civilization.', 74097, 'easter island_1.jpg', 'easter island_2.jpg', 'easter island_3.jpg', 'easter island_4.jpg', 'easter island_5.jpg'),
(5, 'Corsica', 'Corsica – the ‘Island of Beauty’ where rugged mountains meet turquoise seas! 🏝️✨ With its charming coastal villages, lush forests, and golden beaches, this Mediterranean gem is perfect for adventure and relaxation. Hike the dramatic GR20 trail, explore historic towns like Bonifacio, or simply unwind by the crystal-clear waters.', 78097, 'corsica_1.jpg', 'corsica_2.jpg', 'corsica_3.jpg', 'corsica_4.jpg', 'corsica_5.jpg'),
(7, 'Egypt', 'Egypt – where history comes alive! 🏺✨ From the majestic Pyramids of Giza to the tranquil waters of the Nile, this land of pharaohs is a timeless wonder. Explore ancient temples, sail on a felucca, and discover the secrets of the Sphinx. 🏜️🌊 Whether you&#39;re marveling at Luxor’s ruins or diving in the Red Sea, Egypt is a journey through time and beauty.', 92341, 'egypt_1.jpg', 'egypt_2.jpg', 'egypt_3.jpg', 'egypt_4.jpg', 'egypt_5.jpg'),
(9, 'Hong kong', 'Hong Kong – a dazzling blend of tradition and modernity! 🌆🏮 From iconic skyscrapers to vibrant street markets, this city never sleeps. Take in breathtaking skyline views from Victoria Peak, explore ancient temples, or indulge in world-class dim sum. 🍜✨ Whether it’s shopping in Mong Kok, relaxing at Repulse Bay, or experiencing the Symphony of Lights, Hong Kong is a city full of energy and charm.', 74697, 'hong kong_1.jpg', 'hong kong_2.jpg', 'hong kong_3.jpg', 'hong kong_4.jpg', 'hong kong_5.jpg'),
(10, 'Almaty', 'Almaty – where nature meets urban charm! ⛰️🌆 Nestled at the foot of the majestic Tian Shan mountains, Kazakhstan’s cultural hub offers breathtaking landscapes and vibrant city life. Explore the stunning Medeu ice rink, take a cable car to Kok-Tobe, or wander through the colorful Green Bazaar. 🍉❄️ From adventure in the great outdoors to rich history and modern delights, Almaty is a hidden gem waiting to be discovered.', 69698, 'almaty_1.jpg', 'almaty_2.jpg', 'almaty_3.jpg', 'almaty_4.jpg', 'almaty_5.jpg'),
(11, 'Malaysia', 'Malaysia – a vibrant mix of cultures, nature, and modern wonders! 🇲🇾✨ From the iconic Petronas Towers in Kuala Lumpur to the serene beaches of Langkawi, this country offers endless adventures. Explore lush rainforests, indulge in delicious street food, and experience the rich heritage of diverse communities. 🌿🏝️ Whether you&#39;re trekking in Borneo, shopping in bustling markets, or relaxing on tropical islands, Malaysia has something for everyone.', 65000, 'malaysia_1.jpg', 'malaysia_2.jpg', 'malaysia_3.jpg', 'malaysia_4.jpg', 'malaysia_5.jpg'),
(12, 'Maldives', 'Maldives – a paradise of crystal-clear waters, white sandy beaches, and endless serenity! 🏝️✨ Dive into vibrant coral reefs, relax in luxury overwater villas, and soak in breathtaking sunsets over the Indian Ocean. 🌊🐠 Whether it&#39;s snorkeling with marine life, enjoying a private beach dinner, or simply unwinding in nature’s beauty, the Maldives is the ultimate tropical escape.', 78698, 'maldives__1.jpg', 'maldives_2.jpg', 'malaysia_3.jpg', 'maldives_4.jpg', 'maldives_5.jpg'),
(13, 'Mountains', 'Mountains – where adventure meets tranquility! ⛰️✨ Breathe in the crisp, fresh air, hike through breathtaking trails, and witness nature’s raw beauty from the peaks. Whether it&#39;s the snow-capped Himalayas, the rugged Rockies, or the serene Alps, every mountain holds a story. 🏔️❄️ Escape the noise, embrace the silence, and let the mountains refresh your soul.', 91097, 'mountains_1.jpg', 'mountains_2.jpg', 'mountains_3.jpg', 'mountains_4.jpg', 'mountains_5.jpg'),
(14, 'Mongolia', 'Mongolia – a land of endless horizons and untamed beauty! 🏜️🏇 From the vast Gobi Desert to the lush green steppes, this country is a paradise for adventurers. Experience the nomadic way of life, ride horses across the plains, and explore the ancient history of Genghis Khan. 🌄🔥 Whether it&#39;s camping under starry skies or witnessing the Naadam Festival, Mongolia is a journey like no other 🇲🇳', 55097, 'mongolia_1.jpg', 'mongolia_2.jpg', 'mongolia_3.jpg', 'mongolia_4.jpg', 'mongolia_5.jpg'),
(15, 'Seychelles', 'Seychelles – a dreamy paradise of turquoise waters, white sandy beaches, and lush tropical beauty! 🏝️✨ Explore untouched islands, snorkel in crystal-clear lagoons, and relax under swaying palm trees. 🌊🐠 From the granite boulders of La Digue to the vibrant marine life of Praslin, every corner is pure bliss. Whether it’s adventure or relaxation, Seychelles is the ultimate escape.', 88096, 'seychelles_1.jpg', 'seychelles_2.jpg', 'seychelles_3.jpg', 'seychelles_4.jpg', 'seychelles_5.jpg'),
(16, 'sri-lankan', 'Sri Lanka – the Pearl of the Indian Ocean! 🇱🇰✨ From golden beaches to lush tea plantations, this island is a perfect mix of adventure, culture, and natural beauty. 🏝️🐘 Explore ancient temples, go on a safari to see wild elephants, or hike the stunning hills of Ella. 🌿🌊 Whether you&#39;re surfing in Arugam Bay, discovering Sigiriya, or enjoying a cup of Ceylon tea, Sri Lanka is a traveler’s dream 🌅🍃', 67800, 'sri-lankan_1.jpg', 'sri-lankan_2.jpg', 'sri-lankan_3.jpg', 'sri-lankan_4.jpg', 'sri-lankan_5.jpg'),
(17, 'Spain', 'Spain – where history, culture, and vibrant energy come to life! 🇪🇸✨ From the stunning beaches of Costa Brava to the architectural wonders of Barcelona and Madrid’s lively streets, every corner is a feast for the senses. 🏰🌊 Indulge in delicious tapas, dance to the rhythm of flamenco, and explore breathtaking landscapes. 🌅🍷 Whether it&#39;s the charm of Andalusia, the beauty of the Pyrenees, or the excitement of La Tomatina, Spain is unforgettable.', 95099, 'spain_1.jpg', 'spain_2.jpg', 'spain_3.jpg', 'spain_4.jpg', 'spain_5.jpg'),
(18, 'Thailand', 'Thailand – the Land of Smiles! 🇹🇭✨ From the bustling streets of Bangkok to the serene beaches of Phuket, this country is a perfect blend of culture, adventure, and relaxation. 🏝️🌿 Explore ancient temples, indulge in delicious street food, and dive into crystal-clear waters. 🍜🐘 Whether you&#39;re island-hopping in Krabi, trekking in Chiang Mai, or enjoying the vibrant nightlife, Thailand is pure magic.  ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ-Without Flight', 48797, 'thailand_1.jpg', 'thailand_2.jpg', 'thailand_3.jpg', 'thailand_4.jpg', 'thailand_5.jpg'),
(19, 'Tokyo', 'Tokyo – where tradition meets the future! 🇯🇵✨ From the dazzling neon lights of Shibuya to the serene temples of Asakusa, this city is a perfect blend of culture, technology, and adventure. 🏯🌆 Indulge in world-class sushi, explore anime and gaming hubs in Akihabara, or relax under cherry blossoms in Ueno Park. 🍣 Whether it’s shopping in Shinjuku, experiencing sumo wrestling, or discovering hidden izakayas, Tokyo never stops amazing.', 155632, 'tokyo_1.jpg', 'tokyo_2.jpg', 'tokyo_3.jpg', 'tokyo_4.jpg', 'tokyo_5.jpg'),
(20, 'Vietnam', 'Vietnam – a land of breathtaking landscapes, rich history, and vibrant culture! 🇻🇳✨ From the limestone karsts of Ha Long Bay to the bustling streets of Hanoi and the lantern-lit charm of Hoi An, every corner is a new adventure. 🏯🌿 Indulge in flavorful pho, cruise along the Mekong Delta, or trek through the stunning rice terraces of Sapa. 🍜🚲 Whether it&#39;s exploring ancient temples or relaxing on tropical beaches, Vietnam is truly unforgettable.', 12296, 'vietnam_1.jpg', 'vietnam_2.jpg', 'vietnam_3.jpg', 'vietnam_4.jpg', 'vietnam_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'tushar solanki', 'Tushar633712@gmail.com', 'bf75080d60f239b9af7c435fc29172b3e0ce0c74');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
