-- SQLINES DEMO *** QL 5.7.31 dump

/* SET NAMES utf8; */
-- time_zone := '+00:00';
/* SET foreign_key_checks = 0; */
/* SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'; */

DROP TABLE IF EXISTS airport_transfer;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE airport_transfer_seq;

CREATE TABLE airport_transfer (
id int NOT NULL DEFAULT NEXTVAL ('airport_transfer_seq'),
fname text NOT NULL,
email text NOT NULL,
country text NOT NULL,
phone text NOT NULL,
no_person text NOT NULL,
pick_up_loc text NOT NULL,
date_pickup text NOT NULL,
time_pickup text NOT NULL,
date_drop_off text NOT NULL,
drop_off_time text NOT NULL,
drop_off_location text NOT NULL,
other_details text,
total text NOT NULL,
pay_now text NOT NULL,
pay_later text NOT NULL,
ip_addr text NOT NULL,
ref_number text NOT NULL,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO airport_transfer (id, fname, email, country, phone, no_person, pick_up_loc, date_pickup, time_pickup, date_drop_off, drop_off_time, drop_off_location, other_details, total, pay_now, pay_later, ip_addr, ref_number) VALUES
                  (1,	'fadil',	'fadil@xcoder.devlpr',	'Nicaragua',	'5555 5555',	'4',	'SSR International Airport, Plaisance, Mauritius',	'31-07-2022',	'06:00:00',	'31-08-2022',	'18:00:00',	'Beachcomber Resorts & Hotels',	'A cat as pet',	'30',	'7.5',	'22.5',	'127.0.0.1',	'FA-30072022-990436'),
                  (2,	'John',	'rosunmungurudm@gmail.com',	'Sierra Leone',	'5555 5555',	'2',	'SSR International Airport, Plaisance, Mauritius',	'03-08-2022',	'02:00:00',	'21-10-2022',	'13:00:00',	'LUX Grand Baie',	'Couple',	'38',	'9.5',	'28.5',	'127.0.0.1',	'FA-30072022-258651'),
                  (3,	'Peter',	'elise.spencer@gmail.com',	'Burkina Faso',	'5555 5555',	'4',	'SSR International Airport, Plaisance, Mauritius',	'24-08-2022',	'23:00:00',	'17-11-2022',	'04:00:00',	'Heritage Awali Golf and Spa Resort',	'Burkina Faso is a landlocked country in West Africa',	'38',	'9.5',	'28.5',	'127.0.0.1',	'FA-30072022-607631');

DROP TABLE IF EXISTS booking;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE booking_seq;

CREATE TABLE booking (
id int NOT NULL DEFAULT NEXTVAL ('booking_seq'),
ref_number text NOT NULL,
ip_addr text NOT NULL,
fname text NOT NULL,
email text NOT NULL,
country text NOT NULL,
phone text NOT NULL,
total text NOT NULL,
pay_now text NOT NULL,
pay_later text NOT NULL,
pick_up_loc text NOT NULL,
date_pickup text NOT NULL,
time_pickup text NOT NULL,
date_drop_off text NOT NULL,
drop_off_location text NOT NULL,
drop_off_time text NOT NULL,
vehicle_id int NOT NULL,
vehicle_image text NOT NULL,
other_details text,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO booking (id, ref_number, ip_addr, fname, email, country, phone, total, pay_now, pay_later, pick_up_loc, date_pickup, time_pickup, date_drop_off, drop_off_location, drop_off_time, vehicle_id, vehicle_image, other_details) VALUES
                         (1,	'FA-30072022-573978',	'127.0.0.1',	'Peter',	'feil.aditya@gmail.com',	'Burkina Faso',	'5555 5555',	'675',	'168.75',	'506.25',	'SSR International Airport, Plaisance, Mauritius',	'17-08-2022',	'08:00:00',	'13-10-2022',	'Hotel Delivery',	'09:00:00',	1,	'http://firstautocarrental.local/images/booking/axia.jpg',	'Over the years, the web and the world have changed. Google Search has evolved and improved, but our approach remains the same.'),
                         (2,	'FA-30072022-73347',	'127.0.0.1',	'Peter',	'vpagac@kshlerin.com',	'Nicaragua',	'5555 5555',	'1200',	'300',	'900',	'SSR International Airport, Plaisance, Mauritius',	'25-08-2022',	'07:00:00',	'23-09-2022',	'Hotel Delivery',	'15:00:00',	7,	'http://firstautocarrental.local/images/booking/hyundai.jpg',	'We continuously map the web and other sources to connect you to the most relevant, helpful information.'),
                         (3,	'FA-30072022-409990',	'127.0.0.1',	'John',	'elise.spencer@gmail.com',	'Burkina Faso',	'5555 5555',	'1080',	'270',	'810',	'SSR International Airport, Plaisance, Mauritius',	'31-08-2022',	'10:00:00',	'23-11-2022',	'SSR International Airport, Plaisance, Mauritius',	'11:00:00',	11,	'http://firstautocarrental.local/images/booking/suzuki-ertiga.jpg',	'We present results in a variety of ways, based on what most helpful for the type of information youre looking for'),
                         (4,	'FA-30072022-121350',	'127.0.0.1',	'Peter',	'elise.spencer@gmail.com',	'Burkina Faso',	'5555 5555',	'420',	'105',	'315',	'SSR International Airport, Plaisance, Mauritius',	'10-08-2022',	'09:00:00',	'23-11-2022',	'SSR International Airport, Plaisance, Mauritius',	'09:00:00',	10,	'http://firstautocarrental.local/images/booking/nissan-march.jpg',	'All while keeping your personal information private and secure.'),
                         (5,	'FA-06082022-948987',	'127.0.0.1',	'John',	'fadil@xcoder.devlpr',	'Sierra Leone',	'5555 5555',	'1200',	'300',	'900',	'Port Louis',	'24-08-2022',	'17:00:00',	'22-09-2022',	'Curepipe',	'14:00:00',	7,	'http://firstautocarrental.local/images/booking/hyundai.jpg',	'BeinConnect et MyCanal'),
                         (6,	'FA-06082022-138323',	'127.0.0.1',	'Peter',	'fadil@xcoder.devlpr',	'Nicaragua',	'5555 5555',	'663',	'165.75',	'497.25',	'Tamarin',	'07-08-2022',	'11:00:00',	'23-08-2022',	'Curepipe',	'12:00:00',	2,	'http://firstautocarrental.local/images/booking/axio.jpg',	's'),
                         (7,	'FA-16082022-294934',	'127.0.0.1',	'Peter',	'fadil@xcoder.devlpr',	'Burkina Faso',	'5555 5555',	'80',	'20',	'60',	'SSR International Airport, Plaisance, Mauritius',	'14-09-2022',	'16:00:00',	'15-12-2022',	'Hotel Delivery',	'10:00:00',	7,	'http://firstautocarrental.local/images/booking/hyundai.jpg',	'X8XSSR'),
                         (9,	'FA-03112022-6363faa4801dd0.25368951',	'-',	'Jacob Funk III',	'Morgan14@yahoo.com',	'Bouvet Island (Bouvetoya)',	'475-751-3846',	'4675',	'1168.75',	'3506.25',	'Medhurstberg',	'2021-05-24',	'05:00',	'2021-11-27',	'Newport Beach',	'14:00',	1,	'-',	'Enhanced encompassing time-frame'),
                         (10,	'FA-03112022-6364065a3228b0.96960655',	'-',	'Mr John Doe',	'johndoe@email.com',	'Sierra Leone',	'122 5555 5555',	'4675',	'1168.75',	'3506.25',	'Airport of mauritius',	'2021-05-24',	'05:00',	'2021-11-27',	'Hotels, AirBnB, ...',	'14:00',	1,	'-',	'Any other details that might e helpful to us');

DROP TABLE IF EXISTS contact;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE contact_seq;

CREATE TABLE contact (
id int NOT NULL DEFAULT NEXTVAL ('contact_seq'),
fname text NOT NULL,
email text NOT NULL,
phone text NOT NULL,
msg text NOT NULL,
ip_addr text NOT NULL,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO contact (id, fname, email, phone, msg, ip_addr) VALUES
(1,	'Peter',	'fadilrm@hotmail.com',	'5555 5555',	'People around the world turn to Search to find information, learn about topics of interest, and make important decisions. We know people rely on us so our commitment will never waver. As technology evolves, we will continue to help everyone find the information they’re looking for.',	'127.0.0.1'),
(4,	'Miss Alyssa Gislason',	'Flavio74@gmail.com',	'563-579-0071',	'Rerum nostrum unde. In nesciunt ratione consequatur nihil vel veniam dolores fugiat. Qui et consequatur consequatur suscipit dolor quas nulla qui. Explicabo qui distinctio eum modi.',	'127.0.0.1'),
(5,	'Neal Hartmann',	'Marjolaine.Reinger41@hotmail.com',	'920-401-1900',	'Et dolorem laboriosam a ipsa facilis nam numquam ab quas. Dolor laboriosam et porro tenetur aliquam est consequatur ut assumenda. Velit similique beatae voluptatum ut culpa praesentium officia voluptates consectetur. Est commodi ad nulla eum neque et expedita aspernatur. Nam labore ad dolor sunt sunt soluta velit quibusdam.',	'127.0.0.1'),
(6,	'Lorena Rowe',	'Karolann_Torphy@gmail.com',	'267-605-0269',	'Harum laudantium doloribus. Odit veritatis eligendi repudiandae aut ipsum aut nihil id.',	'127.0.0.1'),
(7,	'Rudy Bergstrom',	'Madilyn24@hotmail.com',	'962-634-8434',	'Ut doloremque architecto reprehenderit pariatur maiores ut illum id. Aliquid sapiente voluptas velit fugiat beatae ab reiciendis. A officiis ipsum laudantium.',	'127.0.0.1'),
(8,	'Alison Friesen',	'Darryl12@gmail.com',	'442-492-8698',	'Aut quia omnis minima nostrum dolores dolorum sed et et. Est enim ut. Maxime ut nostrum quibusdam delectus at et voluptas. Officia quia odit dolore.',	'127.0.0.1'),
(9,	'Roland Harris',	'Dean.OReilly60@gmail.com',	'775-648-0853',	'Et quibusdam placeat sequi consequatur ut cum soluta assumenda veniam. Ipsa est id perspiciatis eum vero et quod rerum est.',	'127.0.0.1'),
(10,	'Dwight Morar',	'Anais.Nienow@hotmail.com',	'611-501-1316',	'Iste et incidunt perferendis. Porro dolorum id sapiente ea quos dolor sint cumque. Facilis libero quia quia. Rerum eligendi itaque consequatur corporis qui aut. Maxime et ut non sed repellat. Est harum neque quibusdam pariatur labore est ipsam est exercitationem.',	'127.0.0.1'),
(11,	'Ms. Keith Feil',	'Lina.Quigley@yahoo.com',	'319-678-1934',	'Error dolores optio et unde voluptatibus vero. Laborum culpa sed veniam aliquid beatae porro. Odio omnis nisi.',	'127.0.0.1');

/* SET NAMES utf8mb4; */

DROP TABLE IF EXISTS log;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE log_seq;

CREATE TABLE log (
id int NOT NULL DEFAULT NEXTVAL ('log_seq'),
message text NOT NULL,
context text NOT NULL ,
level smallint NOT NULL,
level_name varchar(50) NOT NULL,
extra text NOT NULL ,
created_at timestamp(0) NOT NULL,
PRIMARY KEY (id)
) ;

DROP TABLE IF EXISTS testimonials;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE testimonials_seq;

CREATE TABLE testimonials (
id int NOT NULL DEFAULT NEXTVAL ('testimonials_seq'),
people text NOT NULL,
img text NOT NULL,
description text NOT NULL,
description_fr text NOT NULL,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO testimonials (id, people, img, description, description_fr) VALUES
(1,	'Mary - England',	'mary.jpg',	'We had a very memorable and mesmerizing vacation in Mauritius 2 weeks back, especially with a clean, and comfortable car as companion. Nothing to complain about FIRST AUTO. The service was as smart as its slogan, ‘Smart people need smart mobility.’ One more thing: beware of stray dogs.',	'Il y a deux semaines, nous avons passé des vacances mémorables et fascinantes à Maurice, en particulier avec une voiture propre et confortable comme compagnon. Rien à redire à propos de FIRST AUTO. Le service était aussi intelligent que son slogan, "Les personnes intelligentes ont besoin de la mobilité intelligente". Une dernière chose: méfiez-vous des chiens errants.'),
(2,	'Heinrich - Germany',	'heinrick.jpg',	'Driving in Mauritius on the left was not an easy task at first. But with our friend Sharukh, from FIRST AUTO, who assisted us 247, we managed to hone our driving skill. Thank you Sharukh for everything.',	'Conduire à Maurice à gauche nétait pas une tâche facile au début. Mais avec notre ami Sharukh, de FIRST AUTO, qui nous a aidés 24 heures sur 24, nous avons réussi à perfectionner nos compétences de conduite. Merci Sharukh pour tout.'),
(3,	'Francesco - Italy',	'francesco.jpg',	'First Auto gave us a better service than expected. I made a last-hour booking from Dubai and was warmly welcomed at the airport, once we landed. After the usual paper -- SQLINES LICENSE FOR EVALUATION USE ONLY
create or replace function we ( were surprised) returns void as $$

begin by
$$ language plpgsql; a brand new car and no extra was asked. It was a 7-seater and my large family got comfortable -- SQLINES LICENSE FOR EVALUATION USE ONLY
with our drive. I strongly recommend FIRST AUTO as a smart car rental service provider. Keep it up.',	'First Auto nous a offert un meilleur service que prévu. Jai fait une réservation de dernière heure depuis Dubaï et jai été chaleureusement accueilli à laéroport, une fois que nous avons atterri. Après la procédure papier habituelle, nous avons été surpris par une voiture neuve et aucun autre frais n’a été demandé. Cétait une 7 places et ma grande famille sest habituée à notre conduite. Je recommande fortement FIRST AUTO en tant que prestataire de services de location de voitures intelligentes. Continuez.'),
(4,	'David - South Africa',	'david.jpg',	'The astounding thing about First Auto is its website. It is love at first site. So smartly and intelligently designed, it takes you to your destination (search) quickly and efficiently. First Auto also provides airporthotel transfers and excursions services defying competition. The driver is so versatile with the attractionsevents food and so on. FIRST AUTO is surely the next big local company.',	'La particularité étonnante de First Auto est son site Web. Cest lamour au premier site. Si intelligemment et intelligemment conçu, il vous amène à votre destination (recherche) rapidement et efficacement. First Auto propose également des services de navette aéroport / hôtel et des excursions contre la concurrence. Le conducteur est si polyvalent avec les attractions  événements  nourriture et ainsi de suite. FIRST AUTO est sûrement la prochaine grande entreprise locale.');

DROP TABLE IF EXISTS tours;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE tours_seq;

CREATE TABLE tours (
id int check (id > 0) NOT NULL DEFAULT NEXTVAL ('tours_seq'),
tour_name varchar(191) NOT NULL,
tour_css_id varchar(191) NOT NULL,
tour_image_name varchar(191) NOT NULL,
status int NOT NULL,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO tours (id, tour_name, tour_css_id, tour_image_name, status) VALUES
(1,	'North',	'north-tour',	'north-tours.jpg',	1),
(2,	'South',	'south-tour',	'south-tours.jpg',	1),
(3,	'Port Louis',	'port-louis',	'port-louis-tours.jpg',	1),
(4,	'West',	'west-tour',	'west-tours.jpg',	1),
(5,	'East',	'east-tour',	'east-tours.jpg',	1),
(6,	'South East',	'south-east-tours',	'south-east-tours.jpg',	1);

DROP TABLE IF EXISTS tours_booking;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE tours_booking_seq;

CREATE TABLE tours_booking (
id int NOT NULL DEFAULT NEXTVAL ('tours_booking_seq'),
fname text NOT NULL,
email text NOT NULL,
phone text NOT NULL,
no_person text NOT NULL,
location text NOT NULL,
places text NOT NULL,
pick_up_loc text NOT NULL,
date_pickup text NOT NULL,
time_pickup text NOT NULL,
other_details text NOT NULL,
ip_addr text NOT NULL,
ref_number text NOT NULL,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO tours_booking (id, fname, email, phone, no_person, location, places, pick_up_loc, date_pickup, time_pickup, other_details, ip_addr, ref_number) VALUES
(1,	'Peter',	'fadil@xcoder.devlpr',	'5555 5555',	'5',	'North Tours',	'Sea Activities / ',	'La Digue Island Lodge',	'22-09-2022',	'11:00:00',	'La Digue Lodge is 1,650 feet from the inter-island ferry and under 1.9 mi from Nid Aigle, the hill offering panoramic views over La Digue and other islands.',	'127.0.0.1',	'FA-30072022-364085'),
(2,	'John',	'vpagac@kshlerin.com',	'5555 5555',	'10',	'North Tours',	'Blue Safari / ',	'La Digue Island Lodge',	'11-08-2022',	'10:00:00',	'Nid Aigle, the hill offering panoramic views over La Digue and other islands.',	'127.0.0.1',	'FA-30072022-697586'),
(3,	'Peter',	'elise.spencer@gmail.com',	'5555 5555',	'15',	'North Tours',	'Sea Activities / ',	'La Digue Island Lodge',	'30-08-2022',	'12:00:00',	'63 villas are located a few steps away from famous Anse Severe beach',	'127.0.0.1',	'FA-30072022-168442'),
(4,	'Peter',	'elise.spencer@gmail.com',	'5555 5555',	'30',	'East Tours',	'Ambre Island / Belle Mare Beach / Lile Aux Cerfs / ',	'AXS',	'18-08-2022',	'09:00:00',	'Anse Réunion is almost the centre of life in this delightful fashion photographers paradise',	'127.0.0.1',	'FA-30072022-711882');

DROP TABLE IF EXISTS vehicles;
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE SEQUENCE vehicles_seq;

CREATE TABLE vehicles (
id int check (id > 0) NOT NULL DEFAULT NEXTVAL ('vehicles_seq'),
vehicle_name varchar(191) NOT NULL,
slug text NOT NULL,
image_name varchar(191) NOT NULL,
price int NOT NULL,
transmission text NOT NULL,
vehicle_category int NOT NULL,
status int NOT NULL,
PRIMARY KEY (id)
) ;

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO vehicles (id, vehicle_name, slug, image_name, price, transmission, vehicle_category, status) VALUES
(1,	'Perudia Axia',	'perudia-axia',	'axia.jpg',	25,	'Automatic',	1,	1),
(2,	'Toyota Axio',	'toyota-axio',	'axio.jpg',	39,	'Automatic',	2,	1),
(3,	'Hyundai Creta',	'hyundai-creta',	'creta.jpg',	55,	'Automatic',	3,	1),
(4,	'Hyundai Elantra',	'hyundai-elantra',	'elantra.jpg',	45,	'Manual',	2,	1),
(5,	'Hyundai i10 Grand',	'hyundai-i10-grand',	'i10.jpg',	27,	'Automatic',	1,	1),
(6,	'Toyota Hilux',	'toyota-hilux',	'hilux.jpg',	50,	'Automatic',	3,	1),
(7,	'Hyundai Accent',	'hyundai-accent',	'hyundai.jpg',	40,	'Automatic',	2,	1),
(8,	'Nissan Juke',	'nissan-juke',	'juke.jpg',	50,	'Automatic',	3,	1),
(9,	'Suzuki Ciaz',	'suzuki-ciaz',	'suzuki-ciaz.jpg',	39,	'Automatic',	2,	1),
(10,	'Nissan March',	'nissan-march',	'nissan-march.jpg',	30,	'Automatic',	1,	1),
(11,	'Suzuki Ertiga',	'suzuki-ertiga',	'suzuki-ertiga.jpg',	45,	'Automatic',	3,	1),
(12,	'Toyota Vitz',	'toyota-vitz',	'vitz.jpg',	31,	'Automatic',	1,	1);

-- 2022-12-16 19:38:08
