<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>


          <li><a href="#">About Us</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Privacy</a></li>
          <li><a href="#">Terms of use</a></li>
               <li><a href="admin/" style="background: orange; padding: 3px 5px 3px 5px; border-radius: 5%; color:black; font-weight: 600;">Admin Login</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>Subscribe Newsletter</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users very week.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Connect with Me:</p>
            <ul>
              <li><a href="https://www.linkedin.com/in/akshat-kumar-86203224a/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="https://github.com/Akshat-Kumar-X"><i class="fa fa-github-square" aria-hidden="true"></i></a></li>
              <li><a href="https://www.instagram.com/akshat_kumar_0?igsh=cTB4N3B1bDkzNzdx"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2024 Rent a Car Portal. Brought To You By <a href="https://www.linkedin.com/in/akshat-kumar-86203224a/">Akshat Kumar</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>
