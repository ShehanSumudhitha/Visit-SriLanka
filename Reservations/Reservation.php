<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "users";

$con = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `Hotels`";
$result1 = mysqli_query($con, $query);
$hotelName = $result1;
?>
<html>
    <head>
        <link rel="stylesheet" href="style1.css">
        <title> Reservation </title>
    </head>
    <body>
     <!-----NAVBAR------>
     <nav class="sticky">
       <a href="http://localhost/Web/index.php" class="logo"> 𓃰Sri lanka</a>
       <ul>
           <li><a href="http://localhost/Web/destination/destination.php">Destinations</a></li>
           <li><a href="http://localhost/Web/hotels/Hotels.php">Hotels</a></li>
           <li><a href="#">Tours</a></li>
           <li><a href="http://localhost/Web/Login/index.php">Login</a></li>
       </ul>
   </nav> 


    <?php
    if(isset($_POST['save']))
    {
        $sql = "INSERT INTO reservations (ReservEmail, HotelName , RoomType , Check_in , check_ouy, PhoneNo) 
        VALUES ('".$_POST["emailAd"]."','".$_POST["hName"]."','".$_POST["RoomType"]."','".$_POST["checkIN"]."','".$_POST["checkout"]."','".$_POST["phonee"]."')";

        $result = mysqli_query($con,$sql);
        $msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
        }

        ?>

        <form action="http://localhost/Web/hotels/Hotels.php" class="form" id="form" method="POST" >
        </div>

            <div class="form-controler"> 
                <label>Email</label>
                <input type="email" id="emailAd" name="emailAd">
                </div>
            </div>

            </div>
                <div class="form-controler"> 
                <label>Phone Number</label>
                <input type="phoneNo" id="phone" name="phonee">
                </div>
            </div>

            <div class="form-controler">
            <label>Choose a Hotel</label>
            <select class="HotelName" name="hName" id = "hotel_Name">
                <option value =""> Hotel </option>
                    <?php 
                    if(mysqli_num_rows($result1) > 0)
                    {
                        foreach($result1 as $hotelName) 
                        {
                            ?> 
                            <option id = hotel value="<?php echo $hotelName['HotelName'];?>"> <?php echo $hotelName ['HotelName']; ?> </option>
                            <?php    
                        }
                    }
                    else {
                        echo"No Records found";
                    }
                    ?>
                </select>
            </div>
                
            <div class="form-controler">
            <label>Room Type</label>
            <select class="RoomType" name="RoomType" id = "room_Name">
                  <option>Single Room</option>
                  <option>Double Bed Room</option>
                  <option>King Room</option>
            </select>
            </div>
            
            </div>
                <div class="form-controler"> 
                <label>Check-in Day</label>
                <input type="date" id="checkin" name="checkIN">
                </div>
            </div>
            
            </div>
                <div class="form-controler"> 
                <label>Check-out Day</label>
                <input type="date" id="Checkout" name="checkout">
                </div>
            </div>
         
            <button id="btns" name ="save" value ="Submit"> Book Now</button>

        </form>
        

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>